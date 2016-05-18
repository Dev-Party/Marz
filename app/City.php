<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /** @var string $table Nombre de la tabla. */
    protected $table = 'cities';

    /** @var array $fillable Los atributos que son asignables. */
    protected $fillable = [
    	'state_id',
    	'name'
    ];

    /** @var bool $timestamps Los campos timestamp de la tabla. */
    public $timestamps = false;
}
