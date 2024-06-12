<?php

namespace App\Dao;

use App\Model\Animal;


class AnimalDao extends BaseDao
{

    protected $table = 'animals';
    protected $fillable = [        
        'name',
        'specie',
        'breed',
        'birth_date',
        'size',
        'sex',
        'tutor_id',
        'ong_id',
        'created_at',
        'updated_at'
    ];

    public function store(Animal $animal)
    {
        $this->create([
            'name' => $animal->getName(),
            'specie' => $animal->getSpecie(),
            'breed' => $animal->getBreed(),
            'birth_date' => $animal->getBirthDate(),
            'size' => $animal->getSize(),
            'sex' => $animal->getSex(),
            'ong_id' => $animal->getOngId(),
            'created_at' => $animal->getCreatedAt(),
            'updated_at' => $animal->getUpdatedAt()
        ]);
    }
}