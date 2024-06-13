<?php

namespace App\Dao;

use App\Model\User;

class UserDao extends BaseDao
{
    protected $table = 'users';
    protected $fillable = ['name', 'email', 'password', 'remember_me', 'remember_token', 'created_at', 'updated_at'];

    public function store(User $user)
    {
        return $this->create([
            'name' => $user->getName(),
            'email' => $user->getEmail(),
            'password' => password_hash($user->getPassword(), PASSWORD_BCRYPT),
            'created_at' => $user->getCreatedAt(),
            'updated_at' => $user->getUpdatedAt()
        ]);
    }

    public function get()
    {
        return $this->get();
    }
}