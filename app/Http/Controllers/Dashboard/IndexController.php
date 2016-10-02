<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    /**
     * Metodo para manejar la página principal del Dashboard.
     */
    public function getHome()
    {
        return "Dashboard";
    }

}