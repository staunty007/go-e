<?php

namespace App\Http\Controllers;

use Auth;
use Mail;
use Session;
use App\User;
use Validator;
use App\MeterRequest;
use App\PrepaidPayment;
use Illuminate\Http\Request;
use App\Mail\AccountActivation;
use App\PostpaidPayment;
use App\AdminBiodata;
use App\AgentBiodata;

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

    
        if (count($checkMail) == 1) {
            return response()->json(['err' => 'Email Already Exists']);
        }
        $user = new User;

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->mobile = $request->mobile;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        $access_token = str_random(50);

        $user->access_token = $access_token;

        $user->save();

        session(['account_info' => $user]);

        return response()->json(['sus' => '1']);
    }

    public function sendAccountMail()
    {
        if (session()->exists('account_info')) {
            $accountInfo = session('account_info');

            Mail::to($accountInfo->email)->send(new AccountActivation($accountInfo));

            return view('emails.sent-success');
        }
        return redirect('/');
    }

    public function activateAccount($token)
    {
        $user = User::where('access_token', $token)->first();

        $user->is_activated = 1;

        $user->save();

        Auth::login($user, true);

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
        $adminDetails = AdminBiodata::where('user_id',1)->first();

        //return $adminDetails;

        if($adminDetails->wallet_balance < $request->totalPayblleAmount) {

            return $request;

            return response()->json(['code' => 'no']);
        }
        session(['payment_details' => $request->all()]);

        return response()->json(['code' => 'ok']);
    }

    public function paymentSuccess($ref)
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

            $prepaid->balance = ((2/100) * $paymentDetails['amount'] + 100 ) - ((1.5/100) * $paymentDetails['amount'] + 100 + (0.85/100) * $paymentDetails['amount']);

            
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
    public function postpaidpaymentSuccess($ref)
    {
        if (session()->exists('payment_details')) {
            $paymentDetails = session('payment_details');
            $mobile=false;
            foreach ($paymentDetails['email'] as $key => $payment) {
                if ($paymentDetails['amount'][$key]>0) {
                    
                    $postpaid = new PostpaidPayment;
                    $postpaid->payment_type = $paymentDetails['payment_type'][$key];
                    $postpaid->phone_number = $paymentDetails['mobile'][$key];
                    $postpaid->meter_no = $paymentDetails['account_number'][$key];
                    $postpaid->email = $paymentDetails['email'][$key];
                    $postpaid->amount = $paymentDetails['amount'][$key];
                    $postpaid->conv_fee = 100;
                    $postpaid->total_amount = $paymentDetails['amount'][$key] + 100;
                    $postpaid->transaction_ref = $ref;
                    $postpaid->payment_type = "Postpaid";
                    $postpaid->balance = ((2/100) * $paymentDetails['amount'] + 100 ) - ((1.5/100) * $paymentDetails['amount'][$key] + 100 + (0.85/100) * $paymentDetails['amount'][$key]);
                    $postpaid->save();
                    $mobile=$postpaid->phone_number;
                }
            }
            if ($mobile) {
                $smsNumber = $mobile;

                $amountPaid = $paymentDetails['amount'][$key];
                
                session()->put(['smsNumber' => $smsNumber]);
                session()->put(['smsRef' => $ref]);
                session()->put(['paid_amount' => $amountPaid]);
                session()->put(['payment_type' => 'Prepaid']);

                return redirect()->route('finalize', [$smsNumber,$ref]);
            }
            
            request()->session()->forget('payment_details');

            return redirect('/');
        }

        return redirect('/');
    }
    public function home()
    {
        $role = \Auth::user()->role_id;
        switch ($role) {
            case '1':
                return redirect('/backend/finance');
                break;
            case '2':
                $agent = AgentBiodata::where('user_id',\Auth::user()->id)->first();
                return view('users.agent.financial')->withDetails($agent);
                break;
            case '3':
                // return view('users.distributor.finance');
                return redirect('/distributor/finance');
                break;
            default:
                return view('customer.dashboard');
                break;
        }
    }

    public function customerProfile()
    {
        // Fetch User Profile From Meter payment
        $fetch = PrepaidPayment::where('email',\Auth::user()->email)->first();
        if($fetch !== NULL) {
            $meterNo = $fetch->meter_no;
        }else {
            $meterNo = "";
        }
                        
        return view('customer.customer_profile')->withMeterNo($meterNo);
    }
    public function makePayment()
    {
        $userEmail = \Auth::user()->email;
        //return $userEmail;
        
        $prepaid = PrepaidPayment::where('email', $userEmail)->first();
        //return $prepaid;
        return view('customer.make-payment')->withBefore($prepaid);
    }

    public function postPayment()
    {
        return "We are working on this <a href='/home'>Back</a>";
    }
    public function meterRequest()
    {
        return view('customer.meter_request');
        // return "We are working on this <a href='/home'>Back</a>";
    }
    public function postMeterRequest(Request $request)
    {
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
        $prepaid = PrepaidPayment::where('email', $userEmail)->paginate(10);
        return view('customer.payment_history')->withPayments($prepaid);
    }



    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

}
