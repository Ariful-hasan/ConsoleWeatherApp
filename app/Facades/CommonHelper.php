<?php


namespace App\Facades;

use App\Facades\Facade;
use App\Helpers\Common;


class CommonHelper extends Facade
{
    /**
     * Get the registered name of the helper facade.
     *
     * @return string
     */
   protected static function getFacadeAccessor()
   {
       return new Common();
   }
}