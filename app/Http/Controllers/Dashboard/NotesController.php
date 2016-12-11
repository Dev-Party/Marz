<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Note;

class NotesController extends Controller
{
    
    public function all()
    {
    	$notes = Note::all();
        return view('dashboard.notes.all', ['notes' => $notes]);
    }

}