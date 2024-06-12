<?php

namespace App\Validations;


use App\Core\Request;
use App\Dao\UserDao;

class LoginValidation
{
    public static function validate(Request $request)
    {
        $errors = [];
        $fields = [
            'email',
            'password',
        ];

        foreach ($fields as $field) {
            if (strlen(trim($request->$field)) == 0) {
                $errors[$field] = 'Campo obrigatório!';
            }
        }

        if(!filter_var($request->email, FILTER_VALIDATE_EMAIL)){
            $errors['email'] = 'Email inválido';
        }

        if(!empty($errors)){
            return $errors;
        }

        $userDao = new UserDao();
        $user = $userDao->where(['email' => $request->email])->first();

        if (!$user) {
            return [
                'email' => 'Email não cadastrado',
                'password' => 'Senha incorreta'
            ];
        }

        if (password_verify($request->password, $user['password'])) {
            return true;
        }

        return false;
    }
}