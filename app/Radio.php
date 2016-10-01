<?php

namespace App;

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

    /** @var array $select Selects para la constulta a la base de datos. */
    protected $select = [
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
        'radios.updated_at'
    ];

    /** @var array $guarded Campos protegidos. */
    protected $guarded = [
        'active'
    ];

    /**
     * Scope para incluir las radios activas.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfActive($query, $active = 1)
    {
        return $query->where('radios.active', $active);
    }

    /**
     * Scope para obtener la provincia de una radio.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeState($query)
    {
        return $query->join('states', 'state_id', '=', 'states.id');
    }

    /**
     * Scope para obtener la ciudad de una radio.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCity($query)
    {
        return $query->join('cities', 'city_id', '=', 'cities.id');
    }

    /**
     * Scope para obtener la modulación de una radio.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeModulation($query)
    {
        return $query->join('modulations', 'modulation_id', '=', 'modulations.id');
    }

    /**
     * Scope para formatear la salida de los datos.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfSelect($query)
    {
        return $query->select($this->select);
    }
}
