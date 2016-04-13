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
    public function all($total = 20)
    {
        $radios = Radio::ofActive()
                ->state()
                ->city()
                ->modulation()
                ->ofSelect()
                ->orderBy('name', 'desc')
                ->take($total)
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
    public function store(Request $request)
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
    public function show($id)
    {
        $radio = Radio::find($id)
                ->ofActive()
                ->state()
                ->city()
                ->modulation()
                ->ofSelect()
                ->get();
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
    public function update(Request $request, $id)
    {
        $radio = Radio::find($id);
        $radio->state_id      = $request->state_id;
        $radio->city_id       = $request->city_id;
        $radio->modulation_id = $request->modulation_id;
        $radio->name          = $request->name;
        $radio->frequency     = $request->frequency;
        $radio->streaming     = $request->streaming;
        $radio->active        = $request->active;
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
    public function destroy($id)
    {
        $radio = Radio::find($id);
        $radio->delete();

        return response()->json(['deleted'], 204);
    }
}
