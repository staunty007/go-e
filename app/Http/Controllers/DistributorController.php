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
        // All Direct Payment
        $payments = Payment::where('is_agent',0)->with('transaction')->get();
        // return $payments;
        // TotalWalletDeposit
        $deps = DB::table('admin_topups')->sum('topup_amount');

        //return $payments;
        $wallet_balance = AdminBiodata::first();
        return view($this->prefix.'finance')
            ->withFinances($payments)
            ->withBalance($wallet_balance->wallet_balance)
            ;
    }

    public function financeFilterDate(Request $request)
    {
        $from = Carbon::parse($request->from);
        $to = Carbon::parse($request->to);
        
        $finances = Payment::whereBetween('created_at',[$from, $to])->get();
        // return $finances;
        $wallet_balance = AdminBiodata::first();
        return view($this->prefix.'finance', compact('finances'))->withBalance($wallet_balance->wallet_balance);
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
    public function getChangeStatus($id) {
        // Find Meter Row via ID
        $meter = MeterRequest::find($id);
        // Return a view for the meter
        return view($this->prefix.'meter-change')->withMeter($meter);
    }

    public function postChangeStatus(Request $request, $id) {
        // Find the meter with the respective id
        $meter = MeterRequest::find($id);

        $meter->status = $request->status;

        $meter->save();

        return redirect()->route('distributor.meter_admin');
    }
}
