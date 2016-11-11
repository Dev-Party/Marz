<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\BillingShipped;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class BillingController extends Controller
{
    public function getIndex()
    {
        return view('billing');
    }
    
    public function postIndex(Request $request)
    {
    	$name  = $request->input('name');
    	$email = $request->input('email');
    	$phone = $request->input('phone');

        Mail::to($email)->send(new BillingShipped());
        return redirect()->intended('/billing');
    }

}
