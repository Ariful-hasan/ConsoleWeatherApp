<?php

namespace App\Services;

use App\Repositories\Weather;
use App\Facades\CommonHelper;

class WeatherService 
{

    public function __construct(public string $city = "", private $weather = null) 
    {
       $this->weather = new Weather();
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
    public function getCityWeather(): string
    {
        try {
            $weather_data =$this->weather->getWeatherDetailsByCityName($this->city);
            $weather_data = !empty($weather_data) ? json_decode($weather_data, true) : "";

            if (empty($weather_data))
                return MSG_404;

            return CommonHelper::getWeaterDescription($weather_data)
                . ", "
                . CommonHelper::getWeatherTemperature($weather_data);
        } catch (\Exception $e) {
            return CommonHelper::getMessageFromWeatherResponse($e->getMessage()) ?? MSG_404;
        }
    }
}