<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(TestSoapController $soap)
    {   
        $soap->startSession();
        return view('guest/home');
    }
}
