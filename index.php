<?php

use App\Route;
use App\Db;
use App\User;

require 'vendor/autoload.php';

$config = require 'config.php';

Db::connect($config['db']);

$requestType = $_REQUEST['_method'] ?? $_SERVER['REQUEST_METHOD'];
$requestType = strtolower($requestType);
$path        = trim($_SERVER['REQUEST_URI'], '/');

Route::call($requestType, $path);