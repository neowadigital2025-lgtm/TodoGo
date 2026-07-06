<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->stateless()->redirect();
    }

    public function callback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();

        $user = User::where('email', $googleUser->getEmail())->first();

        if (!$user) {

            session([

                'google_user' => [

                    'name' => $googleUser->getName(),

                    'email' => $googleUser->getEmail(),

                    'google_id' => $googleUser->getId(),

                    'avatar' => $googleUser->getAvatar(),

                ]

            ]);

            return redirect()->route('register');
        }

        if (!$user->google_id) {

            $user->update([

                'google_id' => $googleUser->getId(),

                'avatar' => $googleUser->getAvatar(),

            ]);

        }

        Auth::login($user);

        return redirect()->route('dashboard');
    }
}