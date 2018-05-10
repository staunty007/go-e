<?php

namespace App\Http\Controllers;
use Auth;
use Mail;
use Session;
use App\User;
use Validator;
use App\PrepaidPayment;
use Illuminate\Http\Request;
use App\Mail\AccountActivation;

class AccountController extends Controller
{
    public function loginUser(Request $request) {
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password,'is_activated' => 1])) {
            return response()->json(['sus'=> 1]);
        }else {
            return response()->json(['err' => 'Email Address or Password is incorrect']);
        }
    }
    public function registerUser(Request $request) {

        $checkMail = User::where('email',$request->email)->get();

    
        if(count($checkMail) == 1) {
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

    public function sendAccountMail() {

        if(session()->exists('account_info')) {
            $accountInfo = session('account_info');

            Mail::to($accountInfo->email)->send(new AccountActivation($accountInfo));

            return view('emails.sent-success');
        }
        return redirect('/');
    }

    public function activateAccount($token) {
        $user = User::where('access_token',$token)->first();

        $user->is_activated = 1;

        $user->save();

        Auth::login($user, true);

        return view('activating');

        
    }

    public function paymentHolder(Request $request) {
        session(['payment_details' => $request->all()]);

        return response()->json(['code' => 'ok']);
    }

    public function paymentSuccess($ref) {

        if(session()->exists('payment_details')) {
            $paymentDetails = session('payment_details');

            //return $paymentDetails;

            // Insert into prepaid_payment 
            $prepaid = new PrepaidPayment;

            $prepaid->first_name = $paymentDetails['first_name'];
            $prepaid->last_name = $paymentDetails['last_name'];
            $prepaid->phone_number = $paymentDetails['mobile'];
            $prepaid->meter_no = $paymentDetails['meter_no'];
            $prepaid->amount = $paymentDetails['amount'];
            $prepaid->conv_fee = 100;
            $prepaid->total_amount = $paymentDetails['amount'] + 100;
            $prepaid->transaction_ref = $ref;

            $prepaid->save();

            return redirect('/');
        }

        return redirect('/');
        
    }
    public function home() {
        return view('customer.dashboard');
    }

    public function customerProfile() {
        
    }
    public function makePayment() {

        return view('customer.make-payment');

    }

    public function postPayment() {
        return "We are working on this <a href='/home'>Back</a>";
    }
    public function meterRequest() {
        return "We are working on this <a href='/home'>Back</a>";
    }
    public function paymentHistory() {
        return "We are working on this <a href='/home'>Back</a>";
    }



    public function logout() {
        Auth::logout();

        return redirect('/');
    }
}
