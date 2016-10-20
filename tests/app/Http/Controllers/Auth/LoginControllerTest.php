<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

// class LoginControllerTest extends TestCase
// {
//     use DatabaseTransactions;

//     /**
//      * Metodo para verificar el formulario de registro.
//      * 
//      * @return void
//      */
//     public function testLoginUser()
//     {
//     	$user = factory(App\User::class)->create();
//       $this->visit('/login')
//            ->type($user->email, 'email')
//            ->type('secret', 'password')
//            ->press('Login')
//            ->seePageIs('/dashboard');
//     }
// }