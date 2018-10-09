<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MobileController extends Controller
{
    private $prefix = "mobile.";

    public function index()
    {
        return view($this->prefix.'index');
    }

    public function login()
    {
        return view($this->prefix.'login');
    }

    public function signUp()
    {
        return view($this->prefix.'sign-up');
    }
}
