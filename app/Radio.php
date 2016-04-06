<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Radio extends Model
{
    /** @var string $table Nombre de la tabla. */
    protected $table = 'radios';

    /** @var array $fillable Los atributos que son asignables. */
    protected $fillable = [
        'name',
        'streaming',
        'created_at',
        'updated_at'
    ];
}