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
use App\Mail\TransactionReceipt;

class AccountController extends Controller
{
    public function loginUser(Request $request)
    {
        // return $request;
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'is_activated' => 1])) {
            return response()->json(['sus' => 1]);
        } else {
            return response()->json(['err' => 'Email Address or Password is incorrect']);
        }
    }
    public function registerUser(Request $request)
    {
        // return $request;
        $checkMail = User::where('email', $request->email)->get();

        if (count($checkMail) == 1) {
            return response()->json(['err' => 'Email Already Exists']);
        }

        if($request->password !== $request->password_confirmation) {
            return response()->json(['err' => 'Password Does not Match']);
        }

        if ($request->has('referred')) {
            // Activate the bonus upon registration
            $fetchCustomer = User::where('refer_id', $request->referred)->firstOrFail();
            $customer = CustomerBiodata::where('user_id', $fetchCustomer->id)->firstOrFail();
            if ($fetchCustomer !== null) {
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

        $user = User::where('id', $userID)->firstOrFail();
        try {
            Mail::to($user->email)->send(new AccountActivation($user));
            return response()->json(['sus' => '1']);
        } catch (\Throwable $th) {
            return response()->json(['err' => 'We are unable to send you an email to complete your Account Registration, Please Retry Below', 'user' => $user,'is_email_error' => true]);
        }
        
    }

    /**
     * Resend Email Activation
     */

    public function resendEmail(Request $request)
    {
        $request = $request->user;
        try {
            Mail::to($request->email)->send(new AccountActivation($request));
            return response()->json(['sus' => '1']);
        } catch (\Throwable $th) {
            return response()->json(['is_email_error' => true,'err' => 'We are unable to send you an email to complete your Account Registration, Please Retry Below', 'user' => $request]);
        }
    }

    /**
     * Activate referred code and return the signup form
     */
    public function referredSignup($ref)
    {
        $findRef = User::where('refer_id', $ref)->firstOrFail();
        if (empty($findRef)) {
            return redirect('/');
        } else {
            // store refer ID to session
            session()->put('referred', $findRef->refer_id);
            session()->flash('success', 'Thank you for visiting GOENERGEE, Please Proceed to Signup');
            return redirect()->route('guest.signup');
            // return view('referral-signup')->withRef($findRef->refer_id);
        }
    }
    
    public function activateAccount($token)
    {
        // if(session()->has('referred'))
        $user = User::where('access_token', $token)->firstOrFail();
        if ($user->is_activated == 1) {
            Auth::login($user);
            return view('activating')->withDone(1);
        }
        $user->is_activated = 1;

        session()->forget('account_info');
        return view('activating');
    }

    
    public function paymentFrame()
    {
        return view('postpaidpayment-frame');
    }


    public function paymentHolder(Request $request)
    {
        /**
         *  Check if request is coming from agent
         *  then fetch out and check agent's biodata
         *  else hold payment information fir customers
         */
        if ($request->has('is_agent')) {
            // Logged in Agent
            $agentDetails = AgentBiodata::where('user_id', \Auth::user()->id)->firstOrFail();
            $adminDetails = AdminBiodata::firstOrFail();

            if ($agentDetails->wallet_balance < $request->amount || $adminDetails->wallet_balance < $request->amount) {
                return response()->json(['errorText' => 'Insufficient Balance to complete the payment']);
            }

            $paymentDetails[] = $request->all();
            
            // Flush Payment Details
            session()->forget('payment_details');
            if(auth()->check()) {
                $agent_id = auth()->id();
                $id['agent_id'] = $agent_id;
                $newarray = array_collapse(array_prepend($paymentDetails,$id));
                session()->put(['payment_details' => $newarray]);
            }
            
            return response()->json(['code' => 'ok', 'text' => session()->get('payment_details')]);
        }

        // Request is coming from the user
        $adminDetails = AdminBiodata::firstOrFail();

        if ($adminDetails->wallet_balance < $request->amount) {
            return response()->json(['code' => 'no']);
        }
        session(['payment_details' => $request->all()]);
        return response()->json(['code' => 'ok', 'text' => session()->get('payment_details')]);
    }

    /**
     * Customer Prepaid Payment View
     */
    public function prepaidPayment()
    {
        $bio = $this->customerData();
        return view('customer.prepaid-payment')->withBio($bio);
    }

    /**
     * Customer Postpaid Payment View
     */
    public function postpaidPayment()
    {
        $bio = $this->customerData();
        return view('customer.postpaid-payment')->withBio($bio);
        //return "We are working on this <a href='/home'>Back</a>";
    }

    public function paymentSuccess($user_type, $reff)
    {
        if (session()->exists('payment_details')) {
            $paymentDetails = session('payment_details');
            // return $paymentDetails;
            $tokenDetails = session()->get('token_data');
            // Insert into prepaid_payment
            $prepaid = new Payment;

            // Set a variable for the token data
            if (isset($tokenDetails['response']['orderDetails']['tokenData'])
                &&
                isset($tokenDetails['response']['orderDetails']['tokenData']['stdToken']['value'])) {
                $token_data = $tokenDetails['response']['orderDetails']['tokenData']['stdToken']['value'];
            }

            $bonus_token = "";
            
            // if bonus token is generated then set it
            if (isset($tokenDetails['response']['orderDetails']['tokenData'])
                &&
                isset($tokenDetails['response']['orderDetails']['tokenData']['bsstToken'])) {
                $bonus_token = $tokenDetails['response']['orderDetails']['tokenData']['bsstToken']['value'];
            }

            $paymentId = "";
            $paymentId = DB::table('payments')->insertGetId([
                'first_name' => $paymentDetails['firstname'],
                'last_name' => $paymentDetails['lastname'],
                'email' => $paymentDetails['email'],
                'phone_number' => $paymentDetails['mobile'],
                'customer_address' => $tokenDetails['response']['orderDetails']['customerAddress'],
                'district' => $tokenDetails['response']['orderDetails']['customerBusinessUnit'],
                'meter_no' => $paymentDetails['meterno'],
                'token_data' => isset($token_data) ? $token_data : $tokenDetails['response']['orderDetails']['tokenData']['status']['value'],
                'bonus_token' => isset($bonus_token) ? $bonus_token : null,
                'user_type' => $tokenDetails['response']['orderDetails']['customerAccountType'],
                'transaction_type' => "Web",
                'transaction_ref' => $reff,
                'payment_ref' => $tokenDetails['response']['orderDetails']['paymentReference'],
                'order_id' => $tokenDetails['response']['orderDetails']['orderId'],
                'value_of_kwh' => (isset($tokenDetails['response']['orderDetails']['tokenData']['stdToken']['units']) ? $tokenDetails['response']['orderDetails']['tokenData']['stdToken']['units'] : $tokenDetails['response']['orderDetails']['tokenData']['status']['value']),
                'is_agent' => (isset($paymentDetails['is_agent']) && $paymentDetails['is_agent'] == '1') ? true : false,
                'agent_id' => (isset($paymentDetails['is_agent']) ? $paymentDetails['agent_id'] : 0 ),
                'purpose' => $tokenDetails['response']['orderDetails']['purpose'],
                'payment_status' => $tokenDetails['response']['orderDetails']['status'],
                'created_at' => new Carbon('now'),
                'updated_at' => new Carbon('now'),
            ]);

            // Transaction Came from an agent
            if (isset($paymentDetails['is_agent']) && $paymentDetails['is_agent'] == '1') {
                // $transaction = new Transaction;
                $transaction = new AgentTransaction;
                $agentBio = AgentBiodata::where('user_id', \Auth::user()->id)->firstOrFail();

                $transaction->payment_id = $paymentId;
                $transaction->agent_id = $agentBio->agent_id;
                $transaction->initial_amount = $paymentDetails['amount'];
                $transaction->conv_fee = 100;

                $total_amount = $paymentDetails['amount'] + 100;
                $commission = $paymentDetails['amount'] * 0.02;
                $pgp = $total_amount * 0.015;
                $bal = (100 + $commission) - $pgp;
                $spec = round($bal * 0.1, 2);
                $ralmuof = round($bal * 0.9, 2);
                $totalSplit = ($pgp + $bal + $spec + $ralmuof) - $bal;
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
                $adminBio = AdminBiodata::firstOrFail();
                //return $adminBio;

                $adminBio->wallet_balance -= $netAmount;
                $agentBio->wallet_balance -= $paymentDetails['amount'];

                $transaction->wallet_bal = $adminBio->wallet_balance;

                $transaction->save();
                $adminBio->save();
                $agentBio->save();

                return redirect()->route('receipt', [$tokenDetails['response']['orderDetails']['orderId'], $user_type]);
            }

            // Transaction is not coming from an agent
            $transaction = new Transaction;

            $transaction->payment_id = $paymentId;
            $transaction->initial_amount = $paymentDetails['amount'];
            $transaction->conv_fee = 100;

            $total_amount = $paymentDetails['amount'] + 100;
            $commission = $paymentDetails['amount'] * 0.02;
            $pgp = $total_amount * 0.015;
            $bal = (100 + $commission) - $pgp;
            $spec = round($bal * 0.1, 2);
            $ralmuof = round($bal * 0.9, 2);
            $totalSplit = ($pgp + $bal + $spec + $ralmuof) - $bal;
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
            $adminBio = AdminBiodata::firstOrFail();

            $adminBio->wallet_balance -= $netAmount;
            // $agentBio->wallet_balance -= $total_amount;

            $transaction->wallet_bal = $adminBio->wallet_balance;

            $transaction->save();
            $adminBio->save();

            // return $transaction;
            return redirect()->route('receipt', [$tokenDetails['response']['orderDetails']['orderId'], $user_type]);
        }

        return redirect('/');
    }

    // Payment for mobile
    public function mobilePaymentSuccess($user_type, $reff)
    {
        if (session()->exists('payment_details')) {

            $paymentDetails = session('payment_details')['data'];

            $tokenDetails = session()->get('token_data')['data'];
            // Insert into prepaid_payment
            $prepaid = new Payment;

            // Set a variable for the token data
            if (isset($tokenDetails['response']['orderDetails']['tokenData'])
                &&
                isset($tokenDetails['response']['orderDetails']['tokenData']['stdToken']['value'])) {
                $token_data = $tokenDetails['response']['orderDetails']['tokenData']['stdToken']['value'];
            }

            $bonus_token = "";
            
            // if bonus token is generated then set it
            if (isset($tokenDetails['response']['orderDetails']['tokenData'])
                &&
                isset($tokenDetails['response']['orderDetails']['tokenData']['bsstToken'])) {
                $bonus_token = $tokenDetails['response']['orderDetails']['tokenData']['bsstToken']['value'];
            }

            $paymentId = "";
            $paymentId = DB::table('payments')->insertGetId([
                'first_name' => $paymentDetails['firstname'],
                'last_name' => $paymentDetails['lastname'],
                'email' => $paymentDetails['email'],
                'phone_number' => $paymentDetails['mobile'],
                'customer_address' => $tokenDetails['response']['orderDetails']['customerAddress'],
                'district' => $tokenDetails['response']['orderDetails']['customerBusinessUnit'],
                'meter_no' => $paymentDetails['meterno'],
                'token_data' => isset($token_data) ? $token_data : null,
                'bonus_token' => isset($bonus_token) ? $bonus_token : null,
                'user_type' => $tokenDetails['response']['orderDetails']['customerAccountType'],
                'transaction_type' => "Mobile",
                'transaction_ref' => $reff,
                'payment_ref' => $tokenDetails['response']['orderDetails']['paymentReference'],
                'order_id' => $tokenDetails['response']['orderDetails']['orderId'],
                'value_of_kwh' => (isset($tokenDetails['response']['orderDetails']['tokenData']['stdToken']['units']) ? $tokenDetails['response']['orderDetails']['tokenData']['stdToken']['units'] : 0),
                'is_agent' => (isset($paymentDetails['is_agent']) && $paymentDetails['is_agent'] == '1') ? true : false,
                'purpose' => $tokenDetails['response']['orderDetails']['purpose'],
                'payment_status' => $tokenDetails['response']['orderDetails']['status'],
                'created_at' => new Carbon('now'),
                'updated_at' => new Carbon('now'),
            ]);

            // Transaction Came from an agent

            if (isset($paymentDetails['is_agent']) && $paymentDetails['is_agent'] == '1') {
                // $transaction = new Transaction;
                $transaction = new AgentTransaction;
                $agentBio = AgentBiodata::where('user_id', \Auth::user()->id)->firstOrFail();

                $transaction->payment_id = $paymentId;
                $transaction->agent_id = $agentBio->agent_id;
                $transaction->initial_amount = $paymentDetails['amount'] - 100;
                $transaction->conv_fee = 100;

                $total_amount = $paymentDetails['amount'];
                $initial_am = $paymentDetails['amount'] - 100;
                $commission =  $initial_am * 0.02;
                $pgp = $total_amount * 0.015;
                $bal = (100 + $commission) - $pgp;
                $spec = round($bal * 0.1, 2);
                $ralmuof = round($bal * 0.9, 2);
                $totalSplit = ($pgp + $bal + $spec + $ralmuof) - $bal;
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
                $adminBio = AdminBiodata::firstOrFail();
                //return $adminBio;

                $adminBio->wallet_balance -= $netAmount;
                $agentBio->wallet_balance -= $paymentDetails['amount'];

                $transaction->wallet_bal = $adminBio->wallet_balance;

                $transaction->save();
                $adminBio->save();
                $agentBio->save();

                return redirect()->route('receipt', [$tokenDetails['response']['orderDetails']['orderId'], $user_type]);
            }

            // Transaction is not coming from an agent
            $transaction = new Transaction;

            $transaction->payment_id = $paymentId;
            $transaction->initial_amount = $paymentDetails['amount'] - 100;
            $transaction->conv_fee = 100;

            $total_amount = $paymentDetails['amount'];
            $initial_am = $paymentDetails['amount'] - 100;
            $commission =  $initial_am * 0.02;
            $pgp = $total_amount * 0.015;
            $bal = (100 + $commission) - $pgp;
            $spec = round($bal * 0.1, 2);
            $ralmuof = round($bal * 0.9, 2);
            $totalSplit = ($pgp + $bal + $spec + $ralmuof) - $bal;
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
            $adminBio = AdminBiodata::firstOrFail();

            $adminBio->wallet_balance -= $netAmount;
            // $agentBio->wallet_balance -= $total_amount;

            $transaction->wallet_bal = $adminBio->wallet_balance;

            $transaction->save();
            $adminBio->save();

            // return $transaction;
            return response()->json(
                [
                    'order' => $tokenDetails['response']['orderDetails']['orderId'],
                    'user' => $user_type
                ]
            );
        }

        // return redirect('/mobile');
    }

    public function generateReceipt($orderId, $user_type)
    {
        return view('generate-receipt', compact('orderId', 'user_type'));
    }

    public function fetchReceiptDetails($orderId, $user_type)
    {
        // Fetch Payment Details from database
        $payment = Payment::where('order_id', $orderId)->firstOrFail();
        // If Payment was made by an agent
        if ($payment->is_agent == true) {
            $payment = Payment::where('order_id', $orderId)->with('agent_transaction')->firstOrFail();
        }else {
            $payment = Payment::where('order_id', $orderId)->with('transaction')->firstOrFail();
        }

        try {
            // Only send mail when the token is generated || the user type is POSTPAID
            if($payment->payment_status == "CONFIRMED" || $payment->user_type == "OFFLINE_POSTPAID") {
                $mail = Mail::to("$payment->email")->send(new TransactionReceipt($payment, $user_type));
            }
            // return response to frontend
            return response()->json($payment);    
        }catch(\Exception $e) {
            // Return exceptions
            return response()->json([$payment,["errors" => $e]]); 
        }
        
    }


    public function postpaidpaymentSuccess($ref)
    {
        if (session()->exists('payment_details')) {
            $paymentDetails = session('payment_details');

            // Insert into prepaid_payment
            $prepaid = new Payment;
            $transaction = new Transaction;

            $is_agent = false;

            $agentBio = AgentBiodata::where('user_id', \Auth::user()->id)->firstOrFail();

            if ($paymentDetails['is_agent'] == 1) {
                $is_agent = true;
            }
            $paymentId = DB::table('payments')->insertGetId([
                'first_name' => $paymentDetails['first_name'],
                'last_name' => $paymentDetails['last_name'],
                'email' => $paymentDetails['email'],
                'phone_number' => $paymentDetails['mobile'],
                'meter_no' => $paymentDetails['meter_no'],
                'recharge_pin' => rand(1234, 5334) . " " . rand(2324, 24980),
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
            $spec = round($bal * 0.1, 2);
            $ralmuof = round($bal * 0.9, 2);
            $totalSplit = ($pgp + $bal + $spec + $ralmuof) - $bal;
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
            $adminBio = AdminBiodata::firstOrFail();

            $adminBio->wallet_balance -= $netAmount;

            $transaction->wallet_bal = $adminBio->wallet_balance;

            if ($paymentDetails['is_agent'] == 1) {

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


            return redirect()->route('finalize', [$smsNumber, $ref]);

            session()->forget('payment_details');

            return back();
        }
    }

    public function loggedPostpaidPaymentSuccess($ref)
    {
        if (session()->exists('payment_details')) {
            $paymentDetails = session('payment_details');

            // Insert into prepaid_payment
            $prepaid = new Payment;
            $transaction = new Transaction;

            $is_agent = false;

            $agentBio = AgentBiodata::where('user_id', \Auth::user()->id)->firstOrFail();

            if ($paymentDetails['is_agent'] == 1) {
                $is_agent = true;
            }
            $paymentId = DB::table('payments')->insertGetId([
                'first_name' => $paymentDetails['first_name'],
                'last_name' => $paymentDetails['last_name'],
                'email' => $paymentDetails['email'],
                'phone_number' => $paymentDetails['mobile'],
                'meter_no' => $paymentDetails['meter_no'],
                'recharge_pin' => rand(1234, 5334) . " " . rand(2324, 24980),
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
            $spec = round($bal * 0.1, 2);
            $ralmuof = round($bal * 0.9, 2);
            $totalSplit = ($pgp + $bal + $spec + $ralmuof) - $bal;
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
            $adminBio = AdminBiodata::firstOrFail();

            $adminBio->wallet_balance = $adminBio->wallet_balance - $netAmount;

            $transaction->wallet_bal = $adminBio->wallet_balance;

            if ($paymentDetails['is_agent'] == 1) {
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


            return redirect()->route('finalize', [$smsNumber, $ref]);

            session()->forget('payment_details');

            return back();
        }
    }

    // public function loggedAgentPostpaidPaymentSuccess($ref)
    // {
        
    // }
    public function home()
    {
        if (\Auth::check()) {
            $role = \Auth::user()->role_id;
            switch ($role) {
                // Admin is Logged in
                case '1':
                    return redirect('/backend/finance');
                    break;
                case '2':
                //  Agent is logged in
				//  Redirect to Dashboard
					return redirect('agent/dashboard');
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
        } else {
            return redirect('/')->withError('Session Expired, Please Login');
        }

    }

    public function customerProfile()
    {
        // Fetch User Profile From CustomerBiodata
        $profile = User::where('id', \Auth::user()->id)->with('customer')->firstOrFail();
        // return $profile;
        return view('customer.customer_profile')->withProfile($profile);
    }

    public function validateMeter($meter, CIController $ci)
    {
        if (auth()->check()) {
            $user = User::where('id', auth()->id())->first();
            
            // Check if user already updated their profile
            if ($user->is_completed == 1) {
                $account_type = "PREPAID";
                if (str_contains($meter, '-') == true) {
                    $account_type = "POSTPAID";
                }
                return $account_type;
                $valid = $ci->validateCustomer($account_type, $meter);
                return $valid;
                // return response()->json(['response' => ['retn' => 0, 'desc' => 'Request Successful']]);

            } else {

                $user = CustomerBiodata::where('meter_no', $meter)->count();
                // if no user already used the meter no
                if ($user < 1) {
                    // Validate the customer from EKO
                    $account_type = "PREPAID";
                    if (str_contains($meter, '-') == true) {
                        $account_type = "POSTPAID";
                    }
                    // return $account_type;
                    $valid = $ci->validateCustomer($account_type, $meter);
                    return $valid;
                }

                return response()->json(['response' => ['retn' => 233, 'error' => 'A user already used the meter no']]);
            }
        }
        // 


    }

    // Hold Token Generated Data
    public function holdToken(Request $request)
    {
        if (!empty($request)) {
            session()->put(['token_data' => $request->all()]);
        }

        return response()->json('ok');
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
        if ($user->refer_id == null) {
            $user->refer_id = str_random(10);
        }

        $bio = CustomerBiodata::where('user_id', $request->customer_id)->firstOrFail();

        $bio->meter_no = $request->meter_no;
        $bio->address = $request->address;

        if ($request->hasFile('profile_pic')) {
            $user->avatar = $request->file('profile_pic')->store('avatars', 'public');
        }
        if ($request->has('password') && strlen($request->password) > 1) {
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

        $prepaid = Payment::where('email', $userEmail)->firstOrFail();
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

        session()->flash('success', 'Meter Request Submitted Successfully, Our Admin has been notified, we would get back to you shortly');

        return back();
    }

    public function paymentHistory()
    {
        $userEmail = \Auth::user()->email;
        //return $userEmail;
        $prepaid = Payment::where('email', $userEmail)->with('transaction')->orderBy('created_at','ASC')->paginate(10);
        // return $prepaid;
        return view('customer.payment_history')->withPayments($prepaid);
    }

    public function ViewPaymentReciept($orderId)
    {
        $userEmail = \Auth::user()->email;
        $reciepts = Payment::where('email', $userEmail)->where('id', $reciept_id)
            ->with('transaction')->firstOrFail();
        // return $reciepts;
        return view('customer.payment_reciept', compact('reciepts'));
    }

    public function pdfDownload($order_id)
    {
        $userEmail = \Auth::user()->email;
        $reciepts = Payment::where('order_id', $order_id)->with('transaction')->firstOrFail();
        return $reciepts;
        // $pdf = PDF::loadView('customer.payment_reciept', compact('reciepts'));
        // return $pdf->download('invoice.pdf');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function customerData()
    {
        return User::where('id', \Auth::user()->id)->with('customer')->firstOrFail();
    }

    public function updateFunds($amount)
    {
        $user = CustomerBiodata::where('user_id', auth()->id())->firstOrFail();
        $user->wallet_balance += $amount;
        $user->save();

        return response()->json(['msg' => 'success']);
    }
}
// 