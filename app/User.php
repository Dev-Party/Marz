<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class User extends Model implements
    AuthenticatableContract,
    AuthorizableContract
{
    use Authenticatable, Authorizable;

    /** @var array $fillable Los atributos que son asignables. */
    protected $fillable = [
        'name',
        'email'
    ];

    /** @var array $hidden Los atributos excluidos en el JSON. */
    protected $hidden = [
        'password'
    ];
}
