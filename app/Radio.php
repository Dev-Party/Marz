<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Radio extends Model
{
    /** @var string $table Nombre de la tabla. */
    protected $table = 'radios';

    /** @var array $fillable Los atributos que son asignables. */
    protected $fillable = [
    	'modulation_id',
        'name',
        'frequency',
        'streaming',
        'created_at',
        'updated_at'
    ];
}
