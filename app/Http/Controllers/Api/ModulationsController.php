<?php

namespace App\Http\Controllers\Api;

use App\Modulation;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ModulationsController extends Controller
{
    /**
     * Restorna todas las modulaciones.
     * 
     * 
     * @return object
     */
    public function getAll()
    {
        $modulations = Modulation::all();

        return response()->json($modulations);
    }
}
