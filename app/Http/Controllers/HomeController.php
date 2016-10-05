<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Radio;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function getNew()
    {
    	return view('new');
    }

    public function postNew(Request $request)
    {
        $radio = Radio::create($request->all());
        return redirect('/');
    }
}
