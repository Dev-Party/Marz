<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Radio;

class RadioController extends Controller
{

    /**
     * Metodo para mostrar la vista con el formulario para agregar radio.
     */
    public function create()
    {
    	return view('new');
    }

    /**
     * Metodo para mostrar la vista con el formulario para editar radio.
     */
    public function edit($id)
    {
        return view('edit', ['radio_id' => $id]);
    }

}

