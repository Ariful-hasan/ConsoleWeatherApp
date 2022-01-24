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

    /**
     * Substring from the OpenMap Api
     *
     * @param string $str
     * @return string
     */
    public static function getMessageFromWeatherResponse(string $str = ""): string
    {
        if (empty($str))
            return "";

        preg_match('/"message":(.*)/',$str, $matches);

        if (isset($matches[0])) {
            $str = json_decode("{".$matches[0], true);
            return ucwords($str['message']) ?? "";
        }

        return "";
    }
}