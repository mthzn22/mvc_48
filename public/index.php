<?php
require_once("../vendor/autoload.php");

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

use App\Route;

$route = new Route; 
    // echo '<pre>';
    // print_r($route->getUrl());
    // echo '<br>';
    // print_r($route->getRoutes());
