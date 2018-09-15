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
        $sessionBack = $results->response->session;

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

        dd($loginResults);

    }


    /**
     * Login to session after getting the session id
     */
    public function loginSession($session)
    {
         // Get Partner details
         $partner = $this->partnerDetails();
        
        // Instantiate the SOAPCLient
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

        return $results;
    }

    /***
     * Store Session for application purposes
     */
    public function storeSession($session)
    {
        session()->put(['TAMSES' => $session]);
        return response()->json(['success' => 1]);
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

       $jsonResult = json_encode($results);
       return response()->json($jsonResult);
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

    public function xml2array ( $xmlObject, $out = array () )
    {
        foreach ( (array) $xmlObject as $index => $node )
            $out[$index] = ( is_object ( $node ) ) ? $this->xml2array ( $node ) : $node;

        return $out;
    }
}
