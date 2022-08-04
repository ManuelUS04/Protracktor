<?php

namespace App\Http\Repositories;

use Illuminate\Support\Facades\Http;

class AllOfficeRepository {
    
    public function all() {

        if ($_ENV['USE_MOCKAPI'] == 'false'){

             
            $token = TokenRepository::jwt();                         
            $offices = Http::withToken($token)->get($_ENV['API_URL'].'api/Office');
            
        }
        else{
            $offices = HTTP::get('http://61ef3f1cd593d20017dbb3e3.mockapi.io/offices'); 
        }            
        return $offices->json();

    }
}