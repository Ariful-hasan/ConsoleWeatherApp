<?php
namespace App\Controllers;

use App\Services\GetData;

class WeatherController 
{

    public function __construct (public string $str = "", public string $city = "")
    {       
        $this->getCityFromString();
    }


    /**
     * This is index working like invoke
     *
     * @return string
     */
    public function printWeather(): string
    {
        try {
             $response = new GetData($this->city);
             return $response->index();
        } catch (\Exception $e) {
            //return $e->getMessage();
            return MSG_ERROR;
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