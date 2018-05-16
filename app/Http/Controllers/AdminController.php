<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    private $prefix = "users.admin.";

    //private $view = view($this.pre)
    
    public function home()
    {
        return $this->v('home');
    }

    public function v($file)
    {
        return view($this->prefix.$file);
    }
    public function finance()
    {
        return $this->v('finance');
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
