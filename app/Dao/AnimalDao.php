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
        return $this->create([
            'name' => $animal->name,
            'specie' => $animal->specie,
            'breed' => $animal->breed,
            'birth_date' => $animal->birth_date,
            'size' => $animal->size,
            'sex' => $animal->sex,
            'tutor_id' => $animal->tutor_id,
            'ong_id' => $animal->ong_id,
            'created_at' => $animal->created_at,
            'updated_at' => $animal->updated_at
        ]);
    }
}