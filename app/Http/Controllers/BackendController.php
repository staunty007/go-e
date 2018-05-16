<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class BackendController extends Controller
{
    public function getUserLogin(){
        return view('users.login');
    }
    public function userLogin(Request $request){
        //return $request;
        // Attempt to login user based on role_id
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role_id' => $request->role_id])) {
            if(Auth::user()->role_id !== 0) {
                // check if its admin or agent
                if(Auth::user()->role_id == 1) {
                    // redirect to Admin Page
                    return response()->json(['data' => 1]);
                }else {
                    // redirect to Agent page
                    return response()->json(['data' => 2]);
                }
                // redirect to admin page

            }else {
                // return error on false login
                return response()->json(['data' => 'Invalid Login Details']);
            }
        }else {
            // return login details errror
            return response()->json(['data' => 'Email Adress or Password does not match our records, Please Try Again']);
        }
    }
}
