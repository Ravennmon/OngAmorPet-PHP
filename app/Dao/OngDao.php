<?php

namespace App\Dao;

use App\Model\Ong;


class OngDao extends BaseDao
{
    protected $table = 'ongs';
    protected $fillable = [        
        'name',
        'email',
        'cnpj',
        'phone',
        'zipcode',
        'state',
        'city',
        'neighborhood',
        'address',
        'number',
        'complement',
        'created_at',
        'updated_at'
    ];

    public function store(Ong $ong)
    {
        return $this->create([
            'name' => $ong->getName(),
            'email' => $ong->getEmail(),
            'cnpj' => $ong->getCnpj(),
            'phone' => $ong->getPhone(),
            'zipcode' => $ong->getZipcode(),
            'state' => $ong->getState(),
            'city' => $ong->getCity(),
            'neighborhood' => $ong->getNeighborhood(),
            'address' => $ong->getAddress(),
            'number' => $ong->getNumber(),
            'complement' => $ong->getComplement(),
            'created_at' => $ong->getCreatedAt(),
            'updated_at' => $ong->getUpdatedAt()
        ]);
    }

    public function getAnimals($ongId){
        return (new AnimalDao())->where(['ong_id' => $ongId])->get();
    }
}