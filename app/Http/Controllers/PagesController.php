<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use PDF;
use App\Payment;
use App\Transaction;

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
            return back()->withErrors('Email Address or password is incorrect');
        }
    }

    public function discoLogout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        return redirect('/ekedc');
    }

    public function downloadReciept($payment_ref) {

        $reciept = Payment::where('payment_ref', $payment_ref)->with('transaction')->firstOrFail();
        //return $reciepts;
        //return view('download-reciept-page', compact('reciept'));
        $pdf = PDF::loadView('download-reciept-page', compact('reciept'));
        return $pdf->download('reciept-download.pdf');
    }
}
