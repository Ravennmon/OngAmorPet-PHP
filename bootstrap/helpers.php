<?php

use App\Dao\OngDao;
use App\Dao\TutorDao;

function fullAddress($arr){
    return $arr['address'] . ', ' . $arr['number'] . ' - ' . $arr['neighborhood'] . ', ' . $arr['city'] . ' - ' . $arr['state'];
}

function getSize($size){
    $sizes = [
        'P' => 'Pequeno',
        'M' => 'Médio',
        'G' => 'Grande'
    ];

    return $sizes[$size];
}

function getSex($sex){
    $sexes = [
        'M' => 'Macho',
        'F' => 'Fêmea'
    ];

    return $sexes[$sex];
}

function getSpecie($specie){
    $species = [
        'C' => 'Cachorro',
        'G' => 'Gato',
        'O' => 'Outros'
    ];

    return $species[$specie];
}

function getOng($ongId){
    $ong = (new OngDao())->find($ongId);
    return $ong['name'];

}

function getTutor($tutorId){
    if(!$tutorId) return '-';

    $tutor = (new TutorDao())->find($tutorId);
    return $tutor['name'];
}

function isAdopted($tutorialId){
    return $tutorialId ? 'Sim' : 'Não';
}

function normalizeFullName($name){
    $name = explode(' ', strtolower($name));
    $name = array_map('ucfirst', $name);
    return implode(' ', $name);
}

function setSuccessMessage($message){
    $_SESSION['success_message'] = $message;
}

function showSuccessMessage(){
    echo $_SESSION['success_message'];
    unset($_SESSION['success_message']);
}