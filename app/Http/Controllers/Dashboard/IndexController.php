<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{

    /**
     * Metodo para manejar la página principal del Dashboard.
     */
    public function getHome()
    {
        return view('dashboard.home');
    }

}