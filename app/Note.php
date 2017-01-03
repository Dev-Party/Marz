<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    /** @var string $table Nombre de la tabla. */
    protected $table = 'notes';

    /** @var array $fillable Los atributos que son asignables. */
    protected $fillable = [
        'title',
        'audio',
    ];

    /** @var array $select Selects para la constulta a la base de datos. */
    protected $select = [
        'notes.id',
        'notes.radio_id',
        'radios.name as radio_name',
        'radios.frequency as radio_frequency',
        'notes.title',
        'notes.audio',
        'notes.created_at',
        'notes.updated_at',
    ];

    /**
     * Scope para obtener la provincia de una radio.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeRadio($query)
    {
        return $query->join('radios', 'notes.radio_id', '=', 'radios.id');
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
     * Obtener la radio que posee el nota.
     */
    public function radio()
    {
        return $this->belongsTo('App\Radio');
    }
}
