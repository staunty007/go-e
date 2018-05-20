<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AgentController extends Controller
{
    private $prefix = "users.agent.";

    //private $view = view($this.pre)
    /**
     * Figured Out that this home method isn't functioning 
     */    
    // public function home() {
    //     return $this->v('home');
    // }

    public function v($file) {
        return view($this->prefix.$file);
    }

    public function dashboard() {
        return redirect('home');
    }

    public function paymentHistory()
    {
        return $this->v('payment_history');
    }

    public function meterManagement()
    {
        return $this->v('meter_request');
    }

    public function profile()
    {
        return $this->v('agent_profile');
    }

    // complete admin topup
    public function completeTopup($amount) {

        $biodata = AgentBiodata::where('user_id',Auth::user()->id)->get();

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
