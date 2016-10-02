<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class IndexControllerTest extends TestCase
{
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
             ->see('Agregar una nueva radio. Gratis!');
    }
}