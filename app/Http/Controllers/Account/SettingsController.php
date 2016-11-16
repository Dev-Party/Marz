<?php

namespace App\Http\Controllers\Account;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
    public function index()
    {
    	$user = User::findOrFail(Auth::user()->id);
    	return view('account.settings.index', ['user' => $user]);
    }

    /**
     * Actualizar los datos del usuario.
     */
    public function profile(Request $request, $id)
    {

        $user = User::findOrFail($id);
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->save();
        
        return redirect('/account/settings')
            ->with('message', trans('messages.updatedData'));
    }
}
