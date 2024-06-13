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
            'name' => $tutor->getName(),
            'email' => $tutor->getEmail(),
            'cpf' => $tutor->getCpf(),
            'phone' => $tutor->getPhone(),
            'zipcode' => $tutor->getZipcode(),
            'address' => $tutor->getAddress(),
            'city' => $tutor->getCity(),
            'neighborhood' => $tutor->getNeighborhood(),
            'state' => $tutor->getState(),
            'number' => $tutor->getNumber(),
            'complement' => $tutor->getComplement(),
            'created_at' => $tutor->getCreatedAt(),
            'updated_at' => $tutor->getUpdatedAt()
        ]);
    }

    public function getAnimals($tutorId)
    {
        return (new AnimalDao())->where(['tutor_id' => $tutorId])->get();
    }
}