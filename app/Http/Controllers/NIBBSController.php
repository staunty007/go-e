<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SoapClient;
use SoapHeader;
class NIBBSController extends Controller
{
    private $host = "https://staging.nibss-plc.com.ng/CentralPayWebservice/CentralPayOperations?wsdl";
    // Get Banks List 
    public function getBanks()
    {
        
        try {
            
            $client = new SoapClient($this->host);
            // dd($client->listActiveBanks('NIBSS0000000128'));
            dd($client->__getTypes());
        } catch (\SoapFault $th) {
            dd($th);
        }

    }
}
