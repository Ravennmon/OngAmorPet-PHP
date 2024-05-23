<?php

return [
    'connections' => [
        'mysql' => [
            'driver' => 'mysql',
            'host' => 'localhost',
            'dbname' => 'testdb',
            'username' => 'root',
            'password' => 'rootpassword',
            'charset' => 'utf8'
        ],
        'pgsql' => [
            'host' => 'localhost',
            'port' => '5432',
            'dbname' => 'ecommerce',
            'username' => 'postgres',
            'password' => 'root',
        ]
    ]
];