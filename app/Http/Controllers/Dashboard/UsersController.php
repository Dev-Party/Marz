<?php

namespace App\Http\Controllers\Dashboard;

use App\User;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
	public function all()
	{
		$users = User::all();

		return view('dashboard.users.all', ['users' => $users]);
	}
}
