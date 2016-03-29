<?php

namespace App\Http\Controllers;

use App\Modulation;

class ModulationsController extends Controller
{
    /**
     * Restorna todas las modulaciones.
     * 
     * @return object
     */
    public function getAll()
    {
        $modulations = Modulation::all();

        return response()->json($modulations);
    }
}
