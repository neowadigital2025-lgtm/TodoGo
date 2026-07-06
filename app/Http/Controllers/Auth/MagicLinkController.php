<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

use App\Models\User;
use App\Models\LoginToken;
use App\Mail\MagicLinkMail;

class MagicLinkController extends Controller
{
    /**
     * Tampilkan halaman login
     */
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        return view('auth.login');
    }

    /**
     * Kirim Magic Link
     */
    public function sendMagicLink(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        // Cari user berdasarkan email
        $user = User::where('email', $request->email)->first();

        // Jika belum punya akun
        if (!$user) {
            return redirect()
                ->route('register')
                ->with('error', 'Email belum terdaftar. Silakan buat akun terlebih dahulu.');
        }

        // Hapus token lama supaya hanya ada satu token aktif
        LoginToken::where('user_id', $user->id)->delete();

        // Generate token baru
        $token = Str::random(64);

        LoginToken::create([
            'user_id'     => $user->id,
            'token'       => $token,
            'ip_address'  => $request->ip(),
            'user_agent'  => $request->userAgent(),
            'expires_at'  => now()->addMinutes(15),
        ]);

        // Kirim email
        Mail::to($user->email)->send(
            new MagicLinkMail($user, $token)
        );

        return back()->with(
            'success',
            'Magic Link berhasil dikirim. Silakan buka Gmail lalu klik tombol Login.'
        );
    }

    /**
     * Verifikasi Magic Link
     */
    public function verify(string $token)
    {
        $loginToken = LoginToken::where('token', $token)->first();

        if (!$loginToken) {
            return redirect()
                ->route('login')
                ->withErrors([
                    'email' => 'Token tidak ditemukan.'
                ]);
        }

        // Sudah pernah dipakai
        if ($loginToken->used_at) {
            return redirect()
                ->route('login')
                ->withErrors([
                    'email' => 'Magic Link sudah digunakan.'
                ]);
        }

        // Kadaluarsa
        if ($loginToken->expires_at->isPast()) {
            return redirect()
                ->route('login')
                ->withErrors([
                    'email' => 'Magic Link sudah kadaluarsa.'
                ]);
        }

        // Tandai token sudah dipakai
        $loginToken->update([
            'used_at' => now(),
        ]);

        // Login
        Auth::login($loginToken->user);

        // Hapus token setelah berhasil login
        $loginToken->delete();

        return redirect()->route('dashboard');
    }
}