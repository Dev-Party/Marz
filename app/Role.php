<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Role extends Model
{
	/**
     * La tabla de base de datos utilizada por el modelo.
     *
     * @var string
     */
    protected $table = 'roles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'description'
    ];
    
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
