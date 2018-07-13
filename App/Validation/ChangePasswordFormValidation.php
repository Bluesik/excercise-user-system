<?php

namespace App\Validation;

use Exception;

class ChangePasswordFormValidation extends FormValidation
{
    protected static $requiredFields = ['password', 'password-confirmation'];
    protected static $methods        = [
        'checkRequiredFields', 'passwordsMustMatch'
    ];
}