<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Note;

class NotesController extends Controller
{
    /**
     * Restorna todas las notas.
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
}
