<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('roles')->insert([
            ['name' => 'Suscriptor', 'slug' => 'subscriber'],
            ['name' => 'Colaborador', 'slug' => 'contributor'],
            ['name' => 'Administrador', 'slug' => 'administrator'],
        ]);
    }
}
