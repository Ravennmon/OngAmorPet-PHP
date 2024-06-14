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

        try {
            login($this->request);
            return Response::success(true);

        } catch (\Exception $e) {
            return Response::error(['error' => $e->getMessage()]);
        }

    }

    public function destroy()
    {
        try {
            logout();
        } catch (\Exception $e){
            return Response::error(['error' => $e->getMessage()]);
        }
    }
}