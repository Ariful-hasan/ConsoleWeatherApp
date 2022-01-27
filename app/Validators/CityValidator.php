<?php

namespace App\Validators;

use App\Validators\Validator;

class CityValidator implements Validator
{
    /**
     * Validate city from user input
     *
     * @param string $str
     * @return array
     */
    public function validate(string $str): array
    {
        $response = [STATUS => false, MSG => MSG_400, DATA => ""];

        $str = explode(" ", trim($str));

        if (is_array($str)){
            $str = count($str) > 1 ? $str[1] : $str[0];
            $str = trim($str);
            $response = [
                STATUS => !empty($str) ? true : false, 
                MSG => empty($str) ? MSG_400 : "",
                DATA => $str
            ];
        }

        return $response;
    }
}