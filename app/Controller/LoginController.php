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
        View::render('login', ['title' => 'Login']);
    }

    public function store()
    {
        $validation = LoginValidation::validate($this->request);

        if ($validation !== true) {
            return Response::error($validation);
        }

        $userDao = new UserDao();
        $user = $userDao->where(['email' => $this->request->email])->first();


        $_SESSION['user'] = $user;

        if ($this->request->remember) {
            $token = bin2hex(random_bytes(16));
            setcookie('remember_me', $token, time() + (86400 * 30), "/");
            
            setcookie('user_id', $user['id'], time() + (86400 * 30), "/");
            setcookie('name', $user['name'], time() + (86400 * 30), "/");
            
            $userDao->update(['remember_token' => $token], $user['id']);
            }

        return Response::success(true);
    }

    public function destroy()
    {
        session_destroy();
        setcookie('remember_me', '', time() - 3600, "/");
        setcookie('user_id', '', time() - 3600, "/");
        setcookie('name', '', time() - 3600, "/");
        header('Location: /login');
    }
}