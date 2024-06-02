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
            $_SESSION['user'] = $user;

            if ($user->remember_me) {
                setcookie('user_id', $user->id, time() + (86400 * 30), "/");
                setcookie('name', $user->name, time() + (86400 * 30), "/");
            }

            return true;
        }

        return false;
    }
}