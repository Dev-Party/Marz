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
            $states = ['Chaco'];

            for ($i = 0; count($states) > $i; $i++) {
                  DB::table('states')->insert(['name' => $states[$i]]);
            }
            
      }
}
