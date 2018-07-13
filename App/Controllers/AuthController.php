<?php

namespace App\Controllers;

use App\Db;
use App\Auth;
use App\User;
use App\Validation\LoginFormValidation;
use App\Validation\RegisterFormValidation;

class AuthController extends Controller
{
    /**
     * Process login form
     *
     * @return void
     */
    public function login ()
    {
        if(Auth::user())
            header('Location: /');

        LoginFormValidation::validate();

        $user = User::getByUsername($_REQUEST['username']);

        if($user && password_verify($_REQUEST['password'], $user['password']))
        {
            Auth::login($user['id']);
            header('Location: /');
        }
        else
        {
            die('incorrect username or password');
        }
    }


    /**
     * Process registration form
     *
     * @return void
     */
    public function register ()
    {
        if(Auth::user())
            header('Location: /');

        RegisterFormValidation::validate();

        $data = [
            'username' => $_REQUEST['username'],
            'email'    => $_REQUEST['email'],
            'name'     => $_REQUEST['name'],
            'password' => password_hash($_REQUEST['password'], PASSWORD_BCRYPT),
        ];

        if(User::create($data)){
            dump(User::all());
        }
    }

    /**
     * Display login form
     *
     * @return void
     */
    public function loginForm () : void
    {
        if(Auth::user())
            header('Location: /');

        view('auth.login');
    }

    /**
     * Display registration form
     *
     * @return void
     */
    public function registerForm () : void
    {
        if(Auth::user())
            header('Location: /');

        view('auth.register');
    }

    public function logout (){
        Auth::logout();

        view('auth.logout');
    }
}
