<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Radio;

class ExportController extends Controller
{

    public function index()
    {
    	return view('export.index');
    }

    /**
     * Metodo para exportar las radios.
     */
    public function xml()
    {
        $radios = Radio::state()
                ->city()
                ->modulation()
                ->ofSelect()
                ->orderBy('name', 'asc')
                ->get();

        return response()
                ->view('export.tapinradio', ['radios' => $radios])
                ->header('Content-Type', 'application/xml');
    }


}

