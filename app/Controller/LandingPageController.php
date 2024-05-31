<?php

namespace App\Controller;

use App\Core\View;
use App\Model\User;

class LandingPageController
{
    public function index()
    {
        $userModel = new User();
        $users = $userModel->get();

        View::render('home', ['title' => 'Home Page', 'content' => 'Welcome to the Home Page']);
    }

    public function about()
    {
        View::render('about', ['title' => 'Home Page', 'content' => 'Welcome to the Home Page']);
    }

    public function faq()
    {
        View::render('faq', ['title' => 'Home Page', 'content' => 'Welcome to the Home Page']);
    }
}