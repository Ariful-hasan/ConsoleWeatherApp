<?php

namespace App\Repositories;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class Weather 
{

    /**
     * Call OpenWeatherApi using GuzzleHttp
     *
     * @param string $city
     * @return array
     */
    public static function getWeatherDetailsByCityName(string $city=""): array
    {
        $url = API_URL."q={$city}&appid=".API_KEY;

        $client = new Client();
        $response = $client->request('GET', $url);
        return $response->getStatusCode() == SUCCESS ? json_decode($response->getBody(), true) : [];
    }
}