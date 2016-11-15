<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Radio;

class RadiosController extends Controller
{

    /**
     * Restorna todas las radios.
     * 
     * @return object
     */
    public function all(Request $request)
    {
        $active = $request->input('active');
        if (empty($active)) $active = 1;

        $order = $request->input('order');
        if (empty($order)) $order = 'asc';

        $streaming = $request->input('streaming');
        if (empty($streaming)) $streaming = '';

        $per_page = $request->input('per_page');
        if (empty($per_page)) $per_page = 20;

        $radios = Radio::query()
                ->ofActive($active)
                ->ofStreaming($streaming)
                ->state()
                ->city()
                ->modulation()
                ->ofSelect()
                ->orderBy('name', $order)
                ->paginate($per_page);

        return response()->json($radios);
    }

    /**
     * Crear una radio nueva.
     * 
     * @param array $request Datos de la radio.
     * 
     * @return object
     */
    public function create(Request $request)
    {
        $radio = Radio::create($request->all());
        return response()->json(['created' => true], 201);
    }

    /**
     * Retornar los datos de la radio que se busca.
     * 
     * @param string $q Nombre de la radio.
     * 
     * @return object
     */
    public function search(Request $request)
    {
        $q = $request->input('q');
        $count = $request->input('count');
        $q = ucwords(strtolower($q));
        
        $radio = Radio::where('radios.name', 'like', '%' . $q . '%')
                ->state()
                ->city()
                ->modulation()
                ->ofSelect()
                ->take($count)
                ->get();

        return response()->json($radio);
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
    public function update(Request $request, $id)
    {
        $radio = Radio::find($id);
        $radio->state_id      = $request->state_id;
        $radio->city_id       = $request->city_id;
        $radio->modulation_id = $request->modulation_id;
        $radio->name          = $request->name;
        $radio->frequency     = $request->frequency;
        $radio->email         = $request->email;
        $radio->phone         = $request->phone;
        $radio->address       = $request->address;
        $radio->website       = $request->website;
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
