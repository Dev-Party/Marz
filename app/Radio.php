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
     * Scope para incluir las radios activas.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    /**
     * Scope para formatear la salida de los datos.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFormat($query)
    {
        return $query->join('states', 'state_id', '=', 'states.id')
                ->join('cities', 'city_id', '=', 'cities.id')
                ->join('modulations', 'modulation_id', '=', 'modulations.id')
                ->select(
                    'radios.id',
                    'radios.state_id',
                    'radios.city_id',
                    'radios.modulation_id',
                    'states.name as state',
                    'cities.name as city',
                    'modulations.name as modulation',
                    'radios.name',
                    'radios.frequency',
                    'radios.streaming',
                    'radios.active',
                    'radios.created_at',
                    'radios.updated_at');
    }
}
