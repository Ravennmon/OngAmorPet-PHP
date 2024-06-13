<?php

use App\Core\Router;
use App\Dao\UserDao;

require_once __DIR__ . '/helpers.php';

session_start();

if (isset($_COOKIE['remember_me']) && !isset($_SESSION['user'])) {
    $user = (new UserDao())->where(['remember_token' => $_COOKIE['remember_me']])->first();

    if ($_COOKIE['remember_me'] == $user['remember_token']) {
        $_SESSION['user'] = $user;
    }
}



$routes = require __DIR__ . '/../routes/web.php';

$router = new Router($routes);

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

$router->dispatch($uri, $method);
