<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;
use App\Transaction;
use Carbon\Carbon;
use App\MeterRequest;
use App\User;
use App\AdminBiodata;
use DB;

class DistributorController extends Controller
{
    private $prefix = "users.distributor.";

    //private $view = view($this.pre)

    public function home()
    {
        return $this->v('finance');
    }

    public function v($file, $data = [])
    {
        return view($this->prefix . $file, compact('data'));
    }
    public function finance()
    {
        $data = [];
        // $firstdayofmonth = date("Y-m-01");
        // $monthlysalesprepaid = Transaction::where('created_at', '>', $firstdayofmonth)->sum('total_amount');
        // $monthlysalespostpaid = Transaction::where('created_at', '>', $firstdayofmonth)->sum('total_amount');
        // $data['salesthismonth'] = $monthlysalesprepaid + $monthlysalespostpaid;
        // $today = date("Y-m-d 00:00:00");
        // $salesprepaid = Transaction::where('created_at', '>', $today)->count();
        // $salespostpaid = Transaction::where('created_at', '>', $today)->count();
        // $data['salestoday'] = $salesprepaid + $salespostpaid;


        // $start = new Carbon('first day of last month');
        // $end = new Carbon('last day of last month');
        // $incomelastmonthprepaid = Transaction::whereBetween('created_at', [$start, $end])->sum('total_amount');
        // $incomelastmonthpostpaid = Transaction::whereBetween('created_at', [$start, $end])->sum('total_amount');

        // $data['incomelastmonth'] = $incomelastmonthprepaid + $incomelastmonthpostpaid;
        // $start = new Carbon('first day of this year');

        // $salescurrentyearprepaid = Transaction::where('created_at', '>', $start)->sum('total_amount');
        // $salescurrentyearpostpaid = Transaction::where('created_at', '>', $start)->sum('total_amount');

        // $data['salescurrentyear'] = $salescurrentyearprepaid + $salescurrentyearpostpaid;

        // $data['registeredcustomers'] = User::where('role_id', 3)->count();
        // $data['registeredagents'] = User::where('role_id', 2)->count();

        // All Direct Payment
        $payments = Payment::where('is_agent',0)->with('transaction')->orderBy('created_at','desc')->get();

        // TotalWalletDeposit
        $deps = DB::table('admin_topups')->sum('topup_amount');

        //return $payments;
        $wallet_balance = AdminBiodata::first();
        return view($this->prefix.'finance')
            ->withFinances($payments)
            ->withBalance($wallet_balance->wallet_balance)
            ;
    }
    public function profile()
    {
        return $this->v('profile');
    }
    public function customer_payment()
    {
        $data = [];

        return $this->v('customer_payment', $data);
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
        $meters = MeterRequest::orderBy('created_at','desc')->get();
        return $this->v('meter_admin')->withRequests($meters);
    }
    public function settings()
    {
        return $this->v('settings');
    }
    public function sms()
    {
        return $this->v('sms');
    }
}
