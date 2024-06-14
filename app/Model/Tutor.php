<?php

namespace App\Model;

class Tutor
{
    private $created_at;
    private $updated_at;

    public function __construct(
        private string $name,
        private string $email,
        private string $cpf,
        private string $phone,
        private string $zipcode,
        private string $address,
        private string $city,
        private string $neighborhood,
        private string $state,
        private string $number,
        private string $complement
    ) {
        $this->name = $name;
        $this->email = $email;
        $this->cpf = $cpf;
        $this->phone = $phone;
        $this->zipcode = $zipcode;
        $this->address = $address;
        $this->city = $city;
        $this->neighborhood = $neighborhood;
        $this->state = $state;
        $this->number = $number;
        $this->complement = $complement;
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