<?php

namespace App\Http\Controllers;

use App\Radio;
use Illuminate\Http\Request;

class RadiosController extends Controller
{
    /**
     * Restorna todas las radios.
     * 
     * @return object
     */
    public function getAll()
    {
        $radios = Radio::where('active', 1)
                ->join('states', 'state_id', '=', 'states.id')
                ->join('cities', 'city_id', '=', 'cities.id')
                ->join('modulations', 'modulation_id', '=', 'modulations.id')
                ->select(
                    'radios.id',
                    'radios.state_id',
                    'radios.city_id',
                    'radios.modulation_id',
                    'states.name as state',
                    'cities.name as city',
                    'modulations.name as modulation',
                    'radios.name',
                    'radios.frequency',
                    'radios.streaming',
                    'radios.active',
                    'radios.created_at',
                    'radios.updated_at')
                ->orderBy('name', 'desc')
                ->take(20)
                ->get();

        return response()->json($radios);
    }

    /**
     * Crear una radio nueva.
     * 
     * @param array $request Datos de la radio.
     * 
     * @return object
     */
    public function postStore(Request $request)
    {
        $radio = Radio::create($request->all());
        return response()->json($radio, 201);
    }

    /**
     * Retornar una radio.
     * 
     * @param int $id Identificador unico de la radio.
     * 
     * @return object
     */
    public function getShow($id)
    {
        $radio = Radio::find($id);
        return response()->json($radio);
    }

    /**
     * Actualizar una radio.
     * 
     * @param array $request Datos de la radio.
     * @param int $id Identificador unico de la radio.
     * 
     * @return object
     */
    public function putUpdate(Request $request, $id)
    {
        $radio = Radio::find($id);
        $radio->modulation_id = $request->modulation_id;
        $radio->name          = $request->name;
        $radio->frequency     = $request->frequency;
        $radio->streaming     = $request->streaming;
        $radio->save();

        return response()->json($radio);
    }

    /**
     * Eliminar una radio.
     * 
     * @param int $id Identificador unico de la radio.
     * 
     * @return object
     */
    public function deleteDestroy($id)
    {
        $radio = Radio::find($id);
        $radio->delete();

        return response()->json(['deleted'], 204);
    }
}
