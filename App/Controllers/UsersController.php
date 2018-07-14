<?php

namespace App\Controllers;

use App\Auth;
use App\User;
use App\Validation\ChangePasswordFormValidation;
use App\Validation\ForgotPasswordFormValidation;

class UsersController extends Controller{
    public function __construct (array $middleware = [])
    {
        $this->middleware($middleware);
    }

    /**
     * Display user profile
     *
     * @return void
     */
    public function profile () : void
    {
        view('user.profile');
    }

    /**
     * Process forgot password form
     *
     * @return void
     */
    public function forgot () : void{
        ForgotPasswordFormValidation::validate();

        $user = User::geByEmailAndUsername($_REQUEST['email'], $_REQUEST['username']);

        if($user){
            User::forgotPassword($user['id']);

            $message = 'New password was sent to your email address';
        }else{
            die('No user found with the given details');
        }

        view('user.forgot');
    }

    /**
     * Display a forgot password form
     *
     * @return void
     */
    public function forgotForm () : void
    {
        view('user.forgot');    
    }

    /**
     * Display change password form
     *
     * @return void
     */
    public function changePasswordForm () : void
    {
        view('user.change-password');
    }

    /**
     * Change user's password
     *
     * @return void
     */
    public function changePassword () : void
    {
        ChangePasswordFormValidation::validate();
        
        User::changePassword(Auth::id(), $_REQUEST['password']);
    }
}