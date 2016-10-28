<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditingColumnPasswordTableUsers extends Migration
{
    /** @var string $table Nombre de la tabla. */
    protected $table = 'users';

    /** @var string $column Nombre del campo a crear. */
    protected $column = 'password';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->table)) {
            Schema::table($this->table, function (Blueprint $table) {
                $table->string($this->column)->nullable()->change();
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
                $table->string($this->column)->change();
            });
        }
    }
}
