<?php

namespace App\Model;

class Animal
{
    private int $id;
    private string $name;
    private string $specie;
    private string $breed;
    private string $birth_date;
    private string $size;
    private string $sex;
    private int $tutor_id;
    private int $ong_id;
    private string $created_at;
    private string $updated_at;

    public function __construct(
        string $name,
        string $specie,
        string $breed,
        string $birth_date,
        string $size,
        string $sex,
        int $ong_id,
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

    public function getSpecie(): string
    {
        return $this->specie;
    }

    public function setSpecie(string $specie): void
    {
        $this->specie = $specie;
    }

    public function getBreed(): string
    {
        return $this->breed;
    }

    public function setBreed(string $breed): void
    {
        $this->breed = $breed;
    }

    public function getBirthDate(): string
    {
        return $this->birth_date;
    }

    public function setBirthDate(string $birth_date): void
    {
        $this->birth_date = $birth_date;
    }

    public function getSize(): string
    {
        return $this->size;
    }

    public function setSize(int $size): void
    {
        $this->size = $size;
    }

    public function getSex(): string
    {
        return $this->sex;
    }

    public function setSex(string $sex): void
    {
        $this->sex = $sex;
    }


    public function getTutorId(): int
    {
        return $this->tutor_id;
    }

    public function setTutorId(int $tutor_id): void
    {
        $this->tutor_id = $tutor_id;
    }

    public function getOngId(): int
    {
        return $this->ong_id;
    }

    public function setOngId(int $ong_id): void
    {
        $this->ong_id = $ong_id;
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