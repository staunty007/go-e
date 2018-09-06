<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SoapClient;
use SoapHeader;

class TestSoapController extends Controller
{
    /**
     * Starts a session conntection to the api 
     */
    public function startSession()
    {
        // Get Partner details
        $partner = $this->partnerDetails();
        $sessionId = '';
        // Instnatiate the SOAPCLient
        $client = new \SoapClient('http://dev2.convergenceondemand.net:28080/TMP/Partners?wsdl', array('soap_version' => SOAP_1_1, "trace" => 1, "exceptions" => 0)); 
        // Set Headers for the soap client
        // $header = new \SoapHeader('http://soap.convergenceondemand.net/TMP/', 'sessionId');
        // Pass headers
        // $client->__setSoapHeaders($header);
        //makes the soap call and passes the required parameters
        $results = $client->__soapCall("startSession",  
            array( "startSession" => 
                array( 
                    "partnerId"=> $partner['partner_id'], 
                    "accessKey"=> $partner['access_key']
                )
            )
        );

        $jsonResult = json_encode($results);

        return response()->json($jsonResult);
    }

    /**
     * Login to session after getting the session id
     */
    public function loginSession($session)
    {
         // Get Partner details
         $partner = $this->partnerDetails();
         $sessionId = '';
         // Instnatiate the SOAPCLient
         $client = new \SoapClient('http://dev2.convergenceondemand.net:28080/TMP/Partners?wsdl', array('soap_version' => SOAP_1_1, "trace" => 1, "exceptions" => 0)); 
         // Set Headers for the soap client
         $header = new \SoapHeader('http://soap.convergenceondemand.net/TMP/', 'sessionId',$session);
         // Pass headers
         $client->__setSoapHeaders($header);
         //makes the soap call and passes the required parameters
         $results = $client->__soapCall("login",  
             array( "login" => 
                 array( 
                     "email"=> $partner['email'], 
                     "accessKey"=> $partner['access_key']
                 )
             )
        );

        $jsonResult = json_encode($results);

        return response()->json($jsonResult);
    }

    /**
     * This will return the partner details, hardcoded
     * @param array $details
     * return $details
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
