<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Transaction;
use App\Payment;
use App\MeterRequest;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function getCustomer(User $user)
    {
        $user = $user->getUser();

        if($user) {
            return $this->success($user);
        }
        return $this->error($user);
    }

    // Get Customer Transactions
    public function getCustomerTransactions(Payment $payments)
    {
        $user_payments = $payments->getPayments();

        if(count($user_payments) > 0) {
            return $this->success($user_payments);
        }

        return $this->success('User Payments Empty');
    }

    // Request Meter
    public function requestMeter(Request $request, MeterRequest $meter_request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email_address' => 'required|email',
            'phone_number' => 'required',
            'home_address' => 'required',
            'closest_bus_stop' => 'required',
            'dist_company' => 'required',
            'district' => 'required',
            'gender' => 'required',
            'house_type' => 'required',
            'meter_type' => 'required'
        ]);

        if($validator->fails()) {
            return $this->error($validator->errors());
        }

        // store
        $storeRequest = $meter_request->storeRequest($request->all());

        if($storeRequest) {
            return $this->success('Meter Request Stored Successfully');
        }

        return $this->error('Cannot Store Request at the Moment');
    }

}
