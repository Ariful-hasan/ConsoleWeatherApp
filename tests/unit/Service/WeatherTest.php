<?php

use App\Services\WeatherService;

final class WeatherAppTest extends \PHPUnit\Framework\TestCase 
{

    public $city = "Brussels";

    public function test_is_get_city_weather_valid_for_empty_city()
    {
        $weather_service = new WeatherService ();
        $result = $weather_service->getCityWeather();
        $this->assertEquals(MSG_404, $result);
    }

    /**
     * @test
     */
    // public function type_error_is_thrown_when_try_to_processWeather_by_invalid_data_type()
    // {
    //     try {
    //         $getdata = new WeatherService ("Brussels");
    //         $getdata->processWeather("Hello World");
    //         $this->fail("Type error should be thrown.");
    //     } catch (TypeError $error) {
    //         $this->assertStringStartsWith("Type Error : ", $error->getMessage());
    //     }
    // }
}