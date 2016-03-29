<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRadiosTable extends Migration
{
    /** @var string $table Nombre de la tabla. */
    protected $table = 'radios';

    /**
     * Ejecutar la migración.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->increments('id');
            $table->integer('modulation_id')->unsigned();
            $table->string('name');
            $table->integer('frequency');
            $table->string('streaming');
            $table->float('active');
            $table->timestamps();
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
