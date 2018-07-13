<?php

use App\Route;

Route::get(''               , 'PagesController@home');
Route::get('login'          , 'AuthController@loginForm');
Route::get('register'       , 'AuthController@registerForm');
Route::get('logout'         , 'AuthController@logout');
Route::get('forgot'         , 'UsersController@forgotForm');
Route::get('change-password', 'UsersController@changePasswordForm');
Route::get('profile'        , 'UsersController@profile');

Route::post('login'          , 'AuthController@login');
Route::post('register'       , 'AuthController@register');
Route::post('forgot'         , 'UsersController@forgot');
Route::post('change-password', 'UsersController@changePassword');