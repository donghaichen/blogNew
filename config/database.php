<?php
/**
 * Created by PhpStorm.
 * User: donghai
 * Date: 18-6-6
 * Time: 下午4:53
 */
return [
    'mysql' => [
        'driver' => 'mysql',
        'host' => env('DB_HOST'),
        'port' => '3306',
        'database' => env('DB_DATABASE'),
        'username' => env('DB_USERNAME'),
        'password' => env('DB_PASSWORD'),
        'unix_socket' => '',
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix' => 'blog_',
        'strict' => true,
        'engine' => null,
    ],
];
