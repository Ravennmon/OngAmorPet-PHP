<?php

use App\Core\Router;

$routes = require __DIR__ . '/../routes/web.php';

$router = new Router($routes);

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

$router->dispatch($uri, $method);
