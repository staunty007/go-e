<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServicesController extends Controller
{
    //EKEDC
    public function ekedc()
    {
        return view('services.ekedc');
    }
}
