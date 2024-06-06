<?php

namespace App\Model;

use App\Core\Database;

class Model
{
    protected $table;
    protected $fillable = [];

    public function getTable()
    {
        return $this->table;
    }

    public function getFillable()
    {
        return $this->fillable;
    }
}