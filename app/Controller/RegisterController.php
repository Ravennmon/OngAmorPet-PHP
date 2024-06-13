<?php

namespace App\Controller;

use App\Core\View;
use App\Model\User;
use App\Controller\Controller;
use App\Core\Response;
use App\Dao\BaseDao;
use App\Dao\UserDao;

class RegisterController extends Controller
{
    public function index()
    {
        View::render('registered', ['title' => 'Registrar-se']);
    }
}