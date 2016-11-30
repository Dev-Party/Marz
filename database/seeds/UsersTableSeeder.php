<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
      /**
       * Ejecutar seed.
       * 
       * @return void
       */
      public function run()
      {
        DB::table('users')->insert([
            [
              'role_id' => 3,
              'name' => 'Felix Barros',
              'email' => 'admin@gmail.com',
              'password' => bcrypt('admin')
            ]
        ]);
      }
}
