<?php

namespace App\Model;

use App\Core\Database;

class Model {
    protected $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }
}