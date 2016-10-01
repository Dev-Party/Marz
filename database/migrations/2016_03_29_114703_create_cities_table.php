<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitiesTable extends Migration
{
    /** @var string $table Nombre de la tabla. */
    protected $table = 'cities';

    /**
     * Ejecutar la migración.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->increments('id');
            $table->integer('state_id')->unsigned();
            $table->string('name');
        });
    }

    /**
     * Revertir migración.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop($this->table);
    }
}
