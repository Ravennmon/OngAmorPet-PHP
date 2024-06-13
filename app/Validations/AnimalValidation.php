<?php

namespace App\Validations;

use App\Core\Request;

class AnimalValidation
{
    public static function validate(Request $request)
    {
        $errors = [];
        $fields = [
            'name',
            'specie',
            'breed',
            'birth_date',
            'size',
            'sex',
            'ong_id',
        ];

        foreach ($fields as $field) {
            if (is_null($request->$field) || strlen(trim($request->$field)) == 0) {
                $errors[$field] = 'Campo obrigatório!';
            }
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