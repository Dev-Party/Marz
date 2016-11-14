<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;

class UsersController extends Controller
{
    
    public function all()
    {
    	$users = User::all();
        return view('dashboard.users.all', ['users' => $users]);
    }

}