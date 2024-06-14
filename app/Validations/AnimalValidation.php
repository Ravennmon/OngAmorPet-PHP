<?php

namespace App\Validations;

use App\Core\Request;
use DateTime;

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

        if (!self::validateBirthDate($request->birth_date)) {
            $errors['birth_date'] = 'Data de nascimento inválida!';
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

    private static function validateBirthDate($birth_date) {
        if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $birth_date)) {
            $date_parts = explode('-', $birth_date);
            $year = (int) $date_parts[0];
            $month = (int) $date_parts[1];
            $day = (int) $date_parts[2];
            
            if (checkdate($month, $day, $year)) {
                $birth_date_obj = new DateTime($birth_date);
                $current_date_obj = new DateTime();
    
                if ($birth_date_obj < $current_date_obj) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }

        return false;
    }
}