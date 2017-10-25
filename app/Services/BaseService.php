<?php

namespace App\Services;

class BaseService {
    public $baseUrl = "https://test-api.dfstars.com";
    public $token = "hzHCEDwlA25EsBAD1JULHej2GYn58/WRECMFnvtiZio=";

    public function get($path) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->baseUrl.''.$path);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
         $headers = [
            'Content-Type: application/json',
            'Authorization: key '.$this->token
        ];

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        $res = curl_exec ($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close ($ch);
        $result = [
            'result' => @json_decode($res, true),
            'status_code' => $httpcode
        ];
        return $result;
    }

    public function post($path, $data) {
    	$ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->baseUrl.''.$path);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, @json_encode($data));  //Post Fields
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
         $headers = [
            'Content-Type: application/json',
            'Authorization: key '.$this->token
        ];

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        $res = curl_exec ($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close ($ch);
        $result = [
            'result' => @json_decode($res, true),
            'status_code' => $httpcode
        ];
        return $result;
    }
    

}
