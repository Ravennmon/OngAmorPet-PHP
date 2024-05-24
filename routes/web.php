<?php

use App\Controller\HomeController;
use App\Core\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [HomeController::class, 'about']);

return Route::getRoutes();