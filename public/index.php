<?php
header( "Access-Control-Allow-Origin: *" );
header('Access-Control-Allow-Methods: GET, POST');

require_once '../vendor/autoload.php';

use Router\Router;

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$router = new Router();
$router->run();
