<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /** @var string $table Nombre de la tabla. */
    protected $table = 'roles';

    /** @var array $fillable Los atributos que son asignables. */
    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    /** @var bool $timestamps Indicates if the model should be timestamped. */
    public $timestamps = false;
}
