<?php

namespace App\Controller;

use App\Core\View;
use App\Model\User;

class LoginController
{
    public function index()
    {
        View::render('login', ['title' => 'Home Page', 'content' => 'Welcome to the Home Page']);
    }

}