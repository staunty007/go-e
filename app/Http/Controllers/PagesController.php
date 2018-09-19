<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(TestSoapController $soap)
    {   
        $soap->startSession();
        if(session()->has('TAMSES')) {
            return view('guest/home');
        }else {
            return redirect('/loaddd');
        }
    }
}
