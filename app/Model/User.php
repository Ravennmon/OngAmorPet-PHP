<?php

namespace App\Model;

class User
{
    public function __construct(
        private string $name,
        private string $email,
        private string $password,
        private ?int $id = null,
        private $created_at = null,
        private $updated_at = null
    ) {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->created_at = date('Y-m-d H:i:s');
        $this->updated_at = date('Y-m-d H:i:s');
    }

    public function __get($attribute)
    {
        return $this->$attribute;
    }

    public function __set($attribute, $value)
    {
        $this->$attribute = $value;
    }
}