<?php

use Laravel\Lumen\Testing\DatabaseTransactions;

class RoutesTest extends TestCase
{
	use DatabaseTransactions;

	/**
	 * Verificar si existe la ruta /radio  de tipo GET.
	 * 
	 * @return void
	 */
	public function testGetRadio()
	{
		$response = $this->call('GET', '/radio');

		$this->assertEquals(200, $response->status());
	}

	/**
	 * Verificar si existe la ruta /radio de tipo POST.
	 * 
	 * @return void 
	 */
	public function testPostRadio()
	{
		$response = $this->call('POST', '/radio');

		$this->assertEquals(201, $response->status());
	}

	/**
	 * Verificar si existe la ruta /radio/{id} de tipo de get.
	 * 
	 * @return void
	 */
	public function testGetRadioId()
	{
		$response = $this->call('GET', '/radio/' . rand());

		$this->assertEquals(200, $response->status());
	}

	/**
	 * Verificar si existe la ruta /radio/{id} de tipo PUT.
	 * 
	 * @return void
	 */
	public function testPutRadioId()
	{
		$radio = factory('App\Radio')->create();
		$response = $this->call('PUT', '/radio/'. $radio->id, []);

		$this->assertEquals(200, $response->status());
	}

	/**
	 * Verificar si existe la ruta /radio/{id} de tipo DELETE. 
	 * 
	 * @return void
	 */
	public function testDeleteRadioId()
	{
		$radio = factory('App\Radio')->create();
		$response = $this->call('DELETE', '/radio/' . $radio->id);

		$this->assertEquals(200, $response->status());
	}

	/**
	 * Verificar si existe la ruta /modulation de tipo GET.
	 * 
	 * @return void
	 */
	public function testGetModulation()
	{
		$response = $this->call('GET', '/modulation');

		$this->assertEquals(200, $response->status());
	}
}