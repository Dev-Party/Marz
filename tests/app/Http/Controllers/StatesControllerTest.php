<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StatesControllerTest extends TestCase
{
    use DatabaseTransactions;

    /** @var string $table Nombre de la tabla. */
    protected $table = 'states';

    /**
     * Verificar si la ruta radio retorna un objecto.
     * 
     * @return void
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

    /**
     * Verificar el metodo que retorna las ciudades de una provincia.
     * 
     * @return void
     */
    public function testGetStateAllCities()
    {
        $cities = factory('App\City', 10)->create();

        $this->get('/state/1/cities');

        $this->seeStatusCode(200);

        foreach ($cities as $city) {
            $this->seeJson([
                'id'            => $city->id,
                'name'          => $city->name
            ]);
        }
    }
}
