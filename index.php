<?php

use App\Controller\UserController;

require __DIR__ . '/vendor/autoload.php';


$controller = new UserController();

print_r($controller->show(1));