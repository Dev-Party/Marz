<?php

use Laravel\Lumen\Testing\DatabaseTransactions;

class RadiosControllerTest extends TestCase
{
    use DatabaseTransactions;

    /** @var array $values Valores para ingresar y comparar la tabla. */
    protected $values = [
        'modulation_id' => 1,
        'name'          => 'Nombre Radio',
        'streaming'     => 'http://192.168.1.1',
        'created_at'    => '2016-03-22 11:21:21',
        'updated_at'    => '2016-03-22 11:21:21'
    ];

    /**
     * Verificar si la ruta radio retorna un objecto.
     * 
     *  @return void
     */
    public function testGetRadioAll()
    {
        factory('App\Radio')->create($this->values);

        $this->get('/radio')
             ->seeJson($this->values);
    }

    /**
     * Verificar si la ruta radio retorna un objecto.
     * 
     *  @return void
     */
    public function testPostRadioStore()
    {
        $this->post('/radio', $this->values)
             ->seeJson($this->values);
    }

    /**
     * Verificar los datos de una radio.
     * 
     *  @return void
     */
    public function testGetRadioShow()
    {
        $radio = factory('App\Radio')->create($this->values);
        $this->get('/radio/' . $radio->id)
             ->seeJson($this->values);
    }

    /**
     * Actualizar los datos de una radio.
     * 
     *  @return void
     */
    public function testPutRadioUpdate()
    {
        $update = [
            'name'       => 'Nombre Radio 2',
            'streaming'  => 'http://192.168.1.2'
        ];
        $radio = factory('App\Radio')->create($this->values);
        $this->put('/radio/' . $radio->id, $update)
             ->seeJson($update);
    }

    /**
     * Actualizar los datos de una radio.
     * 
     *  @return void
     */
    public function testDeleteRadioDestroy()
    {
        $radio = factory('App\Radio')->create();
        $this->delete('/radio/' . $radio->id)
             ->seeJson(['deleted']);
    }
}
