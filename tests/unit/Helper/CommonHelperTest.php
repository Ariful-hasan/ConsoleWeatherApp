<?php

use App\Facades\CommonHelper;

final class CommonHelperTest extends \PHPUnit\Framework\TestCase 
{
    
    public function test_is_get_weather_description_valid_for_empty_array()
    {
        $result = CommonHelper::getWeaterDescription();
        $result = empty($result) ? true : false;
        $this->assertTrue($result);
    }

    /**
     * @test
     */
    public function is_type_error_thrown_to_get_weather_description_by_invalid_data_type()
    {
        $this->expectException(TypeError::class);
        CommonHelper::getWeaterDescription("Hello World");
    }
}