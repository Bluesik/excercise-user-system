<?php

namespace App\Middleware;

use App\Auth;
use Exception;

class GuestOnly
{
    public function __construct()
    {
        if(Auth::user())
        {
            throw new Exception('You are already logged in!');
        }
    }
}