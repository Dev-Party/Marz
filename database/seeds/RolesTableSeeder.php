<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('roles')->insert(
    		[
    			'name' => 'admin',
    			'display_name' => 'Administrador',
    			'description' => 'Se permite al administrador gestionar usuarios y radios.'
    		]
    	);
    }
}
