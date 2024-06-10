<?php

use App\Controller\DashboardController;
use App\Controller\LandingPageController;
use App\Controller\LoginController;
use App\Controller\UserController;
use App\Controller\RegisterController;
use App\Controller\TutorController;
use App\Core\Route;

Route::get('/', [LandingPageController::class, 'index']);
Route::get('/home', [LandingPageController::class, 'index']);
Route::get('/about', [LandingPageController::class, 'about']);
Route::get('/faq', [LandingPageController::class, 'faq']);

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'store']);

Route::get('/register', [UserController::class, 'index']);

Route::post('/users', [UserController::class, 'store']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);

Route::get('/tutors', [TutorController::class, 'index']);
Route::post('/tutors', [TutorController::class, 'store']);
Route::get('/tutors/create', [TutorController::class, 'create']);
Route::get('/tutors/edit/{id}', [TutorController::class, 'edit']);
Route::get('/tutors/{id}', [TutorController::class, 'show']);
Route::put('/tutors/{id}', [TutorController::class, 'update']);
Route::delete('/tutors/{id}', [TutorController::class, 'destroy']);

Route::get('/register_success', [RegisterController::class, 'index']);



Route::get('/dashboard', [DashboardController::class, 'index']);

return Route::getRoutes();