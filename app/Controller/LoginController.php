<?php

namespace App\Controller;

use App\Core\View;
use App\Model\User;
use App\Controller\Controller;
use App\Validations\LoginValidation;

class LoginController extends Controller
{
    public function index()
    {
        View::render('login', ['title' => 'Home Page', 'content' => 'Welcome to the Home Page']);
    }

    public function store()
    {
        $validation = LoginValidation::validate($this->request);

        $user = new User();
        $user = $user->where(['email' => $this->request->email])->first();

        if (!$validation) {
            return View::render('login', ['title' => 'Login', 'content' => $validation]);
        }

        $_SESSION['user'] = [
            'name' => $user->name,
            'email' => $user->email,
        ];

        if ($this->request->remember) {
            setcookie('user_id', $user->id, time() + (86400 * 30), "/");
            setcookie('name', $user->name, time() + (86400 * 30), "/");
        }

        header('Location: dashboard');
    }
}