<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    /** @var string $table Nombre de la tabla. */
    protected $table = 'invoices';

    /** @var array $fillable Los atributos que son asignables. */
    protected $fillable = ['user_id'];

    /**
     * Obtener el usuario que posee la factura.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
