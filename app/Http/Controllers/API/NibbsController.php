<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NibbsController extends Controller
{
    private $port = 4444;
    protected $actionUrl = "http://34.211.118.88:4444/cpay/client/action";

    // Create Mandate
    public function createMandate(Request $request)
    {
        // return $request;
        $accountNumber = $request['accountNumber'];
        $accountName = $request['accountName'];
        $bankCode = $request['bankCode'];

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_PORT => $this->port,
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
            CURLOPT_PORT => $this->port,
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
            CURLOPT_PORT => $this->port,
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
            CURLOPT_PORT => $this->port,
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

    // Re-Query Transaction
    public function requeryTransaction(Request $request)
    {
        $curl = curl_init();

        $transaction_id = $request->transaction_id;
        $cpay_ref = $request->cpay_ref;

        // Requery Endpoint
        // https://staging.nibssplc.com.ng/CentralPayPlus/merchantTransQueryJSON?transaction_id=R283265064&cpay_ref=862DDE 03-0E33-206C-B54C69BEFE533095&merchant_id=00000001&hash=6fa5eaafe672a47b4a148174b1f2d75b4c0ed242e2556f05144f

        $hash = hash('sha256', "" . $transaction_id . "" . $cpay_ref . "NIBSS0000000128F78BE99289AB52FDF97190CEBFC1D6B8");

        $endpoint = "https://staging.nibss-plc.com.ng/CentralPayPlus/merchantTransQueryJSON?transaction_id=" . $transaction_id . "&cpay_ref=" . $cpay_ref . "&merchant_id=NIBSS0000000128&hash=" . $hash;

        curl_setopt_array($curl, array(
            CURLOPT_URL => $endpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_POSTFIELDS => "",

            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json",
                "cache-control: no-cache",
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return response()->json([
                'success' => false,
                'data' => $err
            ], 422);
        } else {
            return response()->json([
                'success' => true,
                'data' => json_decode($response, true)
            ], 200);
        }
    }

    // Accept and Add Session Ref
    public function postDetails(Request $request)
    {
        if ($request) {
            session()->put('nibbs_details', $request->all());
            return $this->success('Accepted');
        }

        return 'Nothing';
    }

    // find
    public function find()
    {
        return session()->get('nibbs_details');
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
