<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class GTPayController extends Controller
{
    //private $port = 4444;
    protected $actionUrl = "http://gtweb2.gtbank.com/orangelocker/gtpaym/tranx.aspx";
    private $gtpay_mert_id = "10436";
    private $gtpay_tranx_curr = "566";
    private $hashkey = "22KFNLFNLKNLKNK09098";
    private $gtpay_gway_name = "webpay";
    #private $gtpay_tranx_noti_url = URL('/gt/notify');
    

    // Create Mandate
    public function sendTransaction(Request $request)
    {
        $gtpay_tranx_id = Str::random(10);
        $gtpay_tranx_amt = "100.00";
        $gtpay_cust_id = mt_rand(10000, 99999);
        $gtpay_cust_name = "John Doe";
        $gtpay_tranx_memo = "Purchasing of Vouchers";
    
        $gHash = $this->gtpay_mert_id . "" . $gtpay_tranx_id . "" . $gtpay_tranx_amt . "" . $this->gtpay_tranx_curr . "" . $gtpay_cust_id . "" . $this->actionUrl . "" . $this->hashkey;
        $gtpay_hash = hash('sha512', $gHash);

        $payload = [
            'gtpay_mert_id' => $this->gtpay_mert_id,
            'gtpay_tranx_id' => $gtpay_tranx_id,
            'gtpay_tranx_amt' => $gtpay_tranx_amt,
            'gtpay_tranx_curr' => $this->gtpay_tranx_curr,
            'gtpay_cust_id' => $gtpay_cust_id,
            'gtpay_cust_name' => $gtpay_cust_name,
            'gtpay_tranx_memo' => $gtpay_tranx_memo,
            'gtpay_gway_name' => $this->gtpay_gway_name,
            'gtpay_hash' => $gtpay_hash,
            'gtpay_tranx_noti_url' => $this->gtpay_tranx_noti_url,
        ];

        $postData = json_encode($payload, true);

        //return $payload;

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->actionUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $postData,
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json",
                "cache-control: no-cache"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return $this->errorResponse($err);
        } else {
            return $this->successResponse($response);
        }
    }

        // Generate Response
    public function successResponse($data = 'Successful')
    {
        return response()->json([
            'success' => true,
            'data' => $data
        ], 200);
    }

    // Generate Response
    public function errorResponse($data = 'Failed')
    {
        return response()->json([
            'success' => false,
            'data' => $data
        ], 422);
    }

}
