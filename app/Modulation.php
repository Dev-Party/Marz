<?php

namespace App;

class Modulation extends Model
{
    /** @var string $table Nombre de la tabla. */
    protected $table = 'modulations';

    /** @var array $fillable Los atributos que son asignables. */
    protected $fillable = [
    	'name'
    ];

    /** @var string $dateFormat El formato de almacenamiento de columnas de fecha del modelo. */
    protected $dateFormat = 'U';

    /** @var bool $timestamps Los campos timestamp de la tabla. */
    public $timestamps = false;
}
