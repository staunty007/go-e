<?php 

namespace App\Utils;
    
trait Response {


    public function success($data)
    {
        return response()->json([
            'success' => true,
            'data' => $data
        ], 200);
    }

    public function error($data)
    {
        return response()->json([
            'success' => false,
            'data' => $data
        ], 400);
    }
}