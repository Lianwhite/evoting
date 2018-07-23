<?php

class Router
{
    private $route;

    public function __construct($routeArray)
    {
        $this->route = $routeArray;
    }

    public function Check($extension)
    {
        if(array_key_exists($extension, $this->route)){
            return $this->route[$extension];
        }

        throw new Exception ("404 Not Found. Please check your url and try again!");
    }

}