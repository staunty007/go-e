<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DiamondApiController extends Controller
{
    public function credit() {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://certify.diamondbank.com/diamondconnecttest/api/Transaction/credit",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\n\t\"hash\":\"12345\",\n\t\"amount\": 100000,\n\t\"accountNumber\": \"0051212352\",\n\t\"sourceAccount\": \"0051212352\",\n\t\"transactionReference\": \"string\",\n\t\"transactionNaration\": \"Initial Test Credit\"\n}",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer CfDJ8EFKT24wTlBEhtTxAMej4r94WUov2LdH_fAm3NHwud4hu-IHvtsDXkC1rwDkGBPptwM1JXT9KnfTD0PMtCBdGuTjPiH8YzUbTDai8qPMoZDfT3fLisW02aOsy4q_-y-ylKME2KmHteg9ON_aYcZtoFrVjnmRtOkleGO6BoQWCbZZ4SXOEm6Eah84RJbDph34-hAx_R6CPHcE7go4Syh1wOy3y3oRGO7ONkO7XKoCllxF8p7E50yESgEQtbAui9jpt6tm3fUHHYl0HsO_c4wQhjt5lK9R2n5YPqn1fVWVsL7Ipf_KkDwDA-z0dGpAQgsirxjVXVDkLif82dEKrm0J0dAMVXQmWO24pN9O2fZP8rkeJ86wzTzdRhpXCMMon3UQgMzQocMwNFRuRKvJDzJlFYk1wMWY9wfZZm6UZmCd3jUkbrtXe4IKZagiO3AVlqecACOIwt9DsobUjpXK15K5UOAdVZOD5kaSzfKygc7LcQJ-IKzEdwNV3YnOZLGVoXnRIvFrd0Ef-Ot_SOKIIAOdSZc5eSPI2kRZh7XACieGIudWqDAz6PJhLcSK7eSuhI51uszKxf0rs8GHH2IiLvXx8-6kiwtZvbxIHMTPB-YtOBDA5YT7lOK6rSVfnXf6QAcVhEaAmfQ-G1QOc4XUcbR3Vna6hLqYNhp62eyxu31x7iX-Iv9KDh32DTPws0F8aInCYw",
                "Cache-Control: no-cache",
                "Content-Type: application/json",
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return response()->json(['error' => $err], 500);
            
        } else {
            return response()->json(['data' => $response], 200);
            
        }

        
    }
}
