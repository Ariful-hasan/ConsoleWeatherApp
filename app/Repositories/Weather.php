<?php

namespace App\Repositories;

class Weather 
{    
    
    /**
     * Call OpenWeatherApi 
     * 
     * @param string $city
     * @return mixed json | boolean
     */
    static public function getWeatherDetails(string $city="")
    {
        if (empty($city))
            return false;

        $url = API_URL."q={$city}&appid=".API_KEY;
        return file_get_contents($url);
    }
}