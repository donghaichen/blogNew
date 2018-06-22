<?php
setEnv();
/**
 * Created by PhpStorm.
 * User: donghai
 * Date: 18-6-6
 * Time: 下午4:53
 */
return [
    'mysql' => [
        'driver' => 'mysql',
        'host' => getEnv('DB_HOST'),
        'port' => '3306',
        'database' => getEnv('DB_DATABASE'),
        'username' => getEnv('DB_USERNAME'),
        'password' => getEnv('DB_PASSWORD'),
        'unix_socket' => '',
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix' => 'blog_',
        'strict' => true,
        'engine' => null,
    ],
];
