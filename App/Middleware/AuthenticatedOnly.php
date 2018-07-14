<?php

namespace App\Middleware;

use App\Auth;
use Exception;

class AuthenticatedOnly
{
    public function __construct()
    {
        if(! Auth::user())
        {
            throw new Exception('Only authenticated users can access this page.');
        }
    }
}