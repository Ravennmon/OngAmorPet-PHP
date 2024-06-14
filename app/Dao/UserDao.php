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
            'name' => $user->name,
            'email' => $user->email,
            'password' => password_hash($user->password, PASSWORD_BCRYPT),
            'created_at' => $user->created_at,
            'updated_at' => $user->updated_at
        ]);
    }

    public function get()
    {
        return $this->get();
    }
}