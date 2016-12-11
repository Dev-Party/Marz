<?php

use Illuminate\Database\Seeder;

class ModulationsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('modulations')->insert([
            ['name' => 'AM'],
            ['name' => 'FM'],
        ]);
    }
}
