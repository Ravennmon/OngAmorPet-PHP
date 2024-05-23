<?php

namespace App\Controller;

use App\Model\User;

class UserController {
    public function index() {
        $userModel = new User();
        return $userModel->getAllUsers();
    }

    public function show($id) {
        $userModel = new User();
        return $userModel->getUserById($id);
    }
}