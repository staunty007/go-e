<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NibbsController extends Controller
{
    protected $actionUrl = "http://18.224.187.121:8888/cpay/client/action";

    // Create Mandate
    public function createMandate(Request $request)
    {
        // return $request;
        $accountNumber = $request['accountNumber'];
        $accountName = $request['accountName'];
        $bankCode = $request['bankCode'];

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_PORT => "8888",
        CURLOPT_URL => $this->actionUrl,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "{\n\t\"acctNumber\":\"$accountNumber\",\n\t\"acctName\":\"$accountName\",\n\t\"transType\":\"1\",\n\t\"bankCode\":\"$bankCode\",\n\t\"billerId\":\"NIBSS0000000128\",\n\t\"billerName\":\"Ralmuof\"\n}",
        CURLOPT_HTTPHEADER => array(
            "Content-Type: application/json",
            "cache-control: no-cache",
            "key: F78BE99289AB52FDF97190CEBFC1D6B8",
            "operation: CM"
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


    // ValidateOtp Fresh Registration
    public function validateOTPFresh(Request $request)
    {

        $otpCode = $request['otpCode'];
        $mandateCode = $request['transactionMandateCode'];
        $bankCode = $request['bankCodeSelected'];

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_PORT => "8888",
            CURLOPT_URL => $this->actionUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\n\"mandateCode\":\"$mandateCode\",\n\"bankCode\":\"$bankCode\",\n\"transType\":\"1\",\n\"otp\":\"$otpCode\",\n\"billerId\":\"NIBSS0000000128\",\n\"billerName\":\"Ralmuof\"}",

            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json",
                "cache-control: no-cache",
                "key: F78BE99289AB52FDF97190CEBFC1D6B8",
                "operation: VO"
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

    // Generates OTP For Payment
    public function generatePaymentOtp(Request $request)
    {
        // $otpCode = $request['otpCode'];
        $mandateCode = $request['transactionMandateCode'];
        $bankCode = $request['bankCodeSelected'];
        $amount = $request['amountToBePaid'];

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_PORT => "8888",
            CURLOPT_URL => $this->actionUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\n\"mandateCode\":\"$mandateCode\",\n\"bankCode\":\"$bankCode\",\n\"transType\":\"2\",\n\"billerId\":\"NIBSS0000000128\",\n\"billerName\":\"Ralmuof\",\n\"amount\":\"$amount\"\n}",

            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json",
                "cache-control: no-cache",
                "key: F78BE99289AB52FDF97190CEBFC1D6B8",
                "operation: GO"
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

    // Validates OTP for Payment // this is the end of transaction]
    public function validatePaymentOtp(Request $request)
    {
        $mandateCode = $request['transactionMandateCode'];
        $bankCode = $request['bankCodeSelected'];
        $amount = $request['amountToBePaid'];
        $otpCode = $request['otpCode'];

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_PORT => "8888",
            CURLOPT_URL => $this->actionUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\n\"mandateCode\":\"$mandateCode\",\n\"bankCode\":\"$bankCode\",\n\"transType\":\"2\",\n\"otp\":\"$otpCode\",\n\"billerId\":\"NIBSS0000000128\",\n\"billerName\":\"Ralmuof\",\n\"amount\":\"$amount\"\n}",

            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json",
                "cache-control: no-cache",
                "key: F78BE99289AB52FDF97190CEBFC1D6B8",
                "operation: VO"
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
