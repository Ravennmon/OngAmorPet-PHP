<?php

namespace App\Dao;

use App\Model\Tutor;

class TutorDao extends BaseDao
{
    protected $table = 'tutors';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'zipcode',
        'address',
        'city',
        'state',
        'number',
        'complement',
        'created_at',
        'updated_at'
    ];

    public function store(Tutor $tutor)
    {
        $this->create([
            'name' => $tutor->getName(),
            'email' => $tutor->getEmail(),
            'phone' => $tutor->getPhone(),
            'zipcode' => $tutor->getZipcode(),
            'address' => $tutor->getAddress(),
            'city' => $tutor->getCity(),
            'state' => $tutor->getState(),
            'number' => $tutor->getNumber(),
            'complement' => $tutor->getComplement(),
            'created_at' => $tutor->getCreatedAt(),
            'updated_at' => $tutor->getUpdatedAt()
        ]);
    }
}