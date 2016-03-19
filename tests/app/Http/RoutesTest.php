<?php

class RoutesTest extends TestCase
{
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

		$this->assertEquals(200, $response->status());
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
		$response = $this->call('PUT', '/radio/' . rand());

		$this->assertEquals(200, $response->status());
	}

	/**
	 * Verificar si existe la ruta /radio/{id} de tipo DELETE. 
	 * 
	 * @return void
	 */
	public function testDeleteRadioId()
	{
		$response = $this->call('DELETE', '/radio/' . rand());

		$this->assertEquals(200, $response->status());
	}
}