<?php

namespace App\Http\Controllers;

use App\Note;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    public function create()
    {
        return view('notes.create');
    }

    public function store(Request $request)
    {
        $audio = $request->file('audio');
        $fileName = '';
        if ($audio) {
            $destinationPath = 'uploads/audios';
            $extension = $audio->getClientOriginalExtension();
            $fileName = rand(11111, 99999).'.'.$extension;
            $uploadSuccess = $audio->move($destinationPath, $fileName);
        }
        
        $note = new Note;
        $note->title = $request->title;
        $note->radio_id = $request->radio_id;
        $note->audio = $fileName;
        $note->save();

        return redirect('/notes/edit/'.$note->id);
	}

    /**
     * Mostrar todas las notas con audio.
     */
    public function all()
    {
        $notes = Note::orderBy('created_at', 'desc')->get();

        return view('notes.all', ['notes' => $notes]);
    }

    public function edit($id)
    {
        $note = Note::find($id);
        return view('notes.edit', ['note' => $note]);
    }

    public function update(Request $request, $id)
    {
        $audio = $request->file('audio');
        $fileName = '';
        if ($audio) {
            $destinationPath = 'uploads/audios';
            $extension = $audio->getClientOriginalExtension();
            $fileName = rand(11111, 99999).'.'.$extension;
            $uploadSuccess = $audio->move($destinationPath, $fileName);
        }
        
        $note = Note::find($id);
        $note->title = $request->title;
        $note->radio_id = $request->radio_id;
        $note->audio = $fileName;
        $note->save();

        return redirect('/notes/edit/' . $note->id);
    }
}
