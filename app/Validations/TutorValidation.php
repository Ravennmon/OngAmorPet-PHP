<?php

namespace App\Validations;


use App\Core\Request;
use App\Dao\TutorDao;

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

        return $errors;
    }

    public static function store(Request $request)
    {
        $errors = self::validate($request);

        if(!empty($errors)){
            return $errors;
        }

        (new TutorDao)->where(['email' => $request->email])->first() ? $errors['email'] = 'Email já cadastrado' : null;

        if(!empty($errors)){
            return $errors;
        }

        return true;
    }

    public static function update(Request $request, $id)
    {
        $errors = self::validate($request);

        if(!empty($errors)){
            return $errors;
        }

        $existing = (new TutorDao)->where(['email' => $request->email])->first();

        if($existing && $existing['id'] != $id){
            $errors['email'] = 'Email já cadastrado';
        }

        if(!empty($errors)){
            return $errors;
        }

        setSuccessMessage('Tutor atualizado com sucesso!');

        return true;
    }
}