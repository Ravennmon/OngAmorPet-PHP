<?php

use App\Controller\AnimalController;
use App\Controller\DashboardController;
use App\Controller\LandingPageController;
use App\Controller\LoginController;
use App\Controller\OngController;
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
Route::get('/logout', [LoginController::class, 'destroy']);

Route::get('/register', [UserController::class, 'index']);

Route::post('/users', [UserController::class, 'store']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);

Route::get('/admin/tutors', [TutorController::class, 'index']);
Route::post('/admin/tutors', [TutorController::class, 'store']);
Route::get('/admin/tutors/create', [TutorController::class, 'create']);
Route::get('/admin/tutors/edit/{id}', [TutorController::class, 'edit']);
Route::get('/admin/tutors/{id}', [TutorController::class, 'show']);
Route::put('/admin/tutors/{id}', [TutorController::class, 'update']);
Route::delete('/admin/tutors/{id}', [TutorController::class, 'destroy']);

Route::get('/admin/ongs', [OngController::class, 'index']);
Route::post('/admin/ongs', [OngController::class, 'store']);
Route::get('/admin/ongs/create', [OngController::class, 'create']);
Route::get('/admin/ongs/edit/{id}', [OngController::class, 'edit']);
Route::get('/admin/ongs/{id}', [OngController::class, 'show']);
Route::put('/admin/ongs/{id}', [OngController::class, 'update']);
Route::delete('/admin/ongs/{id}', [OngController::class, 'destroy']);

Route::get('/admin/animals', [AnimalController::class, 'index']);
Route::post('/admin/animals', [AnimalController::class, 'store']);
Route::get('/admin/animals/create', [AnimalController::class, 'create']);
Route::get('/admin/animals/edit/{id}', [AnimalController::class, 'edit']);
Route::get('/admin/animals/{id}', [AnimalController::class, 'show']);
Route::put('/admin/animals/{id}', [AnimalController::class, 'update']);
Route::delete('/admin/animals/{id}', [AnimalController::class, 'destroy']);

Route::get('/register_success', [RegisterController::class, 'index']);



Route::get('/dashboard', [DashboardController::class, 'index']);

return Route::getRoutes();