<?php

ini_set('display_errors', 0);
error_reporting(E_ERROR);

require './app/bootstrap.php';

use App\Controllers\WeatherController;
use App\Validators\CityValidator;


$mainObj = new WeatherController(new CityValidator());
$mainObj->showCurrentWeather();