<?php

namespace App\Controllers;

// use App\View;

class UsersController extends Controller{
    /**
     * Display user profile
     *
     * @return void
     */
    public function profile () : void
        return view('user.profile');
    }
}