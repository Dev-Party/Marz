<?php

namespace App\Http\Controllers\Dashboard;

use App\Note;
use App\Http\Controllers\Controller;

class NotesController extends Controller
{
	public function all()
    {
    	$notes = Note::all();

    	return view('dashboard.notes.all', ['notes' => $notes]);
    }
}
