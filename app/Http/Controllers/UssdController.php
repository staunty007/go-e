<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\CIUssdController;


class UssdController extends Controller
{
    public function register(Request $request, CIUssdController $ci)
    {
    	// Reads the variables sent via POST from our gateway
    	$sessionId   =$request->sessionId;
    	$serviceCode =$request->serviceCode;
    	$phoneNumber =$request->phoneNumber;
    	$text        =$request->text;


        switch ($text) {
            case '':
                $response  = "CON Welcome to GoEnerge Payment Service \n";
                $response .= "1. Make Payment \n";
                $response .= "2. My phone number";
                break;

            case '1':
                // Create EKEDC Session
                // if(!session()->get('TAMSES')) {
                    $ci->signon();
                // }

                $response = "CON Make Payment \n";
                $response .= "1. Prepaid \n";
                $response .= "2. Postpaid";
            break;

            case '2':
                // Business logic for first level response
                // This is a terminal request. Note how we start the response with END
                $response = "END Your phone number is ".$phoneNumber;
            break;

            case '1*1':
                // This is a second level response where the user selected 1 in the first instance
                $prepaid = "CON Enter your Meter Number";
                /**
                 * Takes 2 parameters
                 * @param $accountType // Must me 'PREPAID' or 'POSTPAID'
                 * @param $customerId
                 * @return mixed
                 */
                $result = $ci->validateCustomer('PREPAID',$prepaid);
                if($result == true) {
                    $response = "CON Enter Amount you wish to pay";
                }
                // This is a terminal request. Note how we start the response with END
                $response = "CON ".$result;
            break;

            case '1*2':
                // This is a second level response where the user selected 1 in the first instance
                $balance  = "NGN 10,000";

                // This is a terminal request. Note how we start the response with END
                $response = "END Your balance is ".$balance;
            break;

                // Echo the response back to the API
                // header('Content-type: text/plain');
            
                // echo $response;

            
            default:
                $response = "END Apologies, something went wrong... \n";
                // Print the response onto the page so that our gateway can read it
                header('Content-type: text/plain');
                // echo $response;

                break;
        }

        echo $response;
    }

}
