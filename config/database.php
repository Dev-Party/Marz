<?php
if (!app()->environment('local')) {
return  [
    'default' => 'pgsql',
    'migrations' => 'migrations',
    'connections' => [
        'mysql' => [
            'driver'    => 'mysql',
            'host'      => env('DB_HOST', 'localhost'),
            'database'  => env('DB_DATABASE', ''),
            'username'  => env('DB_USERNAME', ''),
            'password'  => env('DB_PASSWORD', ''),
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
            'strict'    => false,
        ],
        'pgsql' => [
            'driver'    => 'pgsql',
            'host'      => parse_url(env("DATABASE_URL"))["host"],
            'database'  => substr(parse_url(env("DATABASE_URL"))["path"], 1),
            'username'  => parse_url(env("DATABASE_URL"))["user"],
            'password'  => parse_url(env("DATABASE_URL"))["pass"],
            'charset'   => 'utf8',
            'prefix'    => '',
            'schema'    => 'public',
        ],
    ],
];
}