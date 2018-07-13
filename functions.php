<?php

/**
 * Render a view
 *
 * @param string $view
 * @param array $data
 * @param string $extends
 * @return void
 */
function view(string $view = '', array $data = [], string $extends = 'layout') : void{
    extract($data);
    extract($GLOBALS['app']);

    require "views " . DIRECTORY_SEPARATOR . "{$extends}.php";
}


/**
 * Include a view
 *
 * @param string $view
 * @param array $data
 * @param string $extends
 * @return void
 */
function view_include(string $name, array $data = []) : void{
    extract($data);
    extract($GLOBALS['app']);

    $name = str_replace('.', DIRECTORY_SEPARATOR, $name);
    
    require "views " . DIRECTORY_SEPARATOR . "{$name}.php";
}