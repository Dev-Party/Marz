<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modulation extends Model
{
    /** @var string $table Nombre de la tabla. */
    protected $table = 'modulations';

    /** @var array $fillable Los atributos que son asignables. */
    protected $fillable = ['name'];

    /** @var bool $timestamps Los campos timestamp de la tabla. */
    public $timestamps = false;
}
