<?php

use App\Controller\UserController;
use App\Core\Route;

Route::get('/', [UserController::class, 'index']);

return Route::getRoutes();