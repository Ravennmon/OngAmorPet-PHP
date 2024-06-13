<?php

namespace App\Controller;

use App\Core\View;
use App\Dao\UserDao;
use App\Model\User;

class LandingPageController
{
    public function index()
    {
        View::render('home', ['title' => 'Amor Pet']);
    }

    public function about()
    {
        View::render('about', ['title' => 'Sobre Nós']);
    }

    public function faq()
    {
        View::render('faq', ['title' => 'Perguntas Frequentes']);
    }
    
}