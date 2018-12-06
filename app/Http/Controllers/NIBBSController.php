<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SoapClient;
use SoapHeader;
use SimpleXMLElement;

class NIBBSController extends Controller
{
    private $host = "https://staging.nibss-plc.com.ng/CentralPayWebservice/CentralPayOperations?wsdl";
    // Get Banks List 
    public function getBanksOnline()
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->host,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 60,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_POSTFIELDS => "<soapenv:Envelope xmlns:soapenv=\"http://schemas.xmlsoap.org/soap/envelope/\" xmlns:web=\"http://web.nibss.com/\">\r\n   <soapenv:Header/>\r\n   <soapenv:Body>\r\n      <web:listActiveBanks>\r\n         <!--Optional:-->\r\n         <arg0>NIBSS0000000128</arg0>\r\n      </web:listActiveBanks>\r\n   </soapenv:Body>\r\n</soapenv:Envelope>",
            CURLOPT_HTTPHEADER => array(
                "Content-Type: text/xml",
                "cache-control: no-cache",

            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
            // $stringed = simplexml_load_string($response);
            // return json_encode($stringed);
        }
        // try {

        //     $client = new SoapClient($this->host);
        //     // dd($client->listActiveBanks('NIBSS0000000128'));
        //     dd($client->__getTypes());
        // } catch (\SoapFault $th) {
        //     dd($th);
        // }

    }

    public function getBanks()
    {
        // return hash('sha256', 'NIBSS0000000128058codergab@gmail.comGOENERGEE POSTPAID PAYMENT5000566GTEFF5454FFFhttp://localhost:8000/nibbs/callbackF78BE99289AB52FDF97190CEBFC1D6B8');
        return [
            [
                "bankCode" => "214",
                "bankName" => "First City Monument Bank Plc",
            ],
            [
                "bankCode" => "033",
                "bankName" => "UBA Plc",
            ],
            [
                "bankCode" => "058",
                "bankName" => "Guaranty Trust Bank Plc",
            ],
            [
                "bankCode" => "035",
                "bankName" => "Wema Bank Plc",
            ],
            [
                "bankCode" => "063",
                "bankName" => "Diamond Bank Plc",
            ],
            [
                "bankCode" => "057",
                "bankName" => "Zenith Bank Plc",
            ],
            [
                "bankCode" => "232",
                "bankName" => "Sterling Bank Plc",
            ],
            [
                "bankCode" => "044",
                "bankName" => "Access Bank Plc",
            ],
            [
                "bankCode" => "076",
                "bankName" => "Skye Bank Plc",
            ],
            [
                "bankCode" => "221",
                "bankName" => "Stanbic IBTC Bank Plc",
            ]
        ];
    }

    public function tryForm()
    {
        return view('try-nibbs-form');
    }
}
