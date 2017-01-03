<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function getRadios()
    {
        return view('dashboard.radios.all');
    }
}
