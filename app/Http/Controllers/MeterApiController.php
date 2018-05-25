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
}
