<?php

namespace App\Controller;

use App\Core\Request;

class Controller
{
    protected $request;

    public function __construct()
    {
        $this->request = Request::getInstance();
    }
}