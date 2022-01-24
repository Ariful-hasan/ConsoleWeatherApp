<?php

ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);

require './app/bootstrap.php';

use App\Controllers\WeatherController;

$mainObj = new WeatherController();
$mainObj->showCurrentWeather();
