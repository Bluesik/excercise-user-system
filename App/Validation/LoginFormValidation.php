<?php

namespace App\Validation;

use Exception;

class LoginFormValidation extends FormValidation
{
    protected static $requiredFields = ['username', 'password'];
    protected static $methods        = [
        'checkRequiredFields'
    ];
}