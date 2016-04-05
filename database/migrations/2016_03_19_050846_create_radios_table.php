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
            $table->integer('user_id')->unsigned();
            $table->string('name');
            $table->string('streaming');
            $table->timestamps();
        });

        Schema::table($this->table, function (Blueprint $table) {
            $table->foreign('user_id')
                  ->references('id')->on('users')
                  ->onDelete('cascade');
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
