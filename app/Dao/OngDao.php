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
            'name' => $ong->name,
            'email' => $ong->email,
            'cnpj' => $ong->cnpj,
            'phone' => $ong->phone,
            'zipcode' => $ong->zipcode,
            'state' => $ong->state,
            'city' => $ong->city,
            'neighborhood' => $ong->neighborhood,
            'address' => $ong->address,
            'number' => $ong->number,
            'complement' => $ong->complement,
            'created_at' => $ong->created_at,
            'updated_at' => $ong->updated_at
        ]);
    }

    public function getAnimals($ongId){
        return (new AnimalDao())->where(['ong_id' => $ongId])->get();
    }
}