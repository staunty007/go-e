<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MeterApiController extends Controller
{
    public function validateMeterUser(Request $request) {

        if($request->meter_no !== '123456') {
            return response()->json(['code' => '419']);
        }
    }

    public function validateMeterReturn($meter_no) {
        if($request->meter_no !== '123456') {
            return response()->json(['code' => '419']);
        }

        return response()->json(['user' => [
            'name' => 'Gabriel Adewumi',
            'email' => 'codergab@gmail.com',
            'phone' => '08104555495'
        ]]);
    }
}
