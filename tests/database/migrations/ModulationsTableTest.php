<?php

class ModulationsTableTest extends TestCase
{
    /** @var string $table Nombre de la tabla. */
    protected $table = 'modulations';

    /** @var array $columns Nombres de los campos de una tabla. */
    protected $columns = [
        'id',
        'name'
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