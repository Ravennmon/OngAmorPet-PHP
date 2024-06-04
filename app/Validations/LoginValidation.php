<?php

namespace App\Validations;


use App\Core\Request;
use App\Model\User;

class LoginValidation
{
    public static function validate(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        if (empty($email) || empty($password)) {
            return false;
        }

        $user = new User();
        $user = $user->where(['email' => $request->email])->first();

        if (password_verify($password, $user->password)) {
            return true;
        }

        return false;
    }
}