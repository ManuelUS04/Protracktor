<?php

namespace App\Http\Repositories;
use Illuminate\Support\Facades\Http;

abstract class SmsRepository{
    public static function send($number,$message){
       
        // URL
        $apiURL = $_ENV['SMS_TELNYX_API'];

         // POST Data
        $postInput = [
            'from' => $_ENV['SMS_TELNYX_FROM'],
            'to' => $number,
            'text' => $message
        ];

        // Headers
        $headers = [
            
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '.$_ENV['SMS_TELNYX_API_KEY']
        ];

        $response = Http::withHeaders($headers)->post($apiURL, $postInput);
  
        $statusCode = $response->status();

        return $statusCode;
    }
}