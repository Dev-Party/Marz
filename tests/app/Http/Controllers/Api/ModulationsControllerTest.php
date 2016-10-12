<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ModulationsControllerTest extends TestCase
{

    /** @var array $values Valores para ingresar y comparar la tabla. */
    protected $values = [
        'name' => 'AM',
        'name' => 'FM'
    ];

    /**
     * Verificar si la ruta radio retorna un objecto.
     * 
     *  @return void
     */
    public function testGetModulationAll()
    {
        $this->get('api/modulation');

        $this->seeStatusCode(200);
        
        $this->seeJson($this->values);
    }
}
