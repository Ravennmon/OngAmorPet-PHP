<?php

namespace App\Controller;

use App\Core\View;
use App\Model\User;

class UserController {
    public function index() {
        $userModel = new User();
        $userModel->getAllUsers();

        View::render('home', ['title' => 'Home Page', 'content' => 'Welcome to the Home Page']);
    }

    public function show($id) {
        $userModel = new User();
        return $userModel->getUserById($id);
    }
}