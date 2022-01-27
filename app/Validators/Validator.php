<?php

namespace App\Validators;

Interface Validator 
{
    public function validate(string $requestData): array;
}