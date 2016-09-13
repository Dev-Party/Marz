<?php
if (!app()->environment('local') && !app()->environment('testing')) {
    $connections = [
        'pgsql' => [
            'driver' => 'pgsql',
            'host' => parse_url(env("DATABASE_URL"))["host"],
            'port' => env('DB_PORT', '5432'),
            'database' => substr(parse_url(env("DATABASE_URL"))["path"], 1),
            'username' => parse_url(env("DATABASE_URL"))["user"],
            'password' => parse_url(env("DATABASE_URL"))["pass"],
            'charset' => 'utf8',
            'prefix' => '',
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],
    ];
} else {
    $connections = [
        'mysql' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
            'strict' => true,
            'engine' => null,
        ],
    ];
}

return [

    'fetch' => PDO::FETCH_OBJ,

    'default' => env('DB_CONNECTION', 'pgsql'),

    'connections' => $connections,

    'migrations' => 'migrations',
];