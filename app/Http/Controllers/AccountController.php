<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Mail;
use Session;
use App\User;
use Validator;
use App\MeterRequest;
use App\Payment;
use Illuminate\Http\Request;
use App\Mail\AccountActivation;
use App\PostpaidPayment;
use App\AdminBiodata;
use App\AgentBiodata;
use App\CustomerBiodata;
use Carbon\Carbon;
use App\Transaction;
use App\AgentTransaction;
use PDF;

class AccountController extends Controller
{
    public function loginUser(Request $request)
    {
        if (Auth::attempt(['email'=>$request->email,'password'=>$request->password,'is_activated' => 1])) {
            return response()->json(['sus'=> 1]);
        } else {
            return response()->json(['err' => 'Email Address or Password is incorrect']);
        }
    }
    public function registerUser(Request $request)
    {
        $checkMail = User::where('email', $request->email)->get();

        if(count($checkMail) == 1) {
            return response()->json(['err' => 'Email Already Exists']);
        }

        if($request->has('referred')) {
            // Activate the bonus upon registration
            $fetchCustomer = User::where('refer_id',$request->referred)->first();
            $customer = CustomerBiodata::where('user_id',$fetchCustomer->id)->first();
            if($fetchCustomer !== null) {
                $customer->refer_bonus += 2;
                $customer->save();
                session()->forget('referred');
            }

        }

        $bio = new CustomerBiodata;
        
        $access_token = str_random(50);

        $userID = DB::table('users')->insertGetId([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'access_token' => $access_token,
            'refer_id' => str_random(10),
            'created_at' => new Carbon('now'),
            'updated_at' => new Carbon('now'),
        ]);
        $bio->user_id = $userID;
        $bio->meter_no = "";
        $bio->address = "";
        $bio->save();
        
        $user = User::where('id',$userID)->first();
        Mail::to($user->email)->send(new AccountActivation($user));
        

        return response()->json(['sus' => '1']);
    }

    /**
     * Activate referred code and return the signup form
     */
    public function referredSignup($ref)
    {
        $findRef = User::where('refer_id',$ref)->first();
        if(empty($findRef)) {
            return redirect('/');
        }else {
            // store refer ID to session
            session()->put('referred',$findRef->refer_id);
            session()->flash('success','Thank you for visiting GOENERGEE, Please Proceed to Signup');
            return redirect()->route('guest.signup');
            // return view('referral-signup')->withRef($findRef->refer_id);
        }
    }

    // public function sendAccountMail()
    // {
    //     if (session()->exists('account_info')) {
    //         $accountInfo = session('account_info');

    //         Mail::to($accountInfo->email)->send(new AccountActivation($accountInfo));

    //         return view('emails.sent-success');
    //     }
    //     return redirect('/');
    // }

    public function activateAccount($token)
    {
        // if(session()->has('referred'))
        $user = User::where('access_token', $token)->first();
        $user->is_activated = 1;
        $user->save();

        Auth::login($user, true);

        session()->forget('account_info');

        return view('activating');
    }

    public function paymentFrame()
    {
        return view('postpaidpayment-frame');
    }


    public function paymentHolder(Request $request)
    {
        //return $request;
        // Check if payment sending is not greater than that of admin
        $adminDetails = AdminBiodata::first();

        //return $adminDetails;

        if($adminDetails->wallet_balance < $request->amount) {
            return response()->json(['code' => 'no']);
        }
        session(['payment_details' => $request->all()]);

        return response()->json(['code' => 'ok', 'text' => session()->get('payment_details')]);
    }


    public function paymentAgentPrepaidHolder(Request $request)
    {

        $agentDetails = AgentBiodata::where('user_id',\Auth::user()->id)->first();
        $adminDetails = AdminBiodata::first();

        if($agentDetails->wallet_balance < $request->amount || $adminDetails->wallet_balance < $request->amount )  {
            return response()->json(['errorText' => 'Insufficient Balance to complete the payment, Please Topup']);
        }
        session(['payment_details' => $request->all()]);

        return response()->json(['code' => 'ok']);
    }

    public function paymentPostpaidHolder(Request $request)
    {
        //return $request;
        // Check if payment sending is not greater than that of admin
        $adminDetails = AdminBiodata::first();

        //return $adminDetails;

        if($request->is_agent == 1) {
            return $this->paymentAgentPostpaidHolder($request);
        }

        if($adminDetails->wallet_balance < $request->amount) {

            return response()->json(['code' => 'no']);
        }
        session(['payment_details' => $request->all()]);

        return response()->json(['code' => 'ok']);
    }

    public function paymentAgentPostpaidHolder(Request $request)
    {
        
        // Check if payment sending is not greater than that of admin
        $adminDetails = AdminBiodata::first();
        $agentBio = AgentBiodata::where('user_id',\Auth::user()->id)->first();

        //return $adminDetails;

        if($adminDetails->wallet_balance < $request->amount) {

            return response()->json(['code' => 'no']);
        }

        if($agentBio->wallet_balance < $request->amount) {
            return response()->json(['errorText'=>'Insufficient Funds, Please Topup']);
        }
        session(['payment_details' => $request->all()]);

        return response()->json(['code' => 'ok']);
    }

    public function prepaidPayment()
    {
        $bio = $this->customerData();
        return view('customer.prepaid-payment')->withBio($bio);
    }

    public function postpaidPayment()
    {
        $bio = $this->customerData();
        return view('customer.postpaid-payment')->withBio($bio);
        //return "We are working on this <a href='/home'>Back</a>";
    }


    public function paymentSuccess($ref)
    {
        if (session()->exists('payment_details')) {
            $paymentDetails = session('payment_details');

            // Insert into prepaid_payment
            $prepaid = new Payment;
            $transaction = new Transaction;

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
                'is_agent' => false,
                'created_at' => new Carbon('now'),
                'updated_at' => new Carbon('now'),
            ]);

            $transaction->payment_id = $paymentId;
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
            $transaction->bal = $bal;
            $transaction->spec = $spec;
            $transaction->ralmuof = $ralmuof;
            $transaction->total_split = $totalSplit;
            $transaction->net_amount = $netAmount;

            // Wallet Balance
            $adminBio = AdminBiodata::first();

            //return $adminBio;

            $adminBio->wallet_balance = $adminBio->wallet_balance - $netAmount;

            $transaction->wallet_bal = $adminBio->wallet_balance;

            $transaction->save();
            $adminBio->save();

            $smsNumber = $paymentDetails['mobile'];
            $amountPaid = $total_amount;

            session()->put(['smsNumber' => $smsNumber]);
            session()->put(['smsRef' => $ref]);
            session()->put(['paid_amount' => $amountPaid]);
            session()->put(['payment_type' => 'Prepaid']);
            session()->put(['meter_no' => $paymentDetails['meter_no']]);
            

            return redirect()->route('finalize', [$smsNumber,$ref]);

            session()->forget('payment_details');

            return back();
        }

        return redirect('/');
    }


    public function postpaidpaymentSuccess($ref)
    {
        if (session()->exists('payment_details')) {
            $paymentDetails = session('payment_details');

            // Insert into prepaid_payment
            $prepaid = new Payment;
            $transaction = new Transaction;

            $is_agent = false;

            $agentBio = AgentBiodata::where('user_id',\Auth::user()->id)->first();

            if($paymentDetails['is_agent'] == 1) {
                $is_agent = true;
            }
            $paymentId = DB::table('payments')->insertGetId([
                'first_name' => $paymentDetails['first_name'],
                'last_name' => $paymentDetails['last_name'],
                'email' => $paymentDetails['email'],
                'phone_number' => $paymentDetails['mobile'],
                'meter_no' => $paymentDetails['meter_no'],
                'recharge_pin' => rand(1234,5334)." ".rand(2324,24980),
                'user_type' => 2,
                'transaction_type' => "Web",
                'transaction_ref' => $ref,
                'value_of_kwh' => $paymentDetails['amount'] / 12.85,
                'is_agent' => $is_agent,
                'created_at' => new Carbon('now'),
                'updated_at' => new Carbon('now'),
            ]);

            $transaction->payment_id = $paymentId;
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
            $transaction->bal = $bal;
            $transaction->spec = $spec;
            $transaction->ralmuof = $ralmuof;
            $transaction->total_split = $totalSplit;
            $transaction->net_amount = $netAmount;

            // Wallet Balance
            $adminBio = AdminBiodata::first();

            $adminBio->wallet_balance -= $netAmount;
            
            $transaction->wallet_bal = $adminBio->wallet_balance;

            if($paymentDetails['is_agent'] == 1) {
                
                $agentBio->wallet_balance -= $paymentDetails['amount'];
                $agentBio->save();
            }

            $transaction->save();
            $adminBio->save();

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
    }

    public function loggedPostpaidPaymentSuccess($ref) {
        if (session()->exists('payment_details')) {
            $paymentDetails = session('payment_details');

            // Insert into prepaid_payment
            $prepaid = new Payment;
            $transaction = new Transaction;

            $is_agent = false;

            $agentBio = AgentBiodata::where('user_id',\Auth::user()->id)->first();

            if($paymentDetails['is_agent'] == 1) {
                $is_agent = true;
            }
            $paymentId = DB::table('payments')->insertGetId([
                'first_name' => $paymentDetails['first_name'],
                'last_name' => $paymentDetails['last_name'],
                'email' => $paymentDetails['email'],
                'phone_number' => $paymentDetails['mobile'],
                'meter_no' => $paymentDetails['meter_no'],
                'recharge_pin' => rand(1234,5334)." ".rand(2324,24980),
                'user_type' => 2,
                'transaction_type' => "Web",
                'transaction_ref' => $ref,
                'value_of_kwh' => $paymentDetails['amount'] / 12.85,
                'is_agent' => $is_agent,
                'created_at' => new Carbon('now'),
                'updated_at' => new Carbon('now'),
            ]);

            $transaction->payment_id = $paymentId;
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
            $transaction->bal = $bal;
            $transaction->spec = $spec;
            $transaction->ralmuof = $ralmuof;
            $transaction->total_split = $totalSplit;
            $transaction->net_amount = $netAmount;

            // Wallet Balance
            $adminBio = AdminBiodata::first();

            $adminBio->wallet_balance = $adminBio->wallet_balance - $netAmount;
            
            $transaction->wallet_bal = $adminBio->wallet_balance;

            if($paymentDetails['is_agent'] == 1) {
                $transaction->agent_id = $agentBio->agent_id;
                $agentBio->wallet_balance -= $total_amount;
                $agentBio->save();
            }

            $transaction->save();
            $adminBio->save();

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
    }

    // public function loggedAgentPostpaidPaymentSuccess($ref)
    // {
        
    // }
    public function home()
    {
        if(\Auth::check()) {
            $role = \Auth::user()->role_id;
            switch ($role) {
                // Admin is Logged in
                case '1':
                    return redirect('/backend/finance');
                    break;
                case '2':
                // Agent is logged in
                    $agent = AgentBiodata::where('user_id',\Auth::user()->id)->first();
                    $allProfit = AgentTransaction::sum('agent');
                    session()->put(['agentDetails' => $agent]);
                    return view('users.agent.financial')
                        ->withDetails($agent)
                        ->withProfit($allProfit)
                        ;
                    break;
                case '3':
                    //return view('users.distributor.finance');
                    return redirect('/distributor/finance');
                    //return "Logged In";
                    break;
                default:
                    return view('customer.dashboard');
                    break;
            }
        }else {
            return redirect('/')->withError('Session Expired, Please Login');
        }
        
    }

    public function customerProfile()
    {
        // Fetch User Profile From CustomerBiodata
        $profile = User::where('id',\Auth::user()->id)->with('customer')->first();
        // return $profile;
        return view('customer.customer_profile')->withProfile($profile);
    }

    public function updateProfile(Request $request)
    {
        $user = User::find($request->customer_id);
        $names = explode(" ", $request->fullname);
        $user->first_name = $names[0];
        $user->last_name = $names[1];
        $user->is_completed = 1;
        $user->is_activated = 1;
        $user->mobile = $request->phone;
        if($user->refer_id == null) {
            $user->refer_id = str_random(10);
        }

        $bio = CustomerBiodata::where('user_id',$request->customer_id)->first();
        
        $bio->meter_no = $request->meter_no;
        $bio->address = $request->address;

        if ($request->hasFile('profile_pic')) {
            $user->avatar = $request->file('profile_pic')->store('avatars', 'public');
        }
        if($request->has('password') && strlen($request->password) > 1) {
            $user->password = bcrypt($request->password);
        }

        $user->save();
        $bio->save();

        return back()->withSuccess('Account Updated Successfully');
    }

    public function makePayment()
    {
        $userEmail = \Auth::user()->email;
        //return $userEmail;
        
        $prepaid = Payment::where('email', $userEmail)->first();
        //return $prepaid;
        return view('customer.make-payment')->withBefore($prepaid);
    }



    public function meterRequest()
    {
        return view('customer.meter_request');
        // return "We are working on this <a href='/home'>Back</a>";
    }
    public function postMeterRequest(Request $request)
    {
        // return $request;
        $meterRequest = new MeterRequest;

        $meterRequest->first_name = $request->first_name;
        $meterRequest->last_name = $request->last_name;
        $meterRequest->email_address = $request->email;
        $meterRequest->phone_number = $request->phone;
        $meterRequest->home_address = $request->address;
        $meterRequest->closest_bus_stop = $request->closest_bus_stop;
        $meterRequest->dist_company = $request->dist_company;
        $meterRequest->district = $request->district;
        $meterRequest->house_type = $request->house_type;
        $meterRequest->meter_type = $request->meter_type;
        $meterRequest->gender = $request->gender;

        $meterRequest->save();

        Session::flash('success', 'Meter Request Submitted Successfully, Our Admin has been notified, we would get back to you shortly');

        return back();
    }
    public function paymentHistory()
    {
        $userEmail = \Auth::user()->email;
        //return $userEmail;
        $prepaid = Payment::where('email', $userEmail)->with('transaction')->paginate(10);
        // return $prepaid;
        return view('customer.payment_history')->withPayments($prepaid);
    }

    public function ViewPaymentReciept($reciept_id)
    {
         $userEmail = \Auth::user()->email;
         $reciepts = Payment::where('email', $userEmail)->where('id',$reciept_id)->with('transaction')->first()->get();
         // return $reciept;
         return view('customer.payment_reciept',compact('reciepts'));
    }

    public function pdfDownload($reciept_id)
    {
        $userEmail = \Auth::user()->email;
        $reciepts = Payment::where('email', $userEmail)->where('id',$reciept_id)->with('transaction')->first()->get();

        $pdf = PDF::loadView('customer.payment_reciept',compact('reciepts'));
        return $pdf->download('invoice.pdf');
    }



    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function customerData()
    {
        return User::where('id',\Auth::user()->id)->with('customer')->first();   
    }

    public function updateFunds($amount)
    {
        $user = CustomerBiodata::where('user_id',auth()->id())->first();
        $user->wallet_balance += $amount;
        $user->save();

        return response()->json(['msg' => 'success']);
    }
}
// 