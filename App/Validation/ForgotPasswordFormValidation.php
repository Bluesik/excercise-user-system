<?php

namespace App\Validation;

use Exception;

class ForgotPasswordFormValidation extends FormValidation
{
    protected static $requiredFields = ['username', 'email'];
    protected static $methods        = [
        'checkRequiredFields'
    ];
}