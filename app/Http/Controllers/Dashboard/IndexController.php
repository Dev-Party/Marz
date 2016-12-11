<?php

namespace App\Http\Controllers\Dashboard;

class IndexController extends Controller
{
    public function getRadios()
    {
    	return view('dashboard.radios.all');
    }
}
