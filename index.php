<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'vendor/autoload.php';
// require 'model/Router.php';

$routesArray = require 'routes.php';

$router = new Router($routesArray);

try{

    $urlPath = trim(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), '/');

    require $router->Check($urlPath);

}catch(Exception $e){
    
    echo $e->getMessage();
}
