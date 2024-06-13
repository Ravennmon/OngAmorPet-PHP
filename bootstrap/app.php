<?php

use App\Core\Router;
use App\Core\View;

require_once __DIR__ . '/session.php';
require_once __DIR__ . '/helpers.php';

$routes = require __DIR__ . '/../routes/web.php';

$router = new Router($routes);

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

$router->dispatch($uri, $method);
