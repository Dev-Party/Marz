<?php
if (app()->environment('staging')) {
    return  [
        'default' => 'pgsql',
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
    ];
}