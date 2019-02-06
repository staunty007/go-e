<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SoapClient;
use SoapHeader;
use SimpleXMLElement;

class NIBBSController extends Controller
{
    // private $host = "http://webservices.amazon.com/AWSECommerceService/AWSECommerceService.wsdl";
    private $host = "https://staging.nibss-plc.com.ng/CentralPayWebservice/CentralPayOperations?wsdl";

    public function createMandate()
    {
        $context = [
            'ssl' => [
                // set some SSL/TLS specific options
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            ]
        ];

        // SOAP 1.2 client
        $params = array(
            'encoding' => 'UTF-8',
            'verifypeer' => false,
            'verifyhost' => false,
            'soap_version' => SOAP_1_1,
            'trace' => 1,
            'exceptions' => 1,
            'connection_timeout' => 180,
            'stream_context' => stream_context_create($context)
        );
        try{
            $client = new SoapClient($this->host, $params);
            $billerID = "NIBSS0000000128";
            $secret = "F78BE99289AB52FDF97190CEBFC1D6B8";

            $mandateRequest = ["CreateMandateRequest" =>
                [
                    'AcctNumber' => '5050007512',
                    'AcctName' => 'OKOLI CHUKWUMA PAUL',
                    'TransType' => '1',
                    'BankCode' => '070',
                    'BillerID' => 'NIBSS0000000128',
                    'BillerName' => 'GOENERGEE',
                    'BillerTransId' => '43553535',
                    'HashValue' => "a4b6241a86cd6c276980f40b741eace054ef2eb71655e02fa5b24b979530fb9a"
                ]
            ];
            // $response = $client->__doRequest($mandateRequest,$this->host,'createMandateRequest','');
            $response = $client->createMandateRequest($mandateRequest);

            dd($response);
        }
        catch(\SoapFault $fault) {
            dump($fault);
        }
    }

    public function createCurlMandate() {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://staging.nibss-plc.com.ng/CentralPayWebservice/CentralPayOperations?wsdl=",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:web="http://web.nibss.com/"><soapenv:Header/><soapenv:Body><web:createMandateRequest>
              <arg0><![CDATA[<CreateMandateRequest><AcctNumber>5050007512</AcctNumber><AcctName>OKOLI CHUKWUMA PAUL</AcctName>
                   <TransType>1</TransType><BankCode>070</BankCode><BillerID>NIBSS0000000128</BillerID><BillerName>Ralmouf</BillerName>
                  <BillerTransId>43553535</BillerTransId><HashValue>AE34C5122329A2BA2C9C52E28297AE75E43D59AAED9F1D41593E6749C678456E</HashValue></CreateMandateRequest>
                       ]]>
            </arg0>
           </web:createMandateRequest>
        </soapenv:Body>
     </soapenv:Envelope>',
        CURLOPT_HTTPHEADER => array(
            "Content-Type: application/xml",
            "cache-control: no-cache"
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
        return $response;
        }
    }
























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

        $parse_response = new SimpleXMLElement("$response");

        dd($parse_response);
        // if ($err) {
        //     echo "cURL Error #:" . $err;
        // } else {
        //     echo $response;
        //     // $stringed = simplexml_load_string($response);
        //     // return json_encode($stringed);
        // }
        // // try {

        // //     $client = new SoapClient($this->host);
        // //     // dd($client->listActiveBanks('NIBSS0000000128'));
        // //     dd($client->__getTypes());
        // // } catch (\SoapFault $th) {
        // //     dd($th);
        // // }

    }

    
    public function getHashValue() {

        // return hash('ripemd160', 'The quick brown fox jumped over the lazy dog.');
        $bankcode = "070";
        $billerID = "NIBSS0000000128";
        $secret = "F78BE99289AB52FDF97190CEBFC1D6B8";

        $hashed = strtoupper(hash('sha256', "<CreateMandateRequest><AcctNumber>5050007512</AcctNumber><AcctName>OKOLI CHUKWUMA PAUL</AcctName><TransType>1</TransType><BankCode>070</BankCode><BillerID>NIBSS0000000128</BillerID><BillerName>Ralmouf</BillerName><BillerTransId>43553535</BillerTransId></CreateMandateRequest>".$secret, false));
        return $hashed;
        // return "<CreateMandateRequest><AcctNumber>5050007512</AcctNumber><AcctName>OKOLI CHUKWUMA PAUL</AcctName><TransType>1</TransType><BankCode>070</BankCode><BillerID>NIBSS0000000128</BillerID><BillerName>Ralmouf</BillerName><BillerTransId>43553535</BillerTransId></CreateMandateRequest>".$secret;
        

        // $count = strlen($hashed);
        // return [$hashed,$count];
    }

    public function getBanks()
    {
        return hash('sha256', "<CreateMandateRequest>
        <AcctNumber>5050007512</AcctNumber>
       <AcctName>OKOLI CHUKWUMA PAUL</AcctName>
       <TransType>1</TransType>
       <BankCode>070</BankCode>
       <BillerID>NIBSS0000000128</BillerID>
       <BillerName>Ralmouf</BillerName>
       <BillerTransId>1045621</BillerTransId>
   </CreateMandateRequest>".$secret);
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
