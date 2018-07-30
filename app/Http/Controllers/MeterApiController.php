<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
class MeterApiController extends Controller
{
    public function validateMeterUser(Request $request) {
        // Meter APIs
        $meters = ['123456','324242','2422940','4393093094','934034'];

        if(!in_array($request->meter_no, $meters)) {
            // if($request->meter_no !== $numbers) {
                return response()->json(['code' => '419']);
            // }
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
