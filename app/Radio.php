<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Radio extends Model
{
    /** @var string $table Nombre de la tabla. */
    protected $table = 'radios';

    /** @var array $fillable Los atributos que son asignables. */
    protected $fillable = [
        'state_id',
        'city_id',
        'modulation_id',
        'name',
        'frequency',
        'streaming',
        'created_at',
        'updated_at'
    ];

    /** @var array $guarded Campos protegidos. */
    protected $guarded = ['active'];

    /**
     * Obtener la modulación asociado a la radio.
     */
    public function modulation()
    {
        return $this->hasOne('App\Modulation');
    }
}
