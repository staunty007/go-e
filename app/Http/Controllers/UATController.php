<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use SoapClient;
use SoapHeader;
class UATController extends Controller
{
    public function signOn()
    {
        $partner = $this->partnerDetails();
        // // Instnatiate the SOAPCLient
        $client = new \SoapClient('http://dev1.convergenceondemand.net:28080/TMP/Partners?wsdl', array('soap_version' => SOAP_1_1, "trace" => 1, "exceptions" => 0)); 
        //makes the soap call and passes the required parameters
        $results = $client->__soapCall("startSession",  
            ["startSession" => 
                [ 
                    "partnerId"=> $partner['partner_id'], 
                    "accessKey"=> $partner['access_key'],
                    "deviceId" => 'Ralmtest',
                    "osVersion" => '1.0'
                ]
            ]
        );

        echo "Got Back Session ID ". $results->response->session. "<hr>";
        // if we get a saop fault error back, redirect to a page to try again
        // if(is_soap_fault($results)) {
        //     return redirect('/bad-calls');
        // }else {
        //     if($results->response->retn !== 0) {
        //         return redirect()->route('guest.login');
        //     }else {
        //         $sessionBack = $results->response->session;
        //     }
        // }
        // dd($sessionBack);
        // sleep(3);   
        $sessionBack = $results->response->session;
        
        $client = new \SoapClient('http://dev1.convergenceondemand.net:28080/TMP/Partners?wsdl', array('soap_version' => SOAP_1_1, "trace" => 1, "exceptions" => 0)); 
        // Set Headers for the soap client
        $header = new \SoapHeader('http://soap.convergenceondemand.net/TMP/', "sessionId", $sessionBack);
        // Pass headers
        $client->__setSoapHeaders($header);
        //makes the soap call and passes the required parameters
        $loginResults = $client->__soapCall("login",  
             array( "login" => 
                 array( 
                     "email" => $partner['email'], 
                     "accessKey" => $partner['access_key']
                 )
             )
        );
        // Remove the session before setting back another one
        session()->forget('TAMSES');
        // Save session for all page use
        session()->put(['TAMSES' => $sessionBack]);

        // dd($loginResults);

        echo "Logged In Session ID ".$results->response->session;
    }

    /**
     * Validate Customer , Meter Number or Account Number
     * @param string $session
     */
    public function validateCustomer($accountType = "OFFLINE_POSTPAID" , $customerId) {
        // Get Partner details
        $partner = $this->partnerDetails();
        // Gets the global session TAMSES
        $sessionId = session()->get('TAMSES');
        echo "Using Session ID $sessionId <br><hr>";
        // dd($sessionId);
        // Instantiate the SOAPCLient
        $client = new \SoapClient('http://dev1.convergenceondemand.net:28080/TMP/Partners?wsdl', array('soap_version' => SOAP_1_1, "trace" => 1, "exceptions" => 0)); 
        // Set Headers for the soap client
        $header = new \SoapHeader('http://soap.convergenceondemand.net/TMP/', 'sessionId',$sessionId);
        // Pass headers
        $client->__setSoapHeaders($header);
        //makes the soap call and passes the required parameters
        $results = $client->__soapCall("validateCustomer",  
            array( "validateCustomer" => [
                    "accountOrMeterNumber" => $customerId,
                    "tenantId" => $partner['tenant_id'],
                ]
            )
        );
        if($results->response->customerInfo->accountType !== $accountType) {
            return "Invalid Account Type";
        }else {
            $data = [
                "accountType" => $results->response->customerInfo->accountType,
                "valid" => 1,
                "success" => true
            ];

            return response()->json(['response' => $data]);
        }
    }


    /**
     * Charge Wallet / Process Payment
     * @param int $amount // Amount to charge
     * @param string $accountType // customer account type ( Prepaid or Postpaid )
     * @param string $customerId // Account Or Meter Number Based on $accountType
     * Switch Account Type to charge the correct customer account
     */
    public function chargeWallet($amount = 1000,$accountType = "OFFLINE_POSTPAID", $customerId) {
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

        // return $customerAccountNumVal;
        $client = new SoapClient('http://dev1.convergenceondemand.net:28080/TMP/Partners?wsdl', array('soap_version' => SOAP_1_1, "trace" => 1, "exceptions" => 0));

        $sessionId = session()->get('TAMSES');

        echo "USING ID $sessionId <hr>";

        //makes the soap call and passes the required parameters
        $header = new SoapHeader('http://soap.convergenceondemand.net/TMP/',"sessionId",$sessionId);

        $client->__setSoapHeaders($header);

        /*$result = $client->__soapCall("chargeWalletV2", [
        'params'=> $param
        ]);*/
        $result = $client->__soapCall("chargeWalletV2", array( "chargeWalletV2" => [
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
            ]
        ));
        // if($result->response->retn == 102) {
        //     return response()->json(["error" => $result->response->desc]);
        // }else {
        //     return response()->json(["success" => true, "response" => $result->response],200);
        // }
        // dd($result);
        return $result;
    }

    public function generateToken()
    {
        $validate = $this->chargeWallet('1000','OFFLINE_PREPAID','101165002219');
        // dd($validate);
        $partner = $this->partnerDetails();

        $client = new SoapClient('http://dev1.convergenceondemand.net:28080/TMP/Partners?wsdl', array('soap_version' => SOAP_1_1, "trace" => 1, "exceptions" => 0));

        $sessionId = session()->get('TAMSES');
        //makes the soap call and passes the required parameters
        $header = new SoapHeader('http://soap.convergenceondemand.net/TMP/',"sessionId",$sessionId);

        $client->__setSoapHeaders($header);

        /*$result = $client->__soapCall("chargeWalletV2", [
        'params'=> $param
        ]);*/
        /**
         * $result = $client->__soapCall("chargeWalletV2", [
         *  "chargeWalletV2" => [
         *      "params" => [
         *          'key' => 'value',
         *          'key' => 'value',
         *          'key' => 'value',
         *      ]
         *  ]
         * ]);
         */
        $result = $client->__soapCall("getOrderDetailsV2", 
            array( "getOrderDetailsV2" => 
                [
                    'tenantId'=> $partner['tenant_id'],
                    'paymentReference' => $validate->response->orderDetails->paymentReference,
                    'orderId' => $validate->response->orderId
                ]
        ));
        // if(!$result->response)
        // Requery if not generated on first call
        // check for how many times the sleep is sleeping
        $i = 0;
        $status = $result->response->orderDetails->status;
        while ($status !== "CONFIRMED") {
            $result = $client->__soapCall("getOrderDetailsV2", 
                array( "getOrderDetailsV2" => 
                    [
                        'tenantId'=> $partner['tenant_id'],
                        'paymentReference' => $validate->response->orderDetails->paymentReference,
                        'orderId' => $validate->response->orderId
                    ]
            ));
            sleep(5);
            $i++;
            if($i == 5) {
                break;
            }
        }
        

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
