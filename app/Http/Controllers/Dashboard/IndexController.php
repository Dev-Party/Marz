<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Radio;

class IndexController extends Controller
{
	/**
     * Crear una nueva instancia de controlador.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Metodo para manejar la página principal del Dashboard.
     */
    public function getHome()
    {
        $radios = Radio::all();
        return view('dashboard.home', ['radios' => $radios]);
    }

}