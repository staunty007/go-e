<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\AgentBiodata;
use Mail;
use App\Mail\AccountActivation;
class GuestController extends Controller
{
    //
    public function guestLogIn(TestSoapController $soap){
		// $soap->startSession();
    	return view('guest/login');
    }
    public function guestSignUp(){
    	return view('guest/signup');
	}
	public function agent_reg(){
    	return view('guest/agent_reg');
	}
	public function become_agent(){
    	return view('guest/become_agent');
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
	
	public function postAgentSignup(Request $request)
	{
		$this->validate($request, [
			"email" => "required|email|unique:users"
		]);

		$user = new User;
		$user->role_id = 2;
		// Spliting Names followed By Space
		$names = explode(' ',$request->name);
		$user->first_name = $names[0];
		$user->last_name = $names[1];
		$user->email = $request->email;
		$user->mobile = $request->tel;
		$user->password = bcrypt($request->password);
		$user->access_token = str_random(30);
		$user->save();

		$agent = new AgentBiodata;
		$agent->user_id = $user->id;
		// Generate new Agent ID - GO-(district name in capital)SOMERANDOMNUMBER // GO-LEK32332
		$agentID = "GO-".substr(strtoupper($request->district), 0, 3)."".rand(12345,54321);
		$agent->agent_id = $agentID;
		$agent->address = $request->address;
		$agent->business_name = $request->company_name;
		$agent->business_district = $request->district;
		$agent->business_address = $request->address;
		$agent->own_outlet = $request->service_outlet;
		$agent->operate_min = $request->min_wallet;
		$agent->own_computer = $request->tools;
		$agent->save();

		Mail::to($user->email)->send(new AccountActivation($user));

		return back()->with('success','Account Registered Successfull, Please check your mail and verify your account');
		

	}
}
