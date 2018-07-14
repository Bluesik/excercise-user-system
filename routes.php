<?php

use App\Route;

Route::get(''               , 'PagesController@home');
Route::get('login'          , 'AuthController@loginForm', [ 'middleware' => 'guest']);
Route::get('register'       , 'AuthController@registerForm', [ 'middleware' => 'guest']);
Route::get('logout'         , 'AuthController@logout');
Route::get('forgot'         , 'UsersController@forgotForm');
Route::get('change-password', 'UsersController@changePasswordForm', [ 'middleware' => 'auth']);
Route::get('profile'        , 'UsersController@profile', [ 'middleware' => 'auth']);

Route::post('login'          , 'AuthController@login', [ 'middleware' => 'guest']);
Route::post('register'       , 'AuthController@register', [ 'middleware' => 'guest']);
Route::post('forgot'         , 'UsersController@forgot', [ 'middleware' => 'guest']);
Route::post('change-password', 'UsersController@changePassword', [ 'middleware' => 'auth']);