<?php

use Laravel\Lumen\Testing\DatabaseTransactions;

class RadioTableSeederTest extends TestCase
{
	use DatabaseTransactions;

    /** @var string $table Nombre de la tabla. */
    protected $table = 'radios';

	/** @var array $values Valores para ingresar y comparar la tabla. */
	protected $values = [
		'name'       => 'Nombre Radio',
		'streaming'  => 'http://192.168.1.1',
		'created_at' => '2016-03-22 11:21:21',
		'updated_at' => '2016-03-22 11:21:21'
	];

	/**
	 * Ver si existe información en la base de datos.
	 * 
	 * @return void
	 */
	public function testSeeInDataBase()
	{
		$radio = factory('App\Radio')->create($this->values);

		$this->seeInDatabase($this->table, $this->values);
	}
}