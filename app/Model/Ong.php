<?php

namespace App\Model;

class Ong
{
    private int $id;
    private string $name;
    private string $email;
    private string $cnpj;
    private string $phone;
    private string $zipcode;
    private string $state;
    private string $city;
    private string $address;
    private string $number;
    private array $animals;
    private string $complement;
    private string $created_at;
    private string $updated_at;

    public function __construct(
        string $name,
        string $email,
        string $cnpj,
        string $phone,
        string $zipcode,
        string $address,
        string $city,
        string $state,
        string $number,
        string $complement
    ) {
        $this->name = $name;
        $this->email = $email;
        $this->cnpj = $cnpj;
        $this->phone = $phone;
        $this->zipcode = $zipcode;
        $this->address = $address;
        $this->city = $city;
        $this->state = $state;
        $this->number = $number;
        $this->complement = $complement;
        $this->created_at = date('Y-m-d H:i:s');
        $this->updated_at = date('Y-m-d H:i:s');
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getCnpj(): string
    {
        return $this->cnpj;
    }

    public function setCnpj(string $cnpj): void
    {
        $this->cnpj = $cnpj;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }   

    public function getZipcode(): string
    {
        return $this->zipcode;
    }

    public function setZipcode(string $zipcode): void
    {
        $this->zipcode = $zipcode;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    public function getState(): string
    {
        return $this->state;
    }

    public function setState(string $state): void
    {
        $this->state = $state;
    }

    public function getNumber(): string
    {
        return $this->number;
    }

    public function setNumber(string $number): void
    {
        $this->number = $number;
    }

    public function getComplement(): string
    {
        return $this->complement;
    }

    public function setComplement(string $complement): void
    {
        $this->complement = $complement;
    }

    public function getAnimals(): array
    {
        return $this->animals;
    }

    public function setAnimals(array $animals): void
    {
        $this->animals = $animals;
    }

    public function getCreatedAt(): string
    {
        return $this->created_at;
    }   

    public function setCreatedAt(string $created_at): void
    {
        $this->created_at = $created_at;
    }

    public function getUpdatedAt(): string
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(string $updated_at): void
    {
        $this->updated_at = $updated_at;
    }
}