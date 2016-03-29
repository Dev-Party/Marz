<?php

class RadiosTableTest extends TestCase
{
    /** @var string $table Nombre de la tabla. */
    protected $table = 'radios';

    /** @var array $columns Nombres de los campos de una tabla. */
    protected $columns = [
        'id',
        'modulation_id',
        'name',
        'frequency',
        'streaming',
        'active',
        'created_at',
        'updated_at'
    ];

    /**
     * Verificar la existencia de una tabla.
     * 
     * @return void
     */
    public function testCheckingForTable()
    {
        $this->assertTrue(Schema::hasTable($this->table));
    }

    /**
     * Verificar si existen las columnas en un tabla.
     *
     * @return void
     */
    public function testCheckingForColumnsInATable()
    {
        for ($i = 0; count($this->columns) > $i; $i++) {
            $this->assertTrue(Schema::hasColumn($this->table, $this->columns[$i]));
        }
    }

}