<?php

namespace App\Validations;


use App\Core\Request;
use App\Dao\OngDao;
use App\Dao\UserDao;

class OngValidation
{
    public static function validate(Request $request)
    {
        $errors = [];
        $fields = [
            'name',
            'email',
            'cnpj',
            'phone',
            'zipcode',
            'address',
            'city',
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

        (new OngDao)->where(['email' => $request->email])->first() ? $errors['email'] = 'Email já cadastrado' : null;

        if(!empty($errors)){
            return $errors;
        }

        return true;
    }
}