<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SoapClient;

class TestSoapController extends Controller
{
    /**
     * Starts a session conntection to the api 
     */
    public function startSession()
    {
        // Get Partner details
        $partner = $this->partnerDetails();
        
        // Instnatiate the SOAPCLient
        $client = new \SoapClient('http://dev2.convergenceondemand.net:28080/TMP/Partners?wsdl', array('soap_version' => SOAP_1_1, "trace" => 1, "exceptions" => 0)); 
        // Set Headers for the soap client
        $header = new soapHeader('http://soap.convergenceondemand.net/TMP/', 'sessionId', $sessionId);
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
    }

    /**
     * Login to session after getting the session id
     */
    public function loginSession()
    {
        
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
