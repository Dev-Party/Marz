<?php

use Illuminate\Database\Seeder;

class ModulationTableSeeder extends Seeder
{
      /**
       * Ejecutar seed.
       * 
       * @return void
       */
      public function run()
      {
            DB::table('modulations')->insert([
                  ['name' => 'AM'],
                  ['name' => 'FM'],
                  ['name' => 'AM/FM']
            ]);
      }
}
