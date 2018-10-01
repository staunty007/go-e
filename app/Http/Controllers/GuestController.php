<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestController extends Controller
{
    //
    public function guestLogIn(){
    	return view('guest/login');
    }
    public function guestSignUp(){
    	return view('guest/signup');
	}
	public function agent_reg(){
    	return view('guest/agent_reg');
	}
	public function faq(){
    	return view('guest/faq');
	}
    public function guestServices(){
        
        return view('guest/services');
    }
    public function serviceType(){
    	return view('guest/service_type');
    }
    public function eachServicesType(Request $request, $name, TestSoapController $soap){
		$soap->startSession();
    	switch ($name) {
			case $name === "prepaid-meters":
			
    			return view('guest/prepaid');
    		case $name === "postpaid-meters":
    			return view('guest/postpaid');
    			break;
    		default:
    			return back();
    			break;
    	}

    }
    public function support(){
    	return view('guest/support');
    }
}
