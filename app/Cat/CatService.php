<?php

namespace App\Cat;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

class CatService {

    public function getCat()
    {
        $response = Http::get('https://thatcopy.pw/catapi/rest/');
        if ($response->status() == 500) {
            throw \Exception('Server exception');
        }

        return Arr::get($response, 'webpurl');
    }
}
