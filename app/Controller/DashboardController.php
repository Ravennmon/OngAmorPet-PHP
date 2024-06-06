<?php

namespace App\Controller;

use App\Core\View;
use App\Controller\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        View::render('dashboard', ['title' => 'Home Page', 'content' => 'Welcome to the Home Page']);
    }
}