<?php

use App\Services\WeatherService;

final class WeatherAppTest extends \PHPUnit\Framework\TestCase 
{

    public $city = "Brussels";

    public function test_is_get_city_weather_valid_for_empty_city()
    {
        $weather_service = new WeatherService ();
        $result = $weather_service->getCityWeather();
        $this->assertStringContainsString("No", $result);
    }
}