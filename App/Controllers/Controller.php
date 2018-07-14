<?php

namespace App\Controllers;

use App\Route;
use App\Middleware\Middleware;

class Controller{
    protected function middleware (array $middlewares = []) : void
    {
        foreach ($middlewares as $middleware) {
            $class = Middleware::getByShortName($middleware);

            if($class)
                new $class();
        }
    }
}