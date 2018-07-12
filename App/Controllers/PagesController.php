<?php

namespace App\Controllers;

// use App\View;

class PagesController extends Controller{
    /**
     * Display homepage
     *
     * @return View
     */
    public function home (){
        view('home');
    }
}