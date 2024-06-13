<?php

use App\Core\Router;

session_start();


if (isset($_COOKIE['remember_me']) && isset($_SESSION['remember_me_token'])) {
    if ($_COOKIE['remember_me'] == $_SESSION['remember_me_token']) {
        $_SESSION['username'] = 'user1'; // Ideally, look up the user by token from the database
        echo "Welcome back, " . htmlspecialchars($_SESSION['username']);
        exit;
    }
}

$routes = require __DIR__ . '/../routes/web.php';

$router = new Router($routes);

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];


$router->dispatch($uri, $method);

//echo 'Hello World!';