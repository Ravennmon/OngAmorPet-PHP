<?php

namespace App\Dao;

use App\Model\Tutor;

class TutorDao extends BaseDao
{
    protected $table = 'tutors';
    protected $fillable = [
        'name',
        'email',
        'cpf',
        'phone',
        'zipcode',
        'address',
        'city',
        'neighborhood',
        'state',
        'number',
        'complement',
        'created_at',
        'updated_at'
    ];

    public function store(Tutor $tutor)
    {
        return $this->create([
            'name' => $tutor->name,
            'email' => $tutor->email,
            'cpf' => $tutor->cpf,
            'phone' => $tutor->phone,
            'zipcode' => $tutor->zipcode,
            'address' => $tutor->address,
            'city' => $tutor->city,
            'neighborhood' => $tutor->neighborhood,
            'state' => $tutor->state,
            'number' => $tutor->number,
            'complement' => $tutor->complement,
            'created_at' => $tutor->created_at,
            'updated_at' => $tutor->updated_at
        ]);
    }

    public function getAnimals($tutorId)
    {
        return (new AnimalDao())->where(['tutor_id' => $tutorId])->get();
    }
}