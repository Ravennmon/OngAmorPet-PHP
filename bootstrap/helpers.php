<?php

function fullAddress($arr){
    return $arr['address'] . ', ' . $arr['number'] . ' - ' . $arr['neighborhood'] . ', ' . $arr['city'] . ' - ' . $arr['state'];
}


function normalizeFullName($name){
    $name = explode(' ', strtolower($name));
    $name = array_map('ucfirst', $name);
    return implode(' ', $name);
}