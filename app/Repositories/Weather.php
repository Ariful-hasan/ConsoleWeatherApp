<?php

namespace App\Repositories;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class Weather 
{    
    
    /**
     * Call OpenWeatherApi using file_get_contents
     * 
     * @param string $city
     * @return mixed json | boolean
     */
    // public static function getWeatherDetails(string $city="")
    // {
    //     if (empty($city))
    //         return false;

    //     $url = API_URL."q={$city}&appid=".API_KEY;
    //     return file_get_contents($url);
    // }

    /**
     * Call OpenWeatherApi using GuzzleHttp
     *
     * @param string $city
     * @return mixed json | boolean
     */
    public static function getWeatherDetails(string $city="")
    {
         $url = API_URL."q={$city}&appid=".API_KEY;

         $client = new Client();
         return $client->request('GET', $url)->getBody();
    }
}