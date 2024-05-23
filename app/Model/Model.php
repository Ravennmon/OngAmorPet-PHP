<?php

namespace App\Model;

use App\Model\Database;

class Model {
    protected $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }
}