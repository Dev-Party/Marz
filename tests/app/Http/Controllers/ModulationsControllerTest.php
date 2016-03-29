<?php

class ModulationsControllerTest extends TestCase
{

    /** @var array $values Valores para ingresar y comparar la tabla. */
    protected $values = [
        'name' => 'AM',
        'name' => 'FM',
        'name' => 'AM/FM'
    ];

    /**
     * Verificar si la ruta radio retorna un objecto.
     * 
     *  @return void
     */
    public function testGetModulationAll()
    {
        $this->get('/modulation');

        $this->seeStatusCode(200);
        
        $this->seeJson($this->values);
    }
}
