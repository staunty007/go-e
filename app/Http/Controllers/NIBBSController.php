<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NIBBSController extends Controller
{
    // private $host = "https://staging.nibss-plc.com.ng/CentralPayWebservice/CentralPayOperations?wsdl";
    private $host = "https://staging.nibss-plc.com.ng/CentralPayPlus/pay";
    // Get Banks List 
    public function getBanks()
    {
        $options = [
            "trace" => 1,
        ];

        $client = new \SoapClient($this->host, $options);
        // $client = new \SoapClient($this->host); 
        //makes the soap call and passes the required parameters
        $results = $client->__soapCall(
            "listActiveBanks",
            ["listActiveBanks" => [
                "NIBSS0000000128"
            ]]
        );
        dd($results);
    }
}
