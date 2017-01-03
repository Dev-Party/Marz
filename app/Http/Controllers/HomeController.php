<?php

namespace App\Http\Controllers;

use App\Note;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notes = Note::all();

        return view('home', ['notes' => $notes]);
    }
}
