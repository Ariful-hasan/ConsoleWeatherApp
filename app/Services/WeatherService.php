<?php

namespace App\Services;

use App\Repositories\Weather;
use App\Facades\CommonHelper;

class WeatherService 
{

    public function __construct(public string $city = "") 
    {
      
    }

    /**
     * Call weather-api 
     * using repositories
     *
     * @return string
     */
    public function getCityWeather(): string
    {
        try {
            $weather_data = Weather::getWeatherDetailsByCityName($this->city);

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