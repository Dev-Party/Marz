<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RadiosControllerTest extends TestCase
{
    use DatabaseTransactions;

    /** @var string $table Nombre de la tabla. */
    protected $table = 'radios';

    /**
     * Verificar si la ruta radio retorna un objecto.
     * 
     *  @return void
     */
    public function testGetRadioAll()
    {
        $radios = factory('App\Radio', 10)->create();

        $this->get('api/radio');
        
        $this->seeStatusCode(200);
        
        foreach ($radios as $radio) {
            $this->seeJson([
                'id'            => $radio->id,
                'state_id'      => $radio->state_id,
                'city_id'       => $radio->city_id,
                'modulation_id' => $radio->modulation_id,
                'name'          => $radio->name,
                'frequency'     => $radio->frequency,
                'email'         => $radio->email,
                'website'       => $radio->website,
                'streaming'     => $radio->streaming
            ]);
        }
    }

    /**
     * Verificar si la ruta radio retorna un objecto.
     * 
     *  @return void
     */
    public function testPostRadioCreate()
    {
        $create = [
            'state_id'      => 1,
            'city_id'       => 10,
            'modulation_id' => 1,
            'name'          => 'Mi Radio',
            'frequency'     => 98.05,
            'email'         => 'ejemplo@email.com',
            'website'       => 'http://ejemplo.com',
            'streaming'     => 'http://192.168.1.1'
        ];

        $this->post('api/radio', $create);

        $this->seeStatusCode(201);

        $this->seeJsonEquals([
            'created' => true
        ]);

        $this->seeInDatabase($this->table, $create);
    }

    /**
     * Verificar recurso radio/search.
     * 
     *  @return void
     */
    public function testGetRadioSearch()
    {
        $radio = factory('App\Radio')->create();
        
        $this->get('api/radio/search?q=' . $radio->name);

        $this->seeStatusCode(200);

        $this->seeJson([
            'id'            => $radio->id,
            'state_id'      => $radio->state_id,
            'city_id'       => $radio->city_id,
            'modulation_id' => $radio->modulation_id,
            'name'          => $radio->name,
            'frequency'     => $radio->frequency,
            'email'         => $radio->email,
            'website'       => $radio->website,
            'streaming'     => $radio->streaming
        ]);
    }

    /**
     * Verificar los datos de una radio.
     * 
     *  @return void
     */
    public function testGetRadioShow()
    {
        $radio = factory('App\Radio')->create();
        
        $this->get('api/radio/' . $radio->id);

        $this->seeStatusCode(200);

        $this->seeJson([
            'id'            => $radio->id,
            'state_id'      => $radio->state_id,
            'city_id'       => $radio->city_id,
            'modulation_id' => $radio->modulation_id,
            'name'          => $radio->name,
            'frequency'     => $radio->frequency,
            'email'         => $radio->email,
            'website'       => $radio->website,
            'streaming'     => $radio->streaming
        ]);
    }

    /**
     * Actualizar los datos de una radio.
     * 
     *  @return void
     */
    public function testPutRadioUpdate()
    {   
        $update = [
            'state_id'      => 1,
            'city_id'       => 10,
            'modulation_id' => 1,
            'name'          => 'Nombre Radio 2',
            'frequency'     => 97.5,
            'email'         => 'ejemplo2@email.com',
            'website'       => 'http://ejemplo2.com',
            'streaming'     => 'http://192.168.1.2',
            'active'        => 1
        ];

        $radio = factory('App\Radio')->create();
        
        $this->put('api/radio/' . $radio->id, $update);

        $this->seeJson($update);

        $this->seeInDatabase($this->table, $update);
    }

    /**
     * Actualizar los datos de una radio.
     * 
     *  @return void
     */
    public function testDeleteRadioDestroy()
    {
        $radio = factory('App\Radio')->create();
        
        $this->delete('api/radio/' . $radio->id);
        
        $this->seeStatusCode(204);

        $this->isEmpty();
        
        $this->notSeeInDatabase($this->table, ['id' => $radio->id]);
    }
}
