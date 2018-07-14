<?php

namespace App\Middleware;

use App\Middleware\AuthenticatedOnly;

class Middleware
{
    public static $list = [
        'auth'  => AuthenticatedOnly::class,
        'guest' => GuestOnly::class,
    ];

    public static function getByShortName ($name) : ?string
    {
        return static::$list[$name] ?? null;        
    }
}