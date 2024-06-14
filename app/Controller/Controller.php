<?php

namespace App\Controller;

use App\Core\Request;
use App\Core\View;

class Controller
{
    protected $request;

    public function __construct()
    {
        $this->request = Request::getInstance();
    }

    public function notFound()
    {
        View::render('404', ['title' => 'Página não encontrada']);
    }
}