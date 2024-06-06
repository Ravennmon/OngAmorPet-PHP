<?php

namespace App\Dao;

use App\Model\User;

class UserDao extends BaseDao
{
    protected $table = 'users';
    protected $fillable = ['name', 'email', 'password', 'remember_me', 'created_at', 'updated_at'];

    public function store(User $user)
    {
        $this->create([
            'name' => $user->getName(),
            'email' => $user->getEmail(),
            'password' => $user->getPassword(),
            'created_at' => $user->getCreatedAt(),
            'updated_at' => $user->getUpdatedAt()
        ]);
    }
}