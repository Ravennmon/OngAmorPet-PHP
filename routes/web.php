<?php

use App\Controller\DashboardController;
use App\Controller\LandingPageController;
use App\Controller\LoginController;
use App\Controller\UserController;
use App\Core\Route;

Route::get('/', [LandingPageController::class, 'index']);
Route::get('/home', [LandingPageController::class, 'index']);
Route::get('/about', [LandingPageController::class, 'about']);
Route::get('/faq', [LandingPageController::class, 'faq']);

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'store']);

Route::get('/users', [UserController::class, 'index']);
Route::post('/users', [UserController::class, 'store']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);

Route::get('/dashboard', [DashboardController::class, 'index']);

return Route::getRoutes();