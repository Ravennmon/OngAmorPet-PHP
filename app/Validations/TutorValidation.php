<?php

namespace App\Validations;


use App\Core\Request;
use App\Dao\TutorDao;
use App\Dao\UserDao;

class TutorValidation
{
    public static function validate(Request $request)
    {
        $errors = [];
        $fields = [
            'name',
            'email',
            'cpf',
            'phone',
            'zipcode',
            'address',
            'city',
            'neighborhood',
            'state',
            'number',
        ];

        foreach ($fields as $field) {
            if (strlen(trim($request->$field)) == 0) {
                $errors[$field] = 'Campo obrigatório!';
            }
        }

        if(!filter_var($request->email, FILTER_VALIDATE_EMAIL)){
            $errors['email'] = 'Email inválido';
        }

        (new TutorDao)->where(['email' => $request->email])->first() ? $errors['email'] = 'Email já cadastrado' : null;

        if(!empty($errors)){
            return $errors;
        }

        return true;
    }
}