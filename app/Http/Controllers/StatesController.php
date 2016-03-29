<?php

namespace App\Http\Controllers;

use App\State;

class StatesController extends Controller
{
    /**
     * Restorna todas las provincias.
     * 
     * @return object
     */
    public function getAll()
    {
        $states = State::all();

        return response()->json($states);
    }
}