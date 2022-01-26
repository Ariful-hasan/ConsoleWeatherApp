<?php

ini_set('display_errors', 0);
error_reporting(E_ERROR);

require './app/bootstrap.php';

use App\Controllers\WeatherController;

$mainObj = new WeatherController();
$mainObj->showCurrentWeather();