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
        $radios = Radio::all();

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
        $radio->name = $request->name;
        $radio->streaming = $request->streaming;
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

        return response()->json(['deleted']);
    }
}
