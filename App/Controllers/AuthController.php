<?php

namespace App\Controllers;

class AuthController extends Controller
{
    public function login ()
    {
    
    }


    public function register ()
    {
        
    }

    /**
     * Display login form
     *
     * @return void
     */
    public function loginForm () : void
    {
        view('auth.login');
    }

    /**
     * Display registration form
     *
     * @return void
     */
    public function registerForm () : void
    {
        view('auth.register');
    }
}
