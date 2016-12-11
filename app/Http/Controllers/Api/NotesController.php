<?php

namespace App\Http\Controllers\Api;

use App\Note;
use App\Http\Controllers\Controller;

class NotesController extends Controller
{
    /**
     * Restorna todas las notas.
     *
     *
     * @return object
     */
    public function all()
    {
        $notes = Note::query()
                     ->radio()
                     ->ofSelect()
                     ->orderBy('created_at', 'desc')
                     ->get();

        return response()->json($notes);
    }

    /**
     * Crear una nota nueva.
     *
     *
     * @param array $request Datos de la nota.
     *
     *
     * @return object
     */
    public function store(Request $request)
    {
        $note = Note::create($request->all());

        return response()->json(['created' => true], 201);
    }
}
