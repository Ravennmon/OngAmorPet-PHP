<?php

namespace App\Validations;

use App\Core\Request;

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

    public static function update(Request $request)
    {
        $errors = self::validate($request);

        if(!empty($errors)){
            return $errors;
        }

        setSuccessMessage('Animal atualizado com sucesso!');

        return true;
    }
}