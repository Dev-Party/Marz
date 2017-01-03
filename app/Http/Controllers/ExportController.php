<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Response;

class ExportController extends Controller
{
    public function index()
    {
        return view('export.index');
    }

    /**
     * Metodo para exportar las radios.
     */
    public function format()
    {
        $cities = City::all();

        return response()
               ->view('export.tapinradio', ['cities' => $cities])
               ->header('Content-Type', 'application/xml')
               ->header('Content-Type', 'application/force-download');
    }
}
