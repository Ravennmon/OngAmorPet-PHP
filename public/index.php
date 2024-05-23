<?php

use App\Controller\UserController;

require __DIR__ . '/../vendor/autoload.php';

require_once __DIR__.'/../bootstrap/app.php';

$controller = new UserController();

print_r($controller->show(1));