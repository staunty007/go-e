<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\AdminBiodata;

class DiamondApiController extends Controller
{
    private $baseUrl = "https://certify.diamondbank.com/diamondconnecttest/";

    public function generateAccessToken()
    {
        // API URL
        $url = $this->baseUrl.'oauth/token';
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

        curl_close($curl);
        // return $response;
        return json_decode($response, true);
        if ($err) {
            return response()->json(['error' => $err], 500);
            
        } else {
            return response()->json($response, 200);
        }

    }
    public function credit($amount) {
        $access_token = $this->generateAccessToken();
        $token = $access_token['access_token'];
        // Initialize Curl
        $curl = curl_init();
        // Transation Ref
        $transactref = str_random(10);
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://certify.diamondbank.com/diamondconnecttest/api/Transaction/credit",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\n\t\"hash\":\"12345\",\n\t\"amount\": $amount,\n\t\"accountNumber\": \"0051212352\",\n\t\"sourceAccount\": \"0051212352\",\n\t\"transactionReference\": \"$transactref\",\n\t\"transactionNaration\": \"Initial Test Credit\"\n}",
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

    public function agentDebit($accountNumber, $amount)
    {
        // check agent's amount is not greater tham admin's own
        $adminBiodata = AdminBiodata::find(1);
        // return $adminBiodata;
        if($amount > $adminBiodata->wallet_balance) {
            return response()->json('Sorry, Payment Cannot be made at the moment, Please Contact Admin or Try Again Later');
        }
        $getToken = $this->generateAccessToken();
        $token = $getToken['access_token'];
        $curl = curl_init();   
        $transactionRef = str_random(20);
        // return $transactionRef;
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://certify.diamondbank.com/diamondconnecttest/api/Transaction/debit",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\n\t\"hash\":\"12345\",\n\t\"amount\": $amount,\n\t\"accountNumber\": \"$accountNumber\",\n\t\"sourceAccount\": \"$accountNumber\",\n\t\"transactionReference\": \"$transactionRef\",\n\t\"transactionNaration\": \"GOENERGEE Topup Debit\"\n}",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer ".$token,
                "Content-Type: application/json",
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return response()->json($err, 500);
        } else {
            $credit = $this->credit($amount);
            if($credit == "Err") {
                $cred2 = $this->credit($amount);
                if($cred2 == "Err") {
                    return response()->json('Unable to finish transaction, Please Contact the Admin for further processing.');
                }
            }else {
                return response()->json($response, 200);
            }
            
        }
    }
    public function adminDebit($accountNumber, $amount)
    {
        $getToken = $this->generateAccessToken();
        $token = $getToken['access_token'];
        $curl = curl_init();   
        $transactionRef = str_random(20);
        // return $transactionRef;
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://certify.diamondbank.com/diamondconnecttest/api/Transaction/debit",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\n\t\"hash\":\"12345\",\n\t\"amount\": $amount,\n\t\"accountNumber\": \"$accountNumber\",\n\t\"sourceAccount\": \"$accountNumber\",\n\t\"transactionReference\": \"$transactionRef\",\n\t\"transactionNaration\": \"GOENERGEE Topup Debit\"\n}",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer ".$token,
                "Content-Type: application/json",
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return response()->json($err, 500);
        } else {
            $credit = $this->credit($amount);
            if($credit == "Err") {
                $cred2 = $this->credit($amount);
                if($cred2 == "Err") {
                    return response()->json('Unable to finish transaction, Please Contact the Admin for further processing.');
                }
            }else {
                return response()->json($response, 200);
            }
            
        }
    }

}