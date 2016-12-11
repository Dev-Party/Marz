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
        'email',
        'phone',
        'address',
        'website',
        'streaming',
        'created_at',
        'updated_at',
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
        'radios.email',
        'radios.phone',
        'radios.address',
        'radios.website',
        'radios.streaming',
        'radios.active',
        'radios.created_at',
        'radios.updated_at',
    ];

    /** @var array $guarded Campos protegidos. */
    protected $guarded = [
        'active',
    ];

    /**
     * Scope para incluir las radios activas.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfActive($query, $active = 1)
    {
        if ($active !== 'all') {
            return $query->where('radios.active', $active);
        }
    }

    /**
     * Scope para incluir las radios que tiene streaming.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfStreaming($query, $streaming = '')
    {
        if ($streaming !== 'all') {
            return $query->where('radios.streaming', '!=', $streaming);
        }
    }

    /**
     * Scope para obtener la provincia de una radio.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeState($query)
    {
        return $query->join('states', 'radios.state_id', '=', 'states.id');
    }

    /**
     * Scope para obtener la ciudad de una radio.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCity($query)
    {
        return $query->join('cities', 'radios.city_id', '=', 'cities.id');
    }

    /**
     * Scope para obtener la modulación de una radio.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeModulation($query)
    {
        return $query->join('modulations', 'radios.modulation_id', '=', 'modulations.id');
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

    /**
     * Obtener todas las notas de un radio.
     */
    public function notes()
    {
        return $this->hasMany('App\Note');
    }

    /**
     * Obtener la modulación de la radio (AM o FM).
     */
    public function modulation()
    {
        return $this->belongsTo('App\Modulation');
    }

    /**
     * Obtener la provincia.
     */
    public function state()
    {
        return $this->belongsTo('App\State');
    }

    /**
     * Obtener la ciudad.
     */
    public function city()
    {
        return $this->belongsTo('App\City');
    }
}
