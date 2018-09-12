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
     public function guestServices(){
        
        return view('guest/services');
    }
    public function serviceType(){
    	return view('guest/service_type');
    }
    public function eachServicesType(Request $request, $name){
    	//dd($name);
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
 //    	if (\Request::is('guest/')) { 
 //  		// show companies menu or something
 //    		dd("it worked");
	// }

    }
    public function support(){
    	return view('guest/support');
    }
}
