<?php

session_start();

use App\Route;
use App\Db;
use App\User;
use App\Auth;

require 'vendor/autoload.php';

$config = require 'config.php';

Db::connect($config['db']);

global $app;

$app['user'] = User::isLoggedIn() ? User::find($_SESSION['user']['id']) : null;

$requestType = $_REQUEST['_method'] ?? $_SERVER['REQUEST_METHOD'];
$requestType = strtolower($requestType);
$path        = trim($_SERVER['REQUEST_URI'], '/');

Route::call($requestType, $path);