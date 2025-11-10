<?php

require '../vendor/autoload.php';

use Framework\Router;

require '../helper.php';

// Instatiate the router
$router = new Router();

// Get routes
$routes = require basePath('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Route the request
$router->route($uri);