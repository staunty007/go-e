<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SoapClient;
use SoapHeader;
class NIBBSController extends Controller
{
    private $host = "http://staging.nibss-plc.com.ng/CentralPayWebservice/CentralPayOperations?wsdl";
    // Get Banks List 
    public function getBanks()
    {
        $contextOptions = array(
            'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            ));
        
        $sslContext = stream_context_create($contextOptions);
        
        $params =  array(
            'trace' => 1,
            'exceptions' => true,
            'cache_wsdl' => WSDL_CACHE_NONE,
            'stream_context' => $sslContext
            );
        
        try {
            $proxy = new SoapClient( $this->host, $params );
        } catch (SoapFault $proxy) {
            var_dump(libxml_get_last_error());
            // var_dump($proxy);
        }
        // try {
        //     libxml_disable_entity_loader(false);
        //     $client = new \SoapClient($this->host, $params);
        //     dd($client->listActiveBanks('NIBSS0000000128'));
        // } catch (\SoapFault $th) {
        //     dd($th);
        // }

    }
}
