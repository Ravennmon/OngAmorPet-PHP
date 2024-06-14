<?php

namespace App\Model;

class Animal
{


    public function __construct(
        private string $name,
        private string $specie,
        private string $breed,
        private string $birth_date,
        private string $size,
        private string $sex,
        private int $ong_id,
        private ?int $tutor_id = null,
        private ?int $id = null,
        private $created_at = null,
        private $updated_at = null
    ) {
        $this->name = $name;
        $this->specie = $specie;
        $this->breed = $breed;
        $this->birth_date = $birth_date;
        $this->size = $size;
        $this->sex = $sex;
        $this->ong_id = $ong_id;
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