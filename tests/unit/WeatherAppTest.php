<?php

use App\Services\GetData;
use App\Repositories\Weather;

class WeatherAppTest extends \PHPUnit\Framework\TestCase 
{

    public $city = "Brussels";

    public function test_empty_array_data_for_processWeather()
    {
        $getdata = new GetData ($this->city);
        $result = $getdata->processWeather([]);
        $this->assertEquals("No data found!", $result);
    }

    public function test_empty_city_data_for_getCityWeather()
    {
        $getdata = new GetData ();
        $result = $getdata->getCityWeather();
        $this->assertEquals("Woops! something went wrong.", $result);
    }

    /**
     * @test
     */
    public function type_error_is_thrown_when_try_to_processWeather_by_invalid_data_type()
    {
        try {
            $getdata = new GetData ("Brussels");
            $getdata->processWeather([]);
            $this->fail("Type error should be thrown.");
        } catch (TypeError $error) {
            $this->assertStringStartsWith($error->getMessage());
        }
    }
}