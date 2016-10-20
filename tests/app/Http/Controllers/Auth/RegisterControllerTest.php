<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

// class RegisterControllerTest extends TestCase
// {
//     use DatabaseTransactions;

//     /**
//      * Metodo para verificar el formulario de registro.
//      * 
//      * @return void
//      */
//     public function testRegisterUser()
//     {
//         $this->visit('/register')
//               ->type('Felix Barros', 'name')
//               ->type('felix@barros.com', 'email')
//               ->type('password', 'password')
//               ->type('password', 'password_confirmation')
//               ->press('Register')
//               ->seePageIs('/dashboard');
//     }
// }