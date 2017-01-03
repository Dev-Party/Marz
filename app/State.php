<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    /** @var string $table Nombre de la tabla. */
    protected $table = 'states';

    /** @var array $fillable Los atributos que son asignables. */
    protected $fillable = [
        'name',
    ];

    /** @var bool $timestamps Los campos timestamp de la tabla. */
    public $timestamps = false;

    /**
     * Obtener las ciduades de una provincia.
     *
     *
     * @return object
     */
    public function cities()
    {
        return $this->hasMany('App\City');
    }
}
