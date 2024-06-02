<?php
namespace App\Model;

use App\Model\Model;

class User extends Model {
    protected $table = 'users';
    protected $fillable = ['name', 'email', 'password', 'remember_me', 'created_at', 'updated_at'];

    public int $id;
    public string $name;
    public string $email;
    public string $password;
    public ?bool $remember_me;
    public string $created_at;
    public string $updated_at;
}