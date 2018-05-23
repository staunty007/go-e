<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PrepaidPayment;
use App\PostpaidPayment;
use Carbon\Carbon;
use App\User;

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
        $firstdayofmonth = date("Y-m-01");
        $monthlysalesprepaid = PrepaidPayment::where('created_at', '>', $firstdayofmonth)->sum('total_amount');
        $monthlysalespostpaid = PostpaidPayment::where('created_at', '>', $firstdayofmonth)->sum('total_amount');
        $data['salesthismonth'] = $monthlysalesprepaid + $monthlysalespostpaid;
        $today = date("Y-m-d 00:00:00");
        $salesprepaid = PrepaidPayment::where('created_at', '>', $today)->count();
        $salespostpaid = PostpaidPayment::where('created_at', '>', $today)->count();
        $data['salestoday'] = $salesprepaid + $salespostpaid;


        $start = new Carbon('first day of last month');
        $end = new Carbon('last day of last month');
        $incomelastmonthprepaid = PrepaidPayment::whereBetween('created_at', [$start, $end])->sum('total_amount');
        $incomelastmonthpostpaid = PostpaidPayment::whereBetween('created_at', [$start, $end])->sum('total_amount');

        $data['incomelastmonth'] = $incomelastmonthprepaid + $incomelastmonthpostpaid;
        $start = new Carbon('first day of this year');

        $salescurrentyearprepaid = PrepaidPayment::where('created_at', '>', $start)->sum('total_amount');
        $salescurrentyearpostpaid = PostpaidPayment::where('created_at', '>', $start)->sum('total_amount');

        $data['salescurrentyear'] = $salescurrentyearprepaid + $salescurrentyearpostpaid;

        $data['registeredcustomers'] = User::where('role_id', 3)->count();
        $data['registeredagents'] = User::where('role_id', 2)->count();


        $prepaidPayments = PrepaidPayment::orderBy('created_at','desc')->get();
        $postpaidPayments = PostpaidPayment::orderBy('created_at','desc')->get();

        $payments = collect([$prepaidPayments,$postpaidPayments]);

        //return $payments;

        return view($this->prefix.'finance')
                ->withData($payments->collapse())
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
        return $this->v('meter_admin');
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
