<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function show()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        return view('auth.register', [
            'googleUser' => session('google_user')
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
        ]);

        $user = User::create([

            'name' => trim($request->first_name . ' ' . $request->last_name),

            'username' => $request->username,

            'email' => $request->email,

            'google_id' => session('google_user.google_id'),

            'avatar' => session('google_user.avatar'),

            'email_verified_at' => now(),

        ]);

        Auth::login($user);

        $request->session()->regenerate();

        session()->forget('google_user');

        return redirect()->route('dashboard');
    }
}