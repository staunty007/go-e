<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PrepaidPayment;
use App\PostpaidPayment;
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

        // Wallet Balance
        /**
         * Finds Users with id of 1,
         * Which is the Admin by default;
         * And return the result of their wallet balance
         */
        $admin = AdminBiodata::find(1);
        $data['wallet_balance'] = $admin->wallet_balance;

        //return $data['wallet_balance'];
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
    public function customer_report()
    {
        $data=[];

        return $this->v('customer_report', $data);
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
