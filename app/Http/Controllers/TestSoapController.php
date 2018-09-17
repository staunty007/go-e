<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SoapClient;
use SoapHeader;
// use PHPUnit\Framework\Constraint\Exception;

class TestSoapController extends Controller
{
    /**
     * Starts a session conntection to the api 
     */
    public function startSession()
    {
        // Get Partner details
        // Get Partner details
        $partner = $this->partnerDetails();
        // Instnatiate the SOAPCLient
        $client = new \SoapClient('http://dev2.convergenceondemand.net:28080/TMP/Partners?wsdl', array('soap_version' => SOAP_1_1, "trace" => 1, "exceptions" => 0)); 
        //makes the soap call and passes the required parameters
        $results = $client->__soapCall("startSession",  
            array( "startSession" => 
                array( 
                    "partnerId"=> $partner['partner_id'], 
                    "accessKey"=> $partner['access_key']
                )
            )
        );
        if(is_soap_fault($results)) {
            dd('Soap');
        }else {
            $sessionBack = $results->response->session;
        }
        // dd($sessionBack);
        // sleep(3);   
        
        $client = new \SoapClient('http://dev2.convergenceondemand.net:28080/TMP/Partners?wsdl', array('soap_version' => SOAP_1_1, "trace" => 1, "exceptions" => 0)); 
        // Set Headers for the soap client
        $header = new \SoapHeader('http://soap.convergenceondemand.net/TMP/', "sessionId",$sessionBack);
        // Pass headers
        $client->__setSoapHeaders($header);
        //makes the soap call and passes the required parameters
        $loginResults = $client->__soapCall("login",  
             array( "login" => 
                 array( 
                     "email"=> $partner['email'], 
                     "accessKey"=> $partner['access_key']
                 )
             )
        );

        session()->put(['TAMSES' => $sessionBack]);

    }


    /**
     * Validate Customer , Meter Number or Account Number
     * @param string $session
     */
    public function validateCustomer($number) {
        // Get Partner details
        $partner = $this->partnerDetails();
        // Gets the global session TAMSES
        $sessionId = session()->get('TAMSES');
        // Instantiate the SOAPCLient
        $client = new \SoapClient('http://dev2.convergenceondemand.net:28080/TMP/Partners?wsdl', array('soap_version' => SOAP_1_1, "trace" => 1, "exceptions" => 0)); 
        // Set Headers for the soap client
        $header = new \SoapHeader('http://soap.convergenceondemand.net/TMP/', 'sessionId',$sessionId);
        // Pass headers
        $client->__setSoapHeaders($header);
        //makes the soap call and passes the required parameters
        $results = $client->__soapCall("validateCustomer",  
            array( "validateCustomer" => 
                array( 
                    "tenantId"=> $partner['tenant_id'], 
                    "accountOrMeterNumber"=> $number
                )
            )
       );
        // dd($results);
    //    $jsonResult = json_encode($results);
       return response()->json($results);
    }


    // charge wallet
    public function chargeWallet($amount,$meter) {

        $client = new SoapClient('http://dev2.convergenceondemand.net:28080/TMP/Partners?wsdl', array('soap_version' => SOAP_1_1, "trace" => 1, "exceptions" => 0));

        $sessionId = session()->get('TAMSES');

//makes the soap call and passes the required parameters
        $header = new SoapHeader('http://soap.convergenceondemand.net/TMP/',"sessionId",$sessionId);

        $client->__setSoapHeaders($header);

        /*$result = $client->__soapCall("chargeWalletV2", [
        'params'=> $param
        ]);*/
        $result = $client->__soapCall("chargeWalletV2", array( "chargeWalletV2" => [
            'params' => [
                'amount'=> 1000,
                'paymentReference' => '2341ralmouf',
                'extraData'=> [
                                [
                                    'key'=> 'meterNumber',
                                    'value' => '0101150282024'
                                ],
                                [
                                'key'=> 'accountType',
                                'value' => 'OFFLINE_PREPAID'
                                ]
                            ]
                        ]
            ]
        ));
        dd($result);
    }

    /**
     * This will return the partner details, hardcoded
     * @return $details
     */
    public function partnerDetails() 
    {
        return [
            "partner_id" => "TP27136431",
            "access_key" => "nCRzGYxi1wdfqyBA2nQvAKq8SqUxP3",
            "email" => "test@ralmuof.com",
            "tenant_id" => "EKEDP"
        ];
    }

}
