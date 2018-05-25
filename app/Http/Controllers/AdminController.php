<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;
use App\Transaction;
use Carbon\Carbon;
use App\User;
use Auth;
use App\Http\Requests\UpdateUser;
use App\MeterRequest;
use App\AdminBiodata;

class AdminController extends Controller
{
    private $prefix = "users.admin.";

    //private $view = view($this.pre)
    
    public function home()
    {
        // $admin = AdminBiodata::find(1);
        // $balance = $admin->wallet_balance;

        // return $balance;


        // return $this->view('home');
    }

    public function v($file, $data=[])
    {
        return view($this->prefix.$file, compact('data'));
    }
    public function finance()
    {
        $data=[];
        // $firstdayofmonth = date("Y-m-01");

        // $monthlysalesprepaid = Payment::where('created_at', '>', $firstdayofmonth)->sum('total_amount');
        // $monthlysalespostpaid = Payment::where('created_at', '>', $firstdayofmonth)->sum('total_amount');

        // $data['salesthismonth'] = $monthlysalesprepaid+ $monthlysalespostpaid;

        // $today=date("Y-m-d 00:00:00");

        // $salesprepaid = Payment::where('created_at', '>', $today)->count();
        // $salespostpaid = Payment::where('created_at', '>', $today)->count();

        // $data['salestoday']= $salesprepaid+ $salespostpaid;
        

        // $start = new Carbon('first day of last month');
        // $end = new Carbon('last day of last month');

        // $incomelastmonthprepaid = Payment::whereBetween('created_at', [$start,$end])->sum('total_amount');
        // $incomelastmonthpostpaid = Payment::whereBetween('created_at', [$start, $end])->sum('total_amount');
        
        // $data['incomelastmonth']= $incomelastmonthprepaid + $incomelastmonthpostpaid;
        // $start = new Carbon('first day of this year');
        
        // $salescurrentyearprepaid = Payment::where('created_at', '>', $start)->sum('total_amount');
        // $salescurrentyearpostpaid = Payment::where('created_at', '>', $start)->sum('total_amount');

        // $data['salescurrentyear'] = $salescurrentyearprepaid + $salescurrentyearpostpaid;

        $data['registeredcustomers']= User::where('role_id', 0)->count();
        $data['registeredagents'] = User::where('role_id', 2)->count();

        // Wallet Balance
        /**
         * Finds Users with id of 1,
         * Which is the Admin by default;
         * And return the result of their wallet balance
         */
        $admin = AdminBiodata::find(1);
        $data['wallet_balance'] = $admin->wallet_balance;

        //Income
        // $incomePrepaid = Payment::where('user_type',1)->with('transaction')->get();
        // //eturn $incomePrepaid;
        // $incomePostpaid = Payment::where('user_type',2)->with('transaction')->sum('total_amount');
        
        // $income = $incomePrepaid + $incomePostpaid;
        $data['income'] = 0;

        // Avg Daily Earning
        $countPrepaid = Payment::where('user_type',1)->count();
        $countPostpaid = Payment::where('user_type',2)->count();

        // $allTransaction = $countPrepaid + $countPostpaid;
        // $averageDaily = $income / $allTransaction;

        $data['avg_daily'] = 1;

        return $this->v('finance', $data);
    }




    public function profile()
    {
        $user=Auth::user();
        return $this->v('profile', $user);
    }




    public function updateprofile(UpdateUser $request)
    {
        $user=User::find(Auth::user()->id);
        $user->first_name=$request->first_name;
        $user->last_name=$request->last_name;

        if ($request->hasFile('avatar')) {
            $user->avatar = $request->file('avatar')->store('avatars', 'public');
        }
        $user->save();
        return back();
    }


    public function directTransactions()
    {
        // Direct Payment
        $payment = Payment::where('is_agent',0)->with('transaction')->get();
        // All Customers
        $customers = User::where('role_id',0)->count();
        // All Prepaid Payments
        $prepaids = Payment::where('user_type',1)->count();
        // All Postpaid Payments
        $postpaids = Payment::where('user_type',2)->count();

        return view($this->prefix.'direct-payment')
            ->withPayment($payment)
            ->withCustomers($customers)
            ->withPrepaids($prepaids)
            ->withPostpaids($postpaids)
            ;
        
    }
    public function agentTransactions()
    {
        // Direct Payment
        $payment = Payment::where('is_agent',1)->with('agent_transaction')->get();

        // return $payment;
        // All Customers
        $customers = User::where('role_id',0)->count();
        // All Prepaid Payments
        $prepaids = Payment::where('user_type',1)->count();
        // All Postpaid Payments
        $postpaids = Payment::where('user_type',2)->count();

        return view($this->prefix.'agent-payment')
            ->withPayment($payment)
            ->withCustomers($customers)
            ->withPrepaids($prepaids)
            ->withPostpaids($postpaids)
            ;
    }

    public function customer_report()
    {
        $data=[];

        $prepaidCount = PrepaidPayment::all()->count();

        $postpaidCount = PostpaidPayment::all()->count();

        $prepaidPayments = PrepaidPayment::all();

        $postpaidPayments = PostpaidPayment::all();

        $data = collect([$prepaidPayments,$postpaidPayments]);

        // return $data->collapse();

        $admin = AdminBiodata::find(1);
        
        $totalCustomers = User::where('role_id',0)->count();
        // $dailySignup = User::where('created_at',new Carbon('today'))->count();
        return view($this->prefix.'customer_report')
                ->withData(array_collapse($data))
                ->withCustomers($totalCustomers)
                ->withPrepaids($prepaidCount)
                ->withPostpaids($postpaidCount)
                // ->withDailySignup($dailySignup)
                ;
    }




    public function payment_history()
    {
        return $this->v('payment_history');
    }




    public function demographics()
    {
        return $this->v('demographics');
    }
    public function meter_admin()
    {
        $meter_requests = MeterRequest::all();
        return view($this->prefix.'meter_admin')->withRequests($meter_requests);
        // return $this->v('meter_admin', compact('meter_requests'));
    }
    public function settings()
    {
        return $this->v('settings');
    }
    public function sms()
    {
        return $this->v('sms');
    }

    // complete admin topup
    public function completeTopup($amount) {

        $biodata = AdminBiodata::find(1);

        //return $biodata;

        if($biodata == NULL) {
            $addUser = new AdminBiodata;

            $addUser->user_id = 1;
            $addUser->wallet_balance += $amount;
    
            $addUser->save();
            
            return redirect('home')->withSuccess('Topup Successfull');
        }

        $biodata->wallet_balance += $amount;

        $biodata->save();

    
        return redirect('home')->withSuccess('Topup Successfull');
    }
}
