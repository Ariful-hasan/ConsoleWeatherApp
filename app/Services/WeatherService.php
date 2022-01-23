<?php

namespace App\Services;

use App\Repositories\Weather;
use App\Helpers\Common;

class WeatherService 
{

    public function __construct (public string $city = "") 
    {
       
    }

    /**
     * This is index function
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
     * Call weather-api 
     * using repositories for json data
     *
     * @return string
     */
    public function getCityWeather (): string
    {
        try {
            $weather_data = Weather::getWeatherDetails($this->city);
            $weather_data = json_decode($weather_data, true);

            if (empty($weather_data))
                return MSG_404;

            return Common::getWeaterDescription($weather_data)
                . ", "
                . Common::getWeatherTemperature($weather_data);
        } catch (\Exception $e) {
            //log the Exception $e->getMessage();
            return MSG_500;
        }
    }
}