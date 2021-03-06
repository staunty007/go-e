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



    public function createCurlMandate(Request $request) {

        $accountNumber = $request->account_no;
        $accountName = $request->account_name;
        $bank = $request->bank;
        $transactID = str_random();

        $billerID = "NIBSS0000000128";
        $secret = "F78BE99289AB52FDF97190CEBFC1D6B8";

        $mandate = "<CreateMandateRequest><AcctNumber>$accountNumber</AcctNumber><AcctName>$accountName</AcctName><TransType>1</TransType><BankCode>$bank</BankCode><BillerID>NIBSS0000000128</BillerID><BillerName>Ralmouf</BillerName><BillerTransId>$transactID</BillerTransId></CreateMandateRequest>".$secret;

        $curl = curl_init();

        $hash = $this->hashValue($mandate);

        // return [$hash,$mandate];
        $curl_postfields = "<soapenv:Envelope xmlns:soapenv='http://schemas.xmlsoap.org/soap/envelope/' xmlns:web='http://web.nibss.com/'><soapenv:Header/><soapenv:Body><web:createMandateRequest><arg0><![CDATA[<CreateMandateRequest><AcctNumber>$accountNumber</AcctNumber><AcctName>$accountName</AcctName><TransType>1</TransType><BankCode>$bank</BankCode><BillerID>NIBSS0000000128</BillerID><BillerName>Ralmouf</BillerName><BillerTransId>$transactID</BillerTransId><HashValue>$hash</HashValue></CreateMandateRequest>]]></arg0></web:createMandateRequest></soapenv:Body></soapenv:Envelope>";
        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->host,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $curl_postfields,
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/xml",
                "cache-control: no-cache"
            ),
        ));

        try {
            // Get response coming back from Nibbs
            $response = curl_exec($curl);

            // return $response;

            // Parse Xml and return Original Xml Tag
            $parse = xml_parser_create();
            xml_parse_into_struct($parse, $response, $vals, $index);
            xml_parser_free($parse);    

            // close curl connection
            // curl_close($curl);
            // return xml parsed

            $xml_returned = @$vals[3]['value'];
            return response()->json([
                'payload' => $curl_postfields,
                'response' => $xml_returned,
                'mandate' => $mandate
            ]);

            // return $vals[3]['value'];

        } catch (\Throwable $th) {
            // Catch Throwable Error
            $err = curl_error($curl);
            return response()->json(['success' => false, 'error' => $th->getMessage(), 'curl_error' => $err]);
        }
        // close curl connection
        curl_close($curl);
    }


    // NIBBS Details for GOENERGEE
    private function nibbsDetails() {
        return 
        [
            'biller_id' => 'NIBSS0000000128',
            'biller_name' => 'Ralmuof',
            'secret' => 'F78BE99289AB52FDF97190CEBFC1D6B8'
        ];
    }

    public function validateOtp($otp, $mandateCode) {


        // Initialize curl
        $curl = curl_init();

        $rand = rand(1234567890098765432,987654321123456789);
        // Calculate Hash Value using sha256 algorithm
        $hashvalue = $this->hashValue("<ValidateOTPRequest><MandateCode>$mandateCode</MandateCode><TransType>2</TransType><BankCode>070</BankCode><OTP>$otp</OTP><BillerID>".$this->nibbsDetails()['biller_id']."</BillerID><BillerName>".$this->nibbsDetails()['biller_name']."</BillerName><Amount>100</Amount><BillerTransId>$rand</BillerTransId></ValidateOTPRequest>");

        // return "<soapenv:Envelope xmlns:soapenv='http://schemas.xmlsoap.org/soap/envelope/' xmlns:web='http://web.nibss.com/'><soapenv:Header/><soapenv:Body><web:validateOTPRequest><arg0><![CDATA[<ValidateOTPRequest><MandateCode>$mandateCode</MandateCode><TransType>2</TransType><BankCode>070</BankCode><OTP>$otp</OTP><BillerID>".$this->nibbsDetails()['biller_id']."</BillerID><BillerName>".$this->nibbsDetails()['biller_name']."</BillerName><Amount>100</Amount><BillerTransId>".rand(1234567890098765432,987654321123456789)."</BillerTransId><HashValue>".$hashvalue."</HashValue></ValidateOTPRequest>]]></arg0></web:validateOTPRequest></soapenv:Body></soapenv:Envelope>";

        // return $hashvalue;

        // Set curl Options
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
        CURLOPT_POSTFIELDS => "<soapenv:Envelope xmlns:soapenv='http://schemas.xmlsoap.org/soap/envelope/' xmlns:web='http://web.nibss.com/'><soapenv:Header/><soapenv:Body><web:validateOTPRequest><arg0><![CDATA[<ValidateOTPRequest><MandateCode>$mandateCode</MandateCode><TransType>2</TransType><BankCode>070</BankCode><OTP>$otp</OTP><BillerID>".$this->nibbsDetails()['biller_id']."</BillerID><BillerName>".$this->nibbsDetails()['biller_name']."</BillerName><Amount>100</Amount><BillerTransId>$rand</BillerTransId><HashValue>$hashvalue</HashValue></ValidateOTPRequest>]]></arg0></web:validateOTPRequest></soapenv:Body></soapenv:Envelope>",
        
        // Set curl headers
        CURLOPT_HTTPHEADER => array(
            "Content-Type: application/xml",
            "cache-control: no-cache"
        ),
        ));

        try {
            // Get response coming back from Nibbs
            $response = curl_exec($curl);
            // return $response;
            // Parse Xml and return Original Xml Tag
            $parse = xml_parser_create();
            xml_parse_into_struct($parse, $response, $vals, $index);
            xml_parser_free($parse);    

            // close curl connection
            // curl_close($curl);
            // return xml parsed
            return ['response' => $vals[3]['value'], 'hashvalue' => $hashvalue];

        } catch (\Throwable $th) {
            // Catch Throwable Error
            $err = curl_error($curl);
            return response()->json(['success' => false, 'error' => $th->getMessage(), 'curl_error' => $err]);

            // close curl connection
            curl_close($curl);
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

        return $response;

    }



    public function getBanks()
    {
        return response()->json([
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
            ],
            [
                "bankCode" => '070',
                'bankName' => 'Fidelity Bank'
            ]
        ], 200);
    }

    public function tryForm()
    {
        return view('try-nibbs-form');
    }

    /**
     * @param $string
     */
    public function hashValue($string)
    {
        $billerID = "NIBSS0000000128";
        $secret = "F78BE99289AB52FDF97190CEBFC1D6B8";

        $string = $string;
        return strtoupper(hash('sha256',trim($string)));
    }




























}
