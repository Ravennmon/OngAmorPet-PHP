<?php

namespace App\Validations;


use App\Core\Request;
use App\Dao\UserDao;

class LoginValidation
{
    public static function validate(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        if (empty($email) || empty($password)) {
            return false;
        }

        $userDao = new UserDao();
        $user = $userDao->where(['email' => $request->email])->first();

        if (password_verify($password, $user->password)) {
            return true;
        }



        return false;
    }
}