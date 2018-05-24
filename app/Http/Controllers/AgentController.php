<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\AgentBiodata;
use App\AdminBiodata;
use App\PrepaidPayment;
use App\PostpaidPayment;

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

    public function v($file) {
        return view($this->prefix.$file);
    }

    public function dashboard() {
        return redirect('home');
    }

    public function paymentHistory()
    {
        $prepaidAgent = PrepaidPayment::where('is_agent',1)->get();
        $postpaidAgent = PostpaidPayment::where('is_agent',1)->get();

        $combine = collect($prepaidAgent,$postpaidAgent);

        return $combine;
        return $this->v('payment_history');
    }
    public function buyToken()
    {
        $isNotViolated = "";
        // check if amount to buy token is not violated
        // Fetch Admin Details
        $fetchAdmin = AdminBiodata::where('user_id',1)->first();
        // Fetch Agent
        $fetchAgent = AgentBiodata::where('user_id',\Auth::user()->id)->first();

        if($fetchAdmin->wallet_balance < $fetchAgent->wallet_balance) {
            $isNotViolated = "Yes";
        }
       

        return view($this->prefix.'buy-token')->withViolated($isNotViolated);
    }

    public function meterManagement()
    {
        return $this->v('meter_request');
    }

    public function profile()
    {
        return $this->v('agent_profile');
    }

    // complete admin topup
    public function completeTopup($amount) {
        //return $amount;
        $biodata = AgentBiodata::where('user_id',Auth::user()->id)->first();

        $biodata->wallet_balance += $amount;

        $biodata->save();

        return redirect('home')->withSuccess('Topup Successfull');
    }

    public function agentTokenSuccess($ref)
    {   
        if (session()->exists('payment_details')) {
            $paymentDetails = session('payment_details');

            // Insert into prepaid_payment
            $prepaid = new PrepaidPayment;

            $prepaid->first_name = $paymentDetails['first_name'];
            $prepaid->last_name = $paymentDetails['last_name'];
            $prepaid->phone_number = $paymentDetails['mobile'];
            $prepaid->meter_no = $paymentDetails['meter_no'];
            $prepaid->email = $paymentDetails['email'];
            $prepaid->amount = $paymentDetails['amount'];
            $prepaid->conv_fee = 100;
            $prepaid->total_amount = $paymentDetails['amount'] + 100;
            $prepaid->transaction_ref = $ref;
            $prepaid->payment_type = "Prepaid";
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

    public function agentCustomerTokenSuccess($ref)
    {
        if (session()->exists('payment_details')) {
            $paymentDetails = session('payment_details');

            // Insert into prepaid_payment
            $prepaid = new PrepaidPayment;

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
