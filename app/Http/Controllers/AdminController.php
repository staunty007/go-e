<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PrepaidPayment;
use App\PostpaidPayment;
use Carbon\Carbon;
use App\User;

class AdminController extends Controller
{
    private $prefix = "users.admin.";

    //private $view = view($this.pre)
    
    public function home()
    {
        return $this->v('home');
    }

    public function v($file, $data=[])
    {
        return view($this->prefix.$file, compact('data'));
    }
    public function finance()
    {
        $data=[];
        $firstdayofmonth =date("Y-m-01");
        $monthlysalesprepaid=PrepaidPayment::where('created_at', '>', $firstdayofmonth)->sum('total_amount');
        $monthlysalespostpaid = PostpaidPayment::where('created_at', '>', $firstdayofmonth)->sum('total_amount');
        $data['salesthismonth']= $monthlysalesprepaid+ $monthlysalespostpaid;
        $today=date("Y-m-d 00:00:00");
        $salesprepaid = PrepaidPayment::where('created_at', '>', $today)->count();
        $salespostpaid = PostpaidPayment::where('created_at', '>', $today)->count();
        $data['salestoday']= $salesprepaid+ $salespostpaid;
        

        $start = new Carbon('first day of last month');
        $end = new Carbon('last day of last month');
        $incomelastmonthprepaid = PrepaidPayment::whereBetween('created_at', [$start,$end])->sum('total_amount');
        $incomelastmonthpostpaid = PostpaidPayment::whereBetween('created_at', [$start, $end])->sum('total_amount');
        
        $data['incomelastmonth']= $incomelastmonthprepaid + $incomelastmonthpostpaid;
        $start = new Carbon('first day of this year');
        
        $salescurrentyearprepaid = PrepaidPayment::where('created_at', '>', $start)->sum('total_amount');
        $salescurrentyearpostpaid = PostpaidPayment::where('created_at', '>', $start)->sum('total_amount');

        $data['salescurrentyear'] = $salescurrentyearprepaid + $salescurrentyearpostpaid;

        $data['registeredcustomers']= User::where('role_id', 3)->count();
        $data['registeredagents'] = User::where('role_id', 2)->count();
        return $this->v('finance', $data);
    }
    public function profile()
    {
        return $this->v('profile');
    }
    public function customer_report()
    {
        return $this->v('customer_report');
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
