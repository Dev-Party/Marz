<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class IndexControllerTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Haceder al home y revisra su contenido.
     * 
     * @return void
     */
    public function testGetHome()
    {
        $this->visit('/')
             ->see('Marz v1.1.0');
    }

    /**
     * Haceder al /new y revisra su contenido.
     * 
     * @return void
     */
    public function testGetNew()
    {
        $this->visit('/new')
             ->see('Agregar una nueva radio. Gratis!')
             ->type('Radio Felix', 'name')
             ->type(98.1, 'frequency')
             ->select(1, 'modulation_id')
             ->type('http://felixbarros.com:8080', 'streaming')
             ->type(1, 'state_id')
             ->type(4, 'city_id')
             ->press('Create')
             ->seePageIs('/');
             
    }
}