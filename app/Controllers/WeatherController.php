<?php
namespace App\Controllers;

use App\Services\WeatherService;
use App\Facades\CommonHelper;

class WeatherController 
{

    public function __construct(public string $str = "", public string $city = "")
    {     
        $this->str = CommonHelper::getUserInput();
        $this->getCityFromString();
    }

    /**
     * This is used for showing the weather details
     *
     * @return void
     */
    public function showCurrentWeather(): void
    {
        try {
             $weather_service = new WeatherService($this->city);
             echo $weather_service->index();
        } catch (\Exception $e) {
            echo MSG_ERROR;
        }
    }

    /**
     * Separate city from string
     *
     * @return void
     */
    public function getCityFromString(): void
    {
        $str = explode(" ", trim($this->str));
        $this->city = is_array($str) ? (count($str) > 1 ? $str[1] : $str[0]) : "";
    }

}