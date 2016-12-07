<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Radio;

class IndexController extends Controller
{
    
    public function getRadios()
    {
        return view('dashboard.radios.all');
    }

}