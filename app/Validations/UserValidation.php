<?php

namespace App\Validations;

use App\Core\Request;
use App\Dao\UserDao;

class UserValidation
{
    public static function validate(Request $request)
    {
        $errors = [];
        $fields = [
            'name',
            'email',
            'password',
        ];

        foreach ($fields as $field) {
            if (is_null($request->$field) || strlen(trim($request->$field)) == 0) {
                $errors[$field] = 'Campo obrigatório!';
            }
        }

        if(!filter_var($request->email, FILTER_VALIDATE_EMAIL)){
            $errors['email'] = 'Email inválido';
        }

        (new UserDao)->where(['email' => $request->email])->first() ? $errors['email'] = 'Email já cadastrado' : null;

        if(!empty($errors)){
            return $errors;
        }
        
        return $errors;
    }

    public static function store(Request $request)
    {
        $errors = self::validate($request);

        if(!empty($errors)){
            return $errors;
        }

        return true;
    }
}