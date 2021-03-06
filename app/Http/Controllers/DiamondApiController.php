<?php

namespace App\Http\Controllers;

use App\AgentBiodata;
use Illuminate\Http\Request;
use App\AdminBiodata;

class DiamondApiController extends Controller
{
    private $baseUrl = "https://certify.diamondbank.com/diamondconnecttest/";

    /**
     * Generate Access Token
     */
    public function generateAccessToken()
    {
        // API URL
        $url = $this->baseUrl . 'oauth/token';
        // Initialize Curl
        $curl = curl_init();
        // Set CURL Params
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "grant_type=client_credentials&client_id=4E6979C7F4E140E&client_secret=QUEzQjY4MTctQkJDOS00NkRGLTgyRTUtN0QyQjkzQzA3MzUw",
            CURLOPT_HTTPHEADER => array(
                "Cache-Control: no-cache",
                'Content-Type: application/x-www-form-urlencoded',
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        // return $err;
        curl_close($curl);
        // Decode the response to object / array
        $resp = json_decode($response, true);
        // return access token
        return (isset($resp['access_token'])) ? $resp['access_token'] : $err;


    }

    /**
     * Admin Credit
     */
    public function credit($amount)
    {
        $access_token = $this->generateAccessToken();
        $token = $access_token;
        // Initialize Curl
        $curl = curl_init();
        // Transation Ref
        $transactref = str_random(10);

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->baseUrl."api/Transaction/credit",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\n\t\"hash\":\"12345\",\n\t\"amount\": $amount,\n\t\"accountNumber\": \"0035257775\",\n\t\"sourceAccount\": \"0035257775\",\n\t\"transactionReference\": \"$transactref\",\n\t\"transactionNaration\": \"Initial Test Credit\"\n}",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer $token",
                "Cache-Control: no-cache",
                "Content-Type: application/json",
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return "Err";
        } else {
            return json_decode($response, true);
        }


    }

    /**
     * Agent Debit
     */
    public function agentDebit($amount)
    {
        // check agent's amount is not greater tham admin's own
        $adminBiodata = AdminBiodata::find(1);
        
        // Check if Admin Has funds in wallet or deposit
        if ($amount > $adminBiodata->wallet_balance) {
            return $this->errorResponse('Sorry, Payment Cannot be made at the moment, Please Contact Admin or Try Again Later');
        }

        // Find Agent Biodata
        $agentBiodata = AgentBiodata::where('user_id',auth()->id())->firstOrFail();
        $accountNumber = $agentBiodata->account_number;

        // Check if Account Number is Empty
        if($accountNumber == "") {
            return $this->errorResponse('Please Update Your Account Number Before Proceeding...');
        }

        // Transaction Description
        $description = "GOENERGEE Agent ".auth()->user()->firstname."_".auth()->user()->lastname."_".$agentBiodata->agent_id." Topup Debit".date('d-m-y');
        
        // Inititlalize Curl
        $curl = curl_init();
        // Transaction Token
        $transactionRef = str_random(20);
        // Get Access Token
        $token = $this->generateAccessToken();
        // Set Curl Options
        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->baseUrl."api/Transaction/debit",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\n\t\"hash\":\"12345\",\n\t\"amount\": $amount,\n\t\"accountNumber\": \"$accountNumber\",\n\t\"sourceAccount\": \"$accountNumber\",\n\t\"transactionReference\": \"$transactionRef\",\n\t\"transactionNaration\": \"$description\"\n}",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer " . $token,
                "Content-Type: application/json",
            ),
        ));

        // Response From Curl Request
        $response = curl_exec($curl);
        // return $response;
        // Error from Curl Request
        $err = curl_error($curl);
        // Close Curl  Connection
        curl_close($curl);   

        // return response()->json([
        //     'success' => true,
        //     'data' => $response
        // ]);
        // return $this->successResponse($response);
        return response()->json([
            'success' => true,
            'data' => $response,
            'error' => $err
        ], 200);


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
