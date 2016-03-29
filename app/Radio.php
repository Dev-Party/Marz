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
        'modulation_id',
        'frequency',
        'streaming',
        'active',
        'created_at',
        'updated_at'
    ];

    /**
     * Obtener la modulación asociado a la radio.
     */
    public function modulation()
    {
        return $this->hasOne('App\Modulation');
    }
}
