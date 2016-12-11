<?php

use Illuminate\Database\Seeder;

class StatesTableSeeder extends Seeder
{
  /**
  * Ejecutar seed.
  * 
  * @return void
  */
  public function run()
  {
    $states = [
      'Chaco',
      'Corrientes',
      'Entre Rios',
      'Formosa',
      'Misiones',
      //'Santa Fe',
      //'Santiago del Estero'
    ];

    for ($i = 0; count($states) > $i; $i++) {
      DB::table('states')->insert(['name' => $states[$i]]);
    }    
  }
}
