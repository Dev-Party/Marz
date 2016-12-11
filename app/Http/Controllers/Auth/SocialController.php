<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Socialite;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SocialController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('facebook')->user();
        } catch (Exception $e) {
            return Redirect::to('auth/facebook');
        }

        $authUser = $this->findOrCreateUser($user);

        auth()->login($authUser, true);

        return redirect()->intended('/');
    }

    private function findOrCreateUser($facebookUser)
    {
        if ($authUser = User::where('facebook_id', $facebookUser->id)->first()) {
            return $authUser;
        }

        return User::create([
            'name' => $facebookUser->name,
            'email' => $facebookUser->email,
            'facebook_id' => $facebookUser->id,
        ]);
    }
}