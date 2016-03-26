<?php

use Laravel\Lumen\Testing\DatabaseTransactions;

class ModulationTableSeederTest extends TestCase
{
	use DatabaseTransactions;

    /** @var string $table Nombre de la tabla. */
    protected $table = 'modulations';

	/** @var array $values Valores para comparar la tabla. */
	protected $values = ['AM', 'FM', 'AM/FM'];

	/**
	 * Ver si existe información en la base de datos.
	 * 
	 * @return void
	 */
	public function testSeeInDataBase()
	{
		for ($i = 0; count($this->values) > $i; $i++) {
			$this->seeInDatabase($this->table, ['name' => $this->values[$i]]);
		}
	}
}