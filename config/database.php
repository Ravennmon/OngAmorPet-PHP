<?php

return [
    'connections' => [
        'mysql' => [
            'driver' => 'mysql',
            'host' => 'localhost',
            'port' => '3306',
            'dbname' => 'ong',
            'username' => 'root',
            'password' => 'positivo',
            'charset' => 'utf8'
        ],
        'pgsql' => [
            'driver' => 'pgsql',
            'host' => 'localhost',
            'port' => '5432',
            'dbname' => 'ecommerce',
            'username' => 'postgres',
            'password' => 'root',
        ]
    ]
];