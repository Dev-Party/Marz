<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DashboardControllerTest extends TestCase
{
    /**
     * Haceder a la ruta del dashboard.
     * 
     * @return void
     */
    public function testGetDashboard()
    {
        $this->visit('/dashboard')
        	 ->see('Dashboard');
    }
}