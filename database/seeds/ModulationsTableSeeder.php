<?php

use Illuminate\Database\Seeder;

class ModulationsTableSeeder extends Seeder
{
	/**
	* Ejecutar seed.
	*
	*
	* @return void
	*/
	public function run()
	{
		DB::table('modulations')->insert([
			['name' => 'AM'],
			['name' => 'FM'],
		]);
	}
}
