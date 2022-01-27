<?php
namespace App\Controllers;

use App\Services\WeatherService;
use App\Facades\CommonHelper;
use App\Validators\Validator;

class WeatherController 
{
    public string $city;

    public function __construct(Validator $validator)
    {     
        $validate = $validator->validate(CommonHelper::getUserInput());
        
        if ($validate[STATUS] !== true) {
            echo $validate[MSG];
            exit;
        }
        
        $this->city = $validate[DATA];
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
            echo $weather_service->getCityWeather();
        } catch (\Exception $e) {
            echo MSG_ERROR;
        }
    }

}