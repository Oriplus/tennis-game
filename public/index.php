<?php

require_once '../vendor/autoload.php';

use Router\Router;

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$router = new Router();
$router->run();
