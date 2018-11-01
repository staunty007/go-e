<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SoapClient;
use SoapHeader;

class CIController extends Controller
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

        // return response()->json([response => ['success' => 1]]);

    }

    /**
     * Validate Customer , Meter Number or Account Number
     * @param string $session
     */
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

        // return $results;
        // dd($results);
        if ($results->response->retn !== 0 || $results->response->retn == 400 || $results->response->desc == "Invalid Session") {
            return response()->json(
                ['response' =>
                    [
                    "retn" => $results->response->retn,
                    "error" => "Unable to Connect to the Validation Provider due to a glitch from our end, Please try again Later",
                    "desc" => $results->response
                ]]
            );
        }
        if ($results->response->customerInfo->accountType !== $accountType) {
            return response()->json(['response' => ["retn" => 102, "error" => "Invalid Account Type", $results->response]], 400);
        } else {
            // return $results;
            return response()->json($results);
            // $this->validatePayment($results->response()->customerInfo->accountType, $customerId);
        }
    }

    /**
     * Validates or checks customer payment
     */
    public function validatePayment($accountType = "OFFLINE_POSTPAID", $customerId = "1015124465-01", $orderId = "")
    {
        $account = "";
        switch ($accountType) {
            case 'PREPAID':
                $account = "OFFLINE_PREPAID";
                break;
            default:
                $account = "OFFLINE_POSTPAID";
                break;
        }
        $payload = [
            'accounttype' => $account,
            'customer_id' => $customerId,
            'orderId' => $orderId
        ];

        // return ["payload" => $payload];
         // Get Partner details
        $partner = $this->partnerDetails();
         // Gets the global session TAMSES
        $sessionId = session()->get('TAMSES');
         // Instantiate the SOAPCLient
        $client = new \SoapClient('http://dev1.convergenceondemand.net:28080/TMP/Partners?wsdl', array('soap_version' => SOAP_1_1, "trace" => 1, "exceptions" => 0)); 
         // Set Headers for the soap client
        $header = new \SoapHeader('http://soap.convergenceondemand.net/TMP/', 'sessionId', $sessionId);
         // Pass headers
        $client->__setSoapHeaders($header);
        // return $orderId;
         //makes the soap call and passes the required parameters
        $result = $client->__soapCall(
            "validatePayment",
            ["validatePayment" =>
                [
                "tenantId" => $partner['tenant_id'],
                "params" => [
                    "accountType" => $account,
                    "customerId" => $customerId,
                    // "orderId" => "$orderId",
                    "extraData" => "",
                ]
            ]]
        );

        return response()->json(["result" => $result, "payload" => $payload]);
    }

    /**
     * Charge Wallet / Process Payment
     * @param int $amount // Amount to charge
     * @param string $accountType // customer account type ( Prepaid or Postpaid )
     * @param string $customerId // Account Or Meter Number Based on $accountType
     * Switch Account Type to charge the correct customer account
     */
    public function chargeWallet($amount, $accountType, $customerId)
    {
        $customerAccountNumVal = "";
        switch ($accountType) {
            case 'OFFLINE_POSTPAID':
                $customerAccountNumVal = "accountNumber";
                break;
            case 'OFFLINE_PREPAID':
                $customerAccountNumVal = "meterNumber";
                break;

            default:
                $customerAccountNumVal = "accountNumber";
                break;
        }

        $client = new SoapClient('http://dev1.convergenceondemand.net:28080/TMP/Partners?wsdl', array('soap_version' => SOAP_1_1, "trace" => 1, "exceptions" => 0));

        $sessionId = session()->get('TAMSES');

        //makes the soap call and passes the required parameters
        $header = new SoapHeader('http://soap.convergenceondemand.net/TMP/', "sessionId", $sessionId);

        $client->__setSoapHeaders($header);

        $result = $client->__soapCall("chargeWalletV2", array("chargeWalletV2" => [
            'params' => [
                'amount' => $amount,
                'paymentReference' => str_random(10),
                'extraData' => [
                    [
                        'key' => "$customerAccountNumVal",
                        'value' => $customerId
                    ],
                    [
                        'key' => 'accountType',
                        'value' => $accountType
                    ]
                ]
            ]
        ]));
        if ($result->response->retn !== 0) {
            return response()->json(["response" => $result->response->desc]);
        } else {
            return response()->json(["response" => ["success" => true, "result" => $result->response]], 200);
        }
    }

    public function generateToken($paymentRef, $orderId)
    {
        
        // dd($validate);
        $partner = $this->partnerDetails();

        $client = new SoapClient('http://dev1.convergenceondemand.net:28080/TMP/Partners?wsdl', array('soap_version' => SOAP_1_1, "trace" => 1, "exceptions" => 0));

        $sessionId = session()->get('TAMSES');
        //makes the soap call and passes the required parameters
        $header = new SoapHeader('http://soap.convergenceondemand.net/TMP/', "sessionId", $sessionId);

        $client->__setSoapHeaders($header);

        $result = $client->__soapCall(
            "getOrderDetailsV2",
            array("getOrderDetailsV2" =>
                [
                'tenantId' => $partner['tenant_id'],
                'paymentReference' => $paymentRef,
                'orderId' => $orderId
            ])
        );
        // if(!$result->response)
        // Requery if not generated on first call
        // check for how many times the sleep is sleeping
        $i = 0;
        $status = $result->response->orderDetails->status;
        if ($status !== "CONFIRMED") {
            // sleep(5);
            $result = $this->requeryToken($result->response->orderDetails->paymentReference, $result->response->orderDetails->orderId);
        }

        return response()->json(["response" => $result], 200);

    }

    public function requeryToken($paymentRef, $orderId)
    {
        sleep(10);
        $partner = $this->partnerDetails();

        $client = new SoapClient('http://dev1.convergenceondemand.net:28080/TMP/Partners?wsdl', array('soap_version' => SOAP_1_1, "trace" => 1, "exceptions" => 0));

        $sessionId = session()->get('TAMSES');
        //makes the soap call and passes the required parameters
        $header = new SoapHeader('http://soap.convergenceondemand.net/TMP/', "sessionId", $sessionId);

        $client->__setSoapHeaders($header);

        $result = $client->__soapCall(
            "getOrderDetailsV2",
            array("getOrderDetailsV2" =>
                [
                'tenantId' => $partner['tenant_id'],
                'paymentReference' => $paymentRef,
                'orderId' => $orderId
            ])
        );

        return $result;

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
