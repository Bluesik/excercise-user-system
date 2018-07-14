<?php

namespace App\Controllers;

use App\Db;
use App\Auth;
use App\User;
use Exception;
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
        RegisterFormValidation::validate();

        $data = [
            'username' => $_REQUEST['username'],
            'email'    => $_REQUEST['email'],
            'name'     => $_REQUEST['name'],
            'password' => password_hash($_REQUEST['password'], PASSWORD_BCRYPT),
        ];

        if(User::create($data)){
            header('Location: /login');
        }else{
            throw new Exception('User could not be created.');
        }
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

    public function logout (){
        Auth::logout();

        view('auth.logout');
    }
}
