<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddingColumnEmailInTableRadios extends Migration
{
    /** @var string $table Nombre de la tabla. */
    protected $table = 'radios';

    /** @var string $column Nombre del campo a crear. */
    protected $column = 'email';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->table)) {
            Schema::table($this->table, function (Blueprint $table) {
                $table->string($this->column)->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable($this->table) && Schema::hasColumn($this->column)) {
            Schema::table($this->table, function ($table) {
                $table->dropColumn($this->column);
            });
        }
    }
}
