<?php

namespace App\Helpers;

class Common 
{

    /**
     * get weather description from an array
     *
     * @param array $data
     * @return string
     */
    public static function getWeaterDescription(array $data = []): string
    {
        return isset($data['weather'][0]['description']) ? 
                $data['weather'][0]['description'] : "";
    }

    /**
     * get weather temperature from an array
     *
     * @param array $data
     * @return string
     */
    public static function getWeatherTemperature(array $data = []): string
    {
        if (isset($data['main']['temp'])) {
            $degree = round($data['main']['temp'] - KELVIN, 1);
            return $degree == 0 || $degree == 1 ? 
                $degree . "degree celcius" : 
                $degree . " degrees celcius";
        }

        return "";
    }

    /**
     * get user input
     * 
     * @return string
     */
    public static function getUserInput(): string
    {
        return readline("weather ");
    }
}