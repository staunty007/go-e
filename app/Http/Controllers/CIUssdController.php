<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SoapClient;
use SoapHeader;

class CIUssdController extends Controller
{
    public function signon()
    {
        $partner = $this->partnerDetails();
        // // Instnatiate the SOAPCLient
        $client = new \SoapClient('http://dev1.convergenceondemand.net:28080/TMP/Partners?wsdl', array('soap_version' => SOAP_1_1, "trace" => 1, "exceptions" => 0)); 
        //makes the soap call and passes the required parameters
        $results = $client->__soapCall(
            "startSession",
            ["startSession" =>
                [
                "partnerId" => $partner['partner_id'],
                "accessKey" => $partner['access_key'],
                "deviceId" => 'Ralmtest',
                "osVersion" => '1.0'
            ]]
        );

        // if we get a saop fault error back, redirect to a page to try again
        if (is_soap_fault($results)) {
            return redirect('/bad-calls');
        } else {
            if ($results->response->retn !== 0) {
                return redirect()->route('guest.login');
            } else {
                $sessionBack = $results->response->session;
            }
        }

        $client = new \SoapClient('http://dev1.convergenceondemand.net:28080/TMP/Partners?wsdl', array('soap_version' => SOAP_1_1, "trace" => 1, "exceptions" => 0)); 
        // Set Headers for the soap client
        $header = new \SoapHeader('http://soap.convergenceondemand.net/TMP/', "sessionId", $sessionBack);
        // Pass headers
        $client->__setSoapHeaders($header);
        //makes the soap call and passes the required parameters
        $loginResults = $client->__soapCall(
            "login",
            array("login" =>
                array(
                "email" => $partner['email'],
                "accessKey" => $partner['access_key']
            ))
        );
        // Remove the session before setting back another one
        session()->forget('TAMSES');
        // Save session for all page use
        session()->put(['TAMSES' => $sessionBack]);
    }

    // Validates the Customer Meter or Account Number
    public function validateCustomer($accountType, $customerId)
    {
        // Get Partner details
        $partner = $this->partnerDetails();
        // Gets the global session TAMSES or create if it doesnt exists
        if (!session()->get('TAMSES')) {
            $this->signon();
        }
        $sessionId = session()->get('TAMSES');
        // Instantiate the SOAPCLient
        $client = new \SoapClient('http://dev1.convergenceondemand.net:28080/TMP/Partners?wsdl', array('soap_version' => SOAP_1_1, "trace" => 1, "exceptions" => 0)); 
        // Set Headers for the soap client
        $header = new \SoapHeader('http://soap.convergenceondemand.net/TMP/', 'sessionId', $sessionId);
        // Pass headers
        $client->__setSoapHeaders($header);
        //makes the soap call and passes the required parameters
        $results = $client->__soapCall(
            "validateCustomer",
            array("validateCustomer" => [
                "accountOrMeterNumber" => $customerId,
                "tenantId" => $partner['tenant_id'],
            ])
        );

        // return response()->json($results);
        // dd($results);
        if ($results->response->retn !== 0 || $results->response->retn == 400 || $results->response->desc == "Invalid Session") {
            return "Cannot Connect to the Service Provider at the moment, Please Try again Later";
        }
        if ($results->response->customerInfo->accountType !== "OFFLINE_".$accountType) {
            return "Invalid Account Type";
        } else {
            // return $results;
            return true;
            // $this->validatePayment($results->response()->customerInfo->accountType, $customerId);
        }   
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
