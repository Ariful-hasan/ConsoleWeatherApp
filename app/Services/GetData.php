<?php

namespace App\Services;

use App\Repositories\Weather;

class GetData 
{

    public function __construct (public string $city = "") 
    {
       
    }


    /**
     * This is index working like invoke
     *
     * @return string
     */
    public function index(): string 
    {
         if (empty($this->city))
             return MSG_400;

         return $this->getCityWeather();
    }


    /**
     * Call api using repositories for json data
     *
     * @return string
     */
    public function getCityWeather () 
    {
        try {
            $weather = Weather::getWeatherData($this->city);
            
            if (empty($weather))
                return MSG_404;
            
            return $this->processWeather(json_decode($weather, true));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    /**
     * Generate result from an array
     * 
     * @param array $data
     * @return string
     */
    public function processWeather(array $data = []): String
    {        
        if (empty($data))
            return MSG_404;
                 
        $response = "";

        if (isset($data['weather'][0]['description']))
            $response .= $data['weather'][0]['description'] . ", ";

        if (isset($data['main']['temp'])) {
            $degree = round($data['main']['temp'] - KELVIN);
            $response .= $degree == 0 || $degree == 1 ? $degree . "degree celcius" : $degree . " degrees celcius";
        }
            
        return $response;
    }
}