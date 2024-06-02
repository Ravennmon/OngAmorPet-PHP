<?php

namespace App\Controller;

use App\Core\View;
use App\Model\User;
use App\Controller\Controller;
use App\Core\Request;
use App\Validations\LoginValidation;

class LoginController extends Controller
{
    public function index()
    {
        View::render('login', ['title' => 'Home Page', 'content' => 'Welcome to the Home Page']);
    }

    public function login()
    {
        print_r($this->request->all());
        return;
        $validation = LoginValidation::validate($this->request);

        $user = new User();
        $user = $user->where(['email' => $this->request->email])->first();

        if (!$validation) {
            return View::render('login', ['title' => 'Login', 'content' => $validation]);
        } 
            
        header('Location: /');
    }
}