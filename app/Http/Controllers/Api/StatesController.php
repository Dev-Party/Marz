<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\State;

class StatesController extends Controller
{
    /**
     * Restorna todas las provincias.
     * 
     * @return object
     */
    public function all()
    {
        $states = State::all();

        return response()->json($states);
    }

    /**
     * Restorna todas las ciudades de una provincia.
     * 
     * @return object
     */
    public function cities($id)
    {
        $cities = State::find($id)->cities;

        return response()->json($cities);
    }
}