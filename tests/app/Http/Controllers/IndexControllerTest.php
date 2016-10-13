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
             ->see('Sintonizando');
    }

    /**
     * Haceder al /new y revisra su contenido.
     * 
     * @return void
     */
    public function testGetNew()
    {
        $this->visit('/new')
             ->see('Agregar una nueva radio. Gratis!');
             
    }
}