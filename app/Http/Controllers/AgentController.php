<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\AgentBiodata;
use App\AdminBiodata;
use App\Payment;
use App\AgentTransaction;
use DB;
use Carbon\Carbon;


class AgentController extends Controller
{
    private $prefix = "users.agent.";

    //private $view = view($this.pre)
    /**
     * Figured Out that this home method isn't functioning 
     */    
    // public function home() {
    //     return $this->v('home');
    // }


    /**
     * This is method that returns the agent signup form
     */
    public function agentSignup()
    {
        // replace filename with a file name you created
        return view($this->prefix.'filenae');
    }

    /**
     * This handles when agent form is submitted
     * This can only be handled by a backend Engineer
     * @param Request $request
     * 
     */
    public function postAgentSignup(Request $request)
    {
        return $request;
    }

    public function v($file) {
        return view($this->prefix.$file);
    }

    public function dashboard() {
        return redirect('home');
    }

    public function paymentHistory()
    {
        $agent = AgentBiodata::where('user_id',\Auth::user()->id)->first();
        
        $allTopups = DB::table('agent_topups')->where('agent_id','=',$agent->agent_id)->get();

        $lastTopup = [];
        $lastTopup['amount'] = 0;
        foreach(last($allTopups) as $topup) {
            $lastTopup['amount'] = $topup->topup_amount;
        }

        // return $lastTopup['amount'];
        $prepaidAgent = Payment::where([
            ['user_type','=',1],
            ['is_agent','=',1]
        ])->with('agent_transaction')->get();

        //return $prepaidAgent;
        $postpaidAgent = Payment::where([
            ['user_type','=',2],
            ['is_agent','=',1]
        ])->with('agent_transaction')->get();

        $combine = collect($prepaidAgent,$postpaidAgent);

        $payments = array_flatten($combine);

        // Total Sellage
        $allSellage = Payment::where('is_agent','=',1)->with('agent_transaction')->get();
        
        $sold = 0;

        foreach ($allSellage as $sells) {
            $sold += $sells->agent_transaction->total_amount;
        }
        //return $sold;
        // return $payments;
        return view($this->prefix.'payment_history')
            ->withHistory($payments)
            ->withBalance($agent->wallet_balance)
            ->withTheLast($lastTopup['amount'])
            ->withAllSold($sold)
            ;
    }
    public function prepaidToken()
    {
        $isNotViolated = "";
        // check if amount to buy token is not violated
        // Fetch Admin Details
        $fetchAdmin = AdminBiodata::where('user_id',1)->first();
        // Fetch Agent
        $fetchAgent = AgentBiodata::where('user_id',\Auth::user()->id)->first();

        if($fetchAdmin->wallet_balance < $fetchAgent->wallet_balance || $fetchAgent->wallet_balance == 0) {
            $isNotViolated = "Yes";
        }
       

        return view($this->prefix.'prepaid-token')->withViolated($isNotViolated)->withAgent($fetchAgent);
    }

    public function meterManagement()
    {
        return $this->v('meter_request');
    }

    public function profile()
    {
        $profile = AgentBiodata::where('user_id',\Auth::user()->id)->with('user')->first();
        // return $profile;
        return view($this->prefix.'agent_profile')
            ->withProfile($profile)
        ;
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'avatar' => 'max:1000',
        ]);

        $user = User::find(Auth::user()->id);
        $user->first_name=$request->first_name;
        $user->last_name=$request->last_name;
        $user->mobile = $request->mobile;
        $user->is_completed = 1;

        // if($request->password !== NULL) {
        //     $user->password = bcrypt($request->password);
        // }

        $agentBio = AgentBiodata::where('user_id',$user->id)->first();
        $agentBio->address = $request->address;
        $agentBio->meter_no = $request->meter_no;
        $agentBio->account_number = $request->account_no;
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $avatar;
            $agentBio->avatar = $avatar;
        }

        if($request->has('password') && strlen($request->password) > 1) {
            $user->password = bcrypt($request->password);
        }
        $user->save();
        $agentBio->save();

        return back()->withSuccess('Profile Updated Successfully');
    }
    // complete agent topup
    public function completeTopup($amount) {
        //return $amount;
        $biodata = AgentBiodata::where('user_id',Auth::user()->id)->first();
        $bal = $biodata->wallet_balance += $amount;
        $trans_ref = str_random(20);
        DB::table('agent_topups')->insert([
            'trans_ref' => $trans_ref,
            'agent_id' => $biodata->agent_id,
            'agent_name' => \Auth::user()->first_name." ".\Auth::user()->last_name,
            'topup_amount' => $amount,
            'wallet_balance' => $bal,
            'created_at' => new Carbon('now'),
            'updated_at' => new Carbon('now')
        ]);
        $biodata->save();
        
        $adminBiodata = AdminBiodata::find(1);
        $adminBiodata->wallet_balance -= $amount;
        $adminBiodata->save();

        return response()->json(['success' => 'Topup Successfull']);
    }

    public function agentTokenSuccess($ref)
    {   
        if (session()->exists('payment_details')) {
            $paymentDetails = session('payment_details');

            // Insert into prepaid_payment
            $prepaid = new Payment;
            $transaction = new AgentTransaction;
            $agentBio = AgentBiodata::where('user_id',\Auth::user()->id)->first();

            $paymentId = DB::table('payments')->insertGetId([
                'first_name' => $paymentDetails['first_name'],
                'last_name' => $paymentDetails['last_name'],
                'email' => $paymentDetails['email'],
                'phone_number' => $paymentDetails['mobile'],
                'meter_no' => $paymentDetails['meter_no'],
                'recharge_pin' => rand(1234,5334)." ".rand(2324,24980),
                'user_type' => 1,
                'transaction_type' => "Web",
                'transaction_ref' => $ref,
                'value_of_kwh' => $paymentDetails['amount'] / 12.85,
                'is_agent' => true,
                'created_at' => new Carbon('now'),
                'updated_at' => new Carbon('now'),
            ]);

            $transaction->payment_id = $paymentId;
            $transaction->agent_id = $agentBio->agent_id;
            $transaction->initial_amount = $paymentDetails['amount'];
            $transaction->conv_fee = 100;

            $total_amount = $paymentDetails['amount'] + 100;
            $commission = $paymentDetails['amount'] * 0.02;
            $pgp = $total_amount * 0.015;
            $bal = (100 + $commission) - $pgp;
            $spec = round($bal * 0.1,2);
            $ralmuof = round($bal * 0.9,2);
            $totalSplit = ($pgp + $bal + $spec +$ralmuof) - $bal;
            $netAmount = $paymentDetails['amount'] - $commission;

            $transaction->total_amount = $total_amount;
            $transaction->commission = $commission;
            $transaction->pgp = $pgp;
            $transaction->agent = 0.085 * $paymentDetails['amount'];
            $transaction->bal = $bal;
            $transaction->spec = $spec;
            $transaction->ralmuof = $ralmuof;
            $transaction->total_split = $totalSplit;
            $transaction->net_amount = $netAmount;

            // Wallet Balance
            $adminBio = AdminBiodata::first();
            //return $adminBio;

            $adminBio->wallet_balance = $adminBio->wallet_balance - $total_amount;
            $agentBio->wallet_balance -= $total_amount;

            $transaction->wallet_bal = $adminBio->wallet_balance;

            $transaction->save();
            $adminBio->save();
            $agentBio->save();

            $smsNumber = $paymentDetails['mobile'];
            $amountPaid = $total_amount;
            session()->put(['smsNumber' => $smsNumber]);
            session()->put(['smsRef' => $ref]);
            session()->put(['paid_amount' => $amountPaid]);
            session()->put(['payment_type' => 'Prepaid']);

            return redirect()->route('finalize', [$smsNumber,$ref]);

            session()->forget('payment_details');

            return back();
        }

        return redirect('/');
    }

    public function agentCustomerTokenSuccess($ref) {
        if (session()->exists('payment_details')) {
            $paymentDetails = session('payment_details');

            // Insert into prepaid_payment
            $prepaid = new Payment;

            $prepaid->first_name = $paymentDetails['first_name'];
            $prepaid->last_name = $paymentDetails['last_name'];
            $prepaid->phone_number = $paymentDetails['mobile'];
            $prepaid->meter_no = $paymentDetails['meter_no'];
            $prepaid->email = $paymentDetails['email'];
            $prepaid->amount = $paymentDetails['amount'];
            $prepaid->conv_fee = 100;
            $prepaid->total_amount = $paymentDetails['amount'] + 100;
            $prepaid->transaction_ref = $ref;
            $prepaid->is_agent = 1;
            $prepaid->payment_type = "Prepaid";

            $bal = ((2/100) * $d->amount + $d->conv_fee ) - ((1.5/100) * $d->total_amount) + ((0.85/100) * $d->amount);
            $prepaid->balance =  
            $prepaid->save();

            $smsNumber = $paymentDetails['mobile'];

            $amountPaid = $paymentDetails['amount'];
            session()->put(['smsNumber' => $smsNumber]);
            session()->put(['smsRef' => $ref]);
            session()->put(['paid_amount' => $amountPaid]);
            session()->put(['payment_type' => 'Prepaid']);

            return redirect()->route('finalize', [$smsNumber,$ref]);

            session()->forget('payment_details');

            return back();
        }

        return redirect('/');
    }
}
