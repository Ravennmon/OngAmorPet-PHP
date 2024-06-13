<?php

namespace App\Controller;

use App\Core\View;
use App\Controller\Controller;

class DashboardController extends Controller
{
    public function notFound()
    {
        View::render('404', ['title' => 'Página não encontrada']);
    }
}