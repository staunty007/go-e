<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;
use Carbon\Carbon;
use App\Transaction;
use App\AgentTransaction;
use App\User;
use Auth;
use App\Http\Requests\UpdateUser;
use App\MeterRequest;
use App\AdminBiodata;
use App\CustomerBiodata;

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
        //$firstdayofmonth = date("Y-m-01");

        // $monthlysalesprepaid = Payment::where('created_at', '>', $firstdayofmonth)->sum('total_amount');
        // $monthlysalespostpaid = Payment::where('created_at', '>', $firstdayofmonth)->sum('total_amount');

        // $data['salesthismonth'] = $monthlysalesprepaid+ $monthlysalespostpaid;

        // $today=date("Y-m-d 00:00:00");

        // $salesprepaid = Payment::where('created_at', '>', $today)->count();
        // $salespostpaid = Payment::where('created_at', '>', $today)->count();

        // $data['salestoday']= $salesprepaid+ $salespostpaid;
        

        $start = new Carbon('first day of last month');
        $end = new Carbon('last day of last month');

        $transactionDirectMonth = Transaction::whereBetween('created_at', [$start,$end])->sum('total_amount');
        $transactionAgentMonth = AgentTransaction::whereBetween('created_at', [$start,$end])->sum('total_amount');

        $data['avgMonthlySales'] = $transactionDirectMonth + $transactionAgentMonth / 30;


        // $incomelastmonthprepaid = Payment::whereBetween('created_at', [$start,$end])->sum('total_amount');
        // $incomelastmonthpostpaid = Payment::whereBetween('created_at', [$start, $end])->sum('total_amount');
            
        // $data['incomelastmonth']= $incomelastmonthprepaid + $incomelastmonthpostpaid;
        // $start = new Carbon('first day of this year');
        
        // $salescurrentyearprepaid = Payment::where('created_at', '>', $start)->sum('total_amount');
        // $salescurrentyearpostpaid = Payment::where('created_at', '>', $start)->sum('total_amount');

        // $data['salescurrentyear'] = $salescurrentyearprepaid + $salescurrentyearpostpaid;

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
        
        /**
         * Income = 
         * TotalDirectTransaction('ralmuof') / TotalDirectCount 
         * + 
         * TotalAgentTransaction('ralmuof') + TotalAgentCount
         */
        $income = Transaction::sum('ralmuof') + AgentTransaction::sum('ralmuof');
        $data['income'] = $income;

        // Avg Earning
        $transaction_counts = Transaction::all()->count() + AgentTransaction::all()->count();

        $avgEarn = 0;
        if($transaction_counts !== 0) {
            $avgEarn = $income / $transaction_counts;
        }

        $countPostpaid = Payment::where('user_type',2)->count();

        // $allTransaction = $countPrepaid + $countPostpaid;
        // $averageDaily = $income / $allTransaction;

        $data['avg_earn'] = $avgEarn;

        // customer base
        $customers = User::where('role_id',0)->count();
        $data['customers'] = $customers;
        $data['agents'] = User::where('role_id', 2)->count();

        $totalAmounts = Transaction::sum('total_amount') + AgentTransaction::sum('total_amount');

        $data['avg_transaction'] = 0;

        if($totalAmounts !== 0){
            $data['avg_transaction'] = $totalAmounts / $transaction_counts;
        }
        
        $data['postpaid_users'] = CustomerBiodata::where('user_type',2)->count();
        $data['prepaid_users'] = CustomerBiodata::where('user_type',1)->count();

        // Average Daily Profit
        $todayStarted = Carbon::today();
        $endofToday =   date('Y-m-d 23:59:59');
        $transactionDirectToday = Transaction::whereBetween('created_at', [$todayStarted,$endofToday])->sum('total_amount');
        $transactionAgentToday = AgentTransaction::whereBetween('created_at', [$todayStarted,$endofToday])->sum('total_amount');
        $transactionDirectTodayCount = Transaction::whereBetween('created_at', [$todayStarted,$endofToday])->count();
        $transactionAgentTodayCount = AgentTransaction::whereBetween('created_at', [$todayStarted,$endofToday])->count();

        $todayCount = $transactionDirectTodayCount + $transactionAgentTodayCount;

        //return $todayCount;
        $totalToday = $transactionDirectToday + $transactionAgentToday;

        $data['avg_daily_p'] = 0;
        if($totalToday !== 0) {
            $avg_profit_daily = $totalToday / $todayCount;
            $data['avg_daily_p'] = $avg_profit_daily;
        }
    
    
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
        $user->mobile = $request->phone;

        if($request->password !== NULL) {
            $user->password = bcrypt($request->password);
        }

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

    public function topupTracker()
    {
        return view($this->prefix.'topup-tracker');
    }
    public function agentTopupTracker()
    {
        return view($this->prefix.'agent-topup-tracker');
    }
}
