<?php

namespace App\Validation;

use Exception;

class RegisterFormValidation extends FormValidation
{
    protected static $requiredFields = ['username', 'email', 'name', 'password', 'password-confirmation'];
    protected static $methods        = [
        'checkRequiredFields', 'passwordsMustMatch'
    ];
}