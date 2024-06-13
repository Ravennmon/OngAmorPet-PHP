<?php

namespace App\Validations;


use App\Core\Request;
use App\Dao\OngDao;
use App\Dao\UserDao;
use App\Model\Ong;

class OngValidation
{
    protected static function validate(Request $request)
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

        (new OngDao)->where(['email' => $request->email])->first() ? $errors['email'] = 'Email já cadastrado' : null;

        if(!empty($errors)){
            return $errors;
        }

        return true;
    }

    public static function update(Request $request, $id)
    {
        $errors = self::validate($request);

        $existing = (new OngDao)->where(['email' => $request->email])->first();

        if($existing && $existing['id'] != $id){
            $errors['email'] = 'Email já cadastrado';
        }

        if(!empty($errors)){
            return $errors;
        }

        setSuccessMessage('Ong atualizada com sucesso!');

        return true;
    }
}