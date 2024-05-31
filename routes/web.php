<?php

use App\Controller\LandingPageController;
use App\Controller\LoginController;
use App\Core\Route;

Route::get('/', [LandingPageController::class, 'index']);
Route::get('/home', [LandingPageController::class, 'index']);
Route::get('/about', [LandingPageController::class, 'about']);
Route::get('/faq', [LandingPageController::class, 'faq']);
Route::get('/login', [LoginController::class, 'login']);

return Route::getRoutes();