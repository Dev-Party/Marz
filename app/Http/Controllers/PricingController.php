<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class PricingController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pricing');
    }
}
