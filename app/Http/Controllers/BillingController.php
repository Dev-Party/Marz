<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class BillingController extends Controller
{
    public function index()
    {
        return view('billing');
    }
}
