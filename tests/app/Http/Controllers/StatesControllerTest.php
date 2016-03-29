<?php

use Laravel\Lumen\Testing\DatabaseTransactions;

class StatesControllerTest extends TestCase
{
    use DatabaseTransactions;

    /** @var string $table Nombre de la tabla. */
    protected $table = 'states';

    /**
     * Verificar si la ruta radio retorna un objecto.
     * 
     *  @return void
     */
    public function testGetStateAll()
    {
        $this->get('/state');
        
        $this->seeStatusCode(200);
        
        $this->seeJson([
            'id'   => 1,
            'name' => 'Chaco'
        ]);
    }
}
