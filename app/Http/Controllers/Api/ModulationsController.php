<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

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
