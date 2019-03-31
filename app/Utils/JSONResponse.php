<?php 

namespace App\Utils;
    
trait JSONResponse {


    public function success($data, $code = 200)
    {
        return response()->json([
            'success' => true,
            'data' => $data
        ], $code);
    }

    public function error($data, $code = 400)
    {
        return response()->json([
            'success' => false,
            'data' => $data
        ], $code);
    }
} 