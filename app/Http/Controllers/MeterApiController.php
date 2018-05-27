<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
class MeterApiController extends Controller
{
    public function validateMeterUser(Request $request) {

        if($request->meter_no !== '123456') {
            return response()->json(['code' => '419']);
        }
    }

    public function validateMeterReturn() {

        $query = Input::get('meter_no');
        if($query !== '123456') {
            //return "oh";
            return response()->json(['code' => '419']);
        }

        $user = [
            'first_name' => 'Gabriel',
            'last_name' => 'Adewumi',
            'email' => 'codergab@gmail.com',
            'phone' => '08104555495'
        ];

        //return $user;

        return response()->json($user);
    }
}
