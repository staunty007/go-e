<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artisaninweb\SoapWrapper\SoapWrapper;

class IkejaController extends Controller
{
    protected $soapWrapper;
   
    public function __construct(SoapWrapper $soapWrapper)
    {
      $this->soapWrapper = $soapWrapper;
    }
    
    public function index()
    {
     $this->soapWrapper->add('Ikeja', function ($service) {
        $service
          ->wsdl('http://demoapi.iepins.com.ng/API/vproxy.asmx?wsdl')
          ->trace(true);
      });
  
             $data = $this->soapWrapper->call('Ikeja.FetchCust', [[
                'MeterNo' => request('MeterNo'),
                'hashstring' => request('hash'),
                'api_key' => request('api_key'),
             ]]);

            return response()->json($data);
  
             //$response = $data->GetHolidaysForYearResult->any;
  
  
        //     $sxe = new \SimpleXMLElement($response);
        //   $sxe->registerXPathNamespace('d', 'urn:schemas-microsoft-com:xml-msdata');
        //   $result = $sxe->xpath("//NewDataSet");
        //   echo "<pre>";
        //   foreach ($result[0] as $title) {
        //       echo "<strong>" . $title->Key . "</strong>: " . $title->Name . "(" . $title->Date . ")" . "<br/>";
        //   }
    }
}
