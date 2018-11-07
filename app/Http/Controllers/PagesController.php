<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function disco()
    {
        return view('auth.login');
    }

    public function discoLogin(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role_id' => 3])) {
            return redirect('/distributor/finance');
        } else {
            return back()->withErrors(['err' => 'Email Address or Password is incorrect']);
        }
    }

    public function discoLogout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        return redirect('/discos');
    }
}
