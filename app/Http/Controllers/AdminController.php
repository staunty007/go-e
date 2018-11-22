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
use DB;
use App\AgentBiodata;

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

        $start = new Carbon('first day of last month');
        $end = new Carbon('last day of last month');

        $transactionDirectMonth = Transaction::whereBetween('created_at', [$start,$end])->sum('total_amount');
        $transactionAgentMonth = AgentTransaction::whereBetween('created_at', [$start,$end])->sum('total_amount');

        $data['avgMonthlySales'] = $transactionDirectMonth + $transactionAgentMonth / 30;

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
        
        $payments = Payment::where('is_agent', 0)->with('transaction')->latest()->get();
        // return $payments;
        // TotalWalletDeposit
        $deps = DB::table('admin_topups')->sum('topup_amount');

        //return $payments;
        $wallet_balance = AdminBiodata::first();

        // return view($this->prefix . 'finance')
        //     ->withFinances($payments)
        //     ->withBalance($wallet_balance->wallet_balance);

    
       return $this->v('finance', $data)
           ->withFinances($payments)
            ->withBalance($wallet_balance->wallet_balance);
    }

    public function financeFilterDate(Request $request)
    {
        $from = Carbon::parse($request->from);
        $to = Carbon::parse($request->to);

        $finances = Payment::whereBetween('created_at', [$from, $to])->get();
        // return $finances;
        $wallet_balance = AdminBiodata::first();
        return view($this->prefix.'finance', compact('finances'))->withBalance($wallet_balance->wallet_balance);
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

        if($request->has('password') && strlen($request->password) > 1) {
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
        $payment = Payment::where('is_agent',0)->with('transaction')->orderBy('created_at','desc')->get();
        // All Customers
        $customers = User::where('role_id',0)->count();
        // All Prepaid Payments
        $prepaids = Payment::where('user_type','OFFLINE_PREPAID')->count();
        // All Postpaid Payments
        $postpaids = Payment::where('user_type','OFFLINE_POSTPAID')->count();

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
    public function postpaid_bill()
    {
        return $this->v('postpaid_bill');
    }
    public function income_channel()
    {
        return $this->v('income_channel');
    }
    public function manage_referal()
    {
        return $this->v('manage_referal');
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
    public function crm()
    {
        return $this->v('crm');
    }
    public function customerlist()
    {
        $customers = [];
        $countCustomers = Payment::count();
        $customers['total'] = $countCustomers;

        $directCustomers = Payment::where('is_agent',0)->count();
        $customers['direct'] = $directCustomers;
        $agentCustomers = Payment::where('is_agent',1)->count();
        $customers['agent'] = $agentCustomers;

        $directCustomersCollection = Payment::where('is_agent',0)->with('transaction')->get();
        $agentCustomersCollection = Payment::where('is_agent',1)->with('agent_transaction')->get();
        return view($this->prefix.'customerlist')
            ->withCustomers($customers)
            ->withDirectCollection($directCustomersCollection)
            ->withAgentCollection($agentCustomersCollection)
            ;
    }
    public function managecustomers()
    {
        return $this->v('managecustomers');
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

        $bal = $biodata->wallet_balance += $amount;

        //return $bal;

        $trans_ref = str_random(20);
        $adminID = "Admin001";
        $adminName = "Admin Goenergee";

        DB::table('admin_topups')->insert([
            'trans_ref' => $trans_ref,
            'admin_id' => $adminID,
            'admin_name' => $adminName,
            'topup_amount' => $amount,
            'wallet_balance' => $bal,
            'created_at' => new Carbon('now'),
            'updated_at' => new Carbon('now')
        ]);
        

        $biodata->save();

    
        return redirect('home')->withSuccess('Topup Successfull');
    }

    public function topupTracker()
    {
        $adminTotalTopups = DB::table('admin_topups')->sum('topup_amount');
        $agentTotalTopups = DB::table('agent_topups')->sum('topup_amount');
        $totalTops = $adminTotalTopups + $agentTotalTopups;

        $allAdminTopups = DB::table('admin_topups')->get();
        // return $adminTotalTopups;
        return view($this->prefix.'topup-tracker')
            ->withAdminTotalTops($adminTotalTopups)
            ->withAgentTotalTops($agentTotalTopups)
            ->withTotalTops($totalTops)
            ->withTopups($allAdminTopups)
            ;
    }
    public function agentTopupTracker()
    {
        $adminTotalTopups = DB::table('admin_topups')->sum('topup_amount');
        $agentTotalTopups = DB::table('agent_topups')->sum('topup_amount');
        $totalTops = $adminTotalTopups + $agentTotalTopups;

        $allAgentTopups = DB::table('agent_topups')->get();
        return view($this->prefix.'agent-topup-tracker')
            ->withAdminTotalTops($adminTotalTopups)
            ->withAgentTotalTops($agentTotalTopups)
            ->withTotalTops($totalTops)
            ->withTopups($allAgentTopups)
        ;
    }

    public function agentSales(){
        $sales = [];

        $totalAgentSales = Payment::where('is_agent',1)->count();
        $sales['totalSales'] = $totalAgentSales;

        $totalWalletDep = DB::table('agent_topups')->where('agent_id','=',\Auth::user()->id)->sum('topup_amount');
        $sales['totalDeposit'] = $totalWalletDep;

        $agbara_agents = AgentBiodata::where('business_district','Agbara')->with('user')->get();
        $ojo_agents = AgentBiodata::where('business_district','Ojo')->with('user')->get();
        $festac_agents = AgentBiodata::where('business_district','Festac')->with('user')->get();
        $ijora_agents = AgentBiodata::where('business_district','Ijora')->with('user')->get();
        $mushin_agents = AgentBiodata::where('business_district','Mushin')->with('user')->get();
        $apapa_agents = AgentBiodata::where('business_district','Apapa')->with('user')->get();
        $lekki_agents = AgentBiodata::where('business_district','Lekki')->with('user')->get();
        $island_agents = AgentBiodata::where('business_district','Island')->with('user')->get();

        return view($this->prefix.'agent-sales', compact(
            'sales','lekki_agents','agbara_agents','ojo_agents','festac_agents',
            'mushin_agents','apapa_agents','island_agents','ijora_agents'));

            // ->withSales($sales)
            // ->withlekkiAgents($lekki_agents)
            
    }


    public function income() {
        //  totals
        $totals = [];

        // Paystack Income Colllection
        $transactions = Transaction::all('pgp','ralmuof','spec','created_at');
        $agenttransactions = AgentTransaction::all('pgp','ralmuof','spec','agent','created_at');

        // return $transactions;
        $pgpAgent = AgentTransaction::all()->pluck('pgp');
        
        $pgpDirectTotal = Transaction::all()->sum('pgp');
        $pgpAgentTotal = AgentTransaction::all()->sum('pgp');

        $pgpTotal = $pgpDirectTotal + $pgpAgentTotal;
        $pgpCollection = array_flatten(collect([$transactions,$agenttransactions]));

        // return array_flatten($pgpCollection);
        $totals['pgp'] = 0;
        $totals['pgp'] = $pgpTotal;

        // Agents Income Collection
        $agents = AgentTransaction::all();
        $agentTotal = AgentTransaction::all()->sum('agent');
        $totals['agent'] = 0;
        $totals['agent'] = $agentTotal;

        // Spec Totals
        $specDirectTotal = Transaction::all()->sum('spec');
        $specAgentTotal = AgentTransaction::all()->sum('spec');
        $totals['spec'] = 0;
        $totals['spec'] = $specDirectTotal + $specAgentTotal;
        //return $pgpCollection;

        $ralmuofDirectTotal = Transaction::all()->sum('ralmuof');
        $ralmuofAgentTotal = AgentTransaction::all()->sum('ralmuof');
        $totals['ralmuof'] = 0;
        $totals['ralmuof'] = $ralmuofDirectTotal + $ralmuofAgentTotal;

        return view($this->prefix.'income')->withIncomes($pgpCollection)->withTotals($totals);
    }

    
    
}
