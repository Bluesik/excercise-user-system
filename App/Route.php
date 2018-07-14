<?php

namespace App;

class Route{
    /**
     * Route list
     *
     * @var array
     */
    protected static $routes = [
        'get'    => [],
        'post'   => [],
        'patch'  => [],
        'put'    => [],
        'delete' => [],
    ];


    /**
     * Which methods are we allowing to use
     *
     * @var array
     */
    protected static $allowedRequestTypes = [
        'get', 'post', 'patch', 'put', 'delete'
    ];


    /**
     * Add a route to the list
     *
     * @param string $requestType
     * @param string $path
     * @param string $action
     * @return void
     */
    protected static function addRoute (string $requestType, string $path, string $action, array $options = []) : void
    {
        static::$routes[$requestType][$path] = [
            'action'     => $action,
            'middleware' => static::normalizeMiddleware($options),
            'namespace'  => $options['namespace'] ?? '\\App\\Controllers\\',
        ];
    }
    
    /**
     * Execute an action for a given route
     *
     * @param string $requestType
     * @param string $path
     * @return void
     */
    public static function call (string $requestType, string $path) : void
    {      
        if(static::routeExists($requestType, $path)){
            $route                 = static::$routes[$requestType][$path];
            [$controller, $method] = explode('@', $route['action']);
            $controller            = $route['namespace'] . $controller;

            (new $controller($route['middleware']))->$method();            
        }else{
            die('404 - Route not found');
        }

    }

    /**
     * Check if the given route exists
     *
     * @param string $requestType
     * @param string $path
     * @return bool
     */
    public static function routeExists (string $requestType, string $path) : bool{
        return array_key_exists($path, static::$routes[$requestType]);
    }

    /**
     * Check if the given method is allowed
     *
     * @param String $method
     * @return bool
     */
    public static function isMethodAllowed (string $method) : bool
    {
        return in_array($method, static::$allowedRequestTypes);
    }

    /**
     * Normalize middleware
     *
     * @param array $options
     * @return array
     */
    protected static function normalizeMiddleware (array $options = []) : array
    {
        $middleware = $options['middleware'] ?? null;

        if($middleware){
            if(is_string($middleware)){
                return explode('.', $middleware);
            }

            return $middleware;
        }

        return [];
    }

    /**
     * Called when static method does not exist
     *
     * @param string $name
     * @param array $arguments
     * @return void
     */
    public static function __callStatic($method, $arguments) : void
    {   
        if(static::isMethodAllowed($method))
            static::addRoute($method, ...$arguments);
    }

}