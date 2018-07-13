<?php

namespace App\Validation;

use Exception;

class FormValidation
{
    protected static $requiredFields = [];
    protected static $methods        = [
        'checkRequiredFields'
    ];

    /**
     * Validate given form data
     *
     * @param array $data
     * @return bool
     */
    public static function validate () : void
    {
        $form = $_REQUEST;

        foreach (static::$methods as $method) {
            static::$method($form);          
        }
    }
    
    /**
     * Check if all required fields were filled
     *
     * @param array $data
     * @return void
     */
    public static function checkRequiredFields (array $data = []) : void{
        foreach (static::$requiredFields as $field) {
            if(! array_key_exists($field, $data)){
                throw new Exception("{$field} field is required");
            }
        }
    }

    /**
     * Check if the passwords are the same
     *
     * @param array $data
     * @return bool
     */
    public static function passwordsMustMatch (array $data = null) : void{
        if($data['password'] !== $data['password-confirmation']){
            throw new Exception("Passwords do not match");
        }
    }
}