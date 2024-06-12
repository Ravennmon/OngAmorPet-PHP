<?php

namespace App\Controller;

use App\Core\View;
use App\Model\User;
use App\Controller\Controller;
use App\Core\Response;
use App\Dao\UserDao;
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

        if ($validation !== true) {
            return Response::error($validation);
        }

        $userDao = new UserDao();
        $user = $userDao->where(['email' => $this->request->email])->first();



        $_SESSION['user'] = [
            'name' => $user['name'],
            'email' => $user['email'],
        ];

        if ($this->request->remember) {
            setcookie('user_id', $user->id, time() + (86400 * 30), "/");
            setcookie('name', $user->name, time() + (86400 * 30), "/");
        }

        return Response::success(true);
    }
}