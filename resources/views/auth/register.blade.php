@extends('layouts.guest')

@section('title', 'Create Account — TodoGo')

@section('content')
@php
    $google    = session('google_user');
    $first_name = '';
    $last_name  = '';
    if ($google && isset($google['name'])) {
        $parts      = explode(' ', trim($google['name']), 2);
        $first_name = $parts[0] ?? '';
        $last_name  = $parts[1] ?? '';
    }
    $isGoogle = (bool) $google;
@endphp

{{-- ══════════════════════════════════════════════════════════════════════════
     TODOGO — REGISTER PAGE
     Menggunakan inline style untuk layout utama agar tidak bergantung pada
     Tailwind JIT scan. Tailwind utility digunakan hanya untuk detail komponen.
     ══════════════════════════════════════════════════════════════════════════ --}}

<style>
/* ── Reset & base ─────────────────────────────────────────────────────── */
#tg-register * { box-sizing: border-box; }

/* ── Root wrapper — full viewport, putih bersih ──────────────────────── */
#tg-register {
    position: fixed;
    inset: 0;
    z-index: 50;
    display: flex;
    overflow-y: auto;
    background: #ffffff;
    font-family: -apple-system, BlinkMacSystemFont, 'Inter', 'Segoe UI', sans-serif;
    color: #0f172a;
    -webkit-font-smoothing: antialiased;
}

/* ── Panel kiri (form) ────────────────────────────────────────────────── */
#tg-left {
    position: relative;
    display: flex;
    flex-direction: column;
    justify-content: center;
    width: 100%;
    min-height: 100vh;
    padding: 80px 40px 60px;
    overflow: hidden;
}

/* ── Panel kanan (ilustrasi) — hanya desktop ──────────────────────────── */
#tg-right {
    display: none;
    position: relative;
    overflow: hidden;
}

/* ── Responsive breakpoint ────────────────────────────────────────────── */
@media (min-width: 1024px) {
    #tg-left  { width: 52%; padding: 80px 64px 60px; }
    #tg-right { display: flex; flex-direction: column; align-items: center;
                justify-content: center; width: 48%;
                background: linear-gradient(145deg, #1e40af 0%, #2563eb 55%, #3730a3 100%);
                padding: 48px 40px; }
}

/* ── Logo bar (absolute) ──────────────────────────────────────────────── */
#tg-logo {
    position: absolute;
    top: 28px;
    left: 40px;
    display: flex;
    align-items: center;
    gap: 9px;
}
@media (min-width: 1024px) { #tg-logo { left: 64px; } }

.tg-logo-icon {
    width: 30px; height: 30px;
    background: #2563eb;
    border-radius: 8px;
    display: flex; align-items: center; justify-content: center;
    box-shadow: 0 2px 10px rgba(37,99,235,.35);
}
.tg-logo-icon svg { width: 15px; height: 15px; stroke: #fff; fill: none; }
.tg-logo-name { font-size: 16px; font-weight: 700; color: #0f172a; letter-spacing: -.3px; }

/* ── Form area ────────────────────────────────────────────────────────── */
#tg-form-wrap { width: 100%; max-width: 440px; margin: 0 auto; }

.tg-eyebrow {
    font-size: 10px; font-weight: 700; text-transform: uppercase;
    letter-spacing: .1em; color: #2563eb; margin-bottom: 10px;
}
.tg-h1 {
    font-size: 30px; font-weight: 800; color: #0f172a;
    line-height: 1.18; letter-spacing: -.6px; margin-bottom: 8px;
}
@media (min-width: 640px) { .tg-h1 { font-size: 34px; } }

.tg-h1-grad {
    background: linear-gradient(90deg, #2563eb, #60a5fa);
    -webkit-background-clip: text; -webkit-text-fill-color: transparent;
    background-clip: text;
}
.tg-sub {
    font-size: 14px; color: #64748b; margin-bottom: 28px;
    line-height: 1.6; font-weight: 500;
}

/* ── Google banner ────────────────────────────────────────────────────── */
.tg-gbanner {
    display: flex; align-items: center; gap: 12px;
    border: 1px solid #a7f3d0;
    background: #ecfdf5;
    border-radius: 14px;
    padding: 12px 14px;
    margin-bottom: 20px;
}
.tg-gavatar {
    width: 38px; height: 38px; border-radius: 50%;
    border: 2px solid #fff;
    object-fit: cover;
    box-shadow: 0 1px 4px rgba(0,0,0,.1);
    flex-shrink: 0;
}
.tg-gavatar-fallback {
    width: 38px; height: 38px; border-radius: 50%;
    background: #2563eb; color: #fff;
    display: flex; align-items: center; justify-content: center;
    font-size: 13px; font-weight: 700;
    border: 2px solid #fff;
    flex-shrink: 0;
}
.tg-ginfo { flex: 1; min-width: 0; }
.tg-gname  { font-size: 13px; font-weight: 700; color: #0f172a;
             white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
.tg-gemail { font-size: 12px; color: #475569; font-weight: 500;
             white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
.tg-gbadge {
    display: flex; align-items: center; gap: 4px;
    background: #d1fae5; border: 1px solid #6ee7b7;
    border-radius: 20px; padding: 3px 9px;
    font-size: 11px; font-weight: 700; color: #065f46;
    white-space: nowrap; flex-shrink: 0;
}
.tg-gbadge svg { width: 10px; height: 10px; }

/* ── Form fields ──────────────────────────────────────────────────────── */
.tg-form { display: flex; flex-direction: column; gap: 14px; }

.tg-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 12px;
}
@media (max-width: 480px) { .tg-row { grid-template-columns: 1fr; } }

.tg-field { display: flex; flex-direction: column; gap: 5px; }

.tg-label {
    font-size: 12px; font-weight: 700; color: #1e293b;
    display: block;
}

.tg-inp-wrap { position: relative; }

.tg-input {
    width: 100%;
    border: 1px solid #e2e8f0;
    border-radius: 10px;
    padding: 11px 14px;
    font-size: 13px;
    color: #0f172a;
    background: #ffffff;
    outline: none;
    font-family: inherit;
    transition: border-color .15s, box-shadow .15s;
    -webkit-appearance: none;
}
.tg-input:hover { border-color: #cbd5e1; }
.tg-input:focus {
    border-color: #2563eb;
    box-shadow: 0 0 0 3px rgba(37,99,235,.15);
}
.tg-input.tg-readonly {
    background: #f8fafc;
    color: #64748b;
    cursor: not-allowed;
}
.tg-input.tg-error {
    border-color: #f87171;
    background: #fff5f5;
}
.tg-input.tg-error:focus {
    border-color: #ef4444;
    box-shadow: 0 0 0 3px rgba(239,68,68,.15);
}

/* @ prefix untuk username */
.tg-at-wrap { position: relative; }
.tg-at-prefix {
    position: absolute; left: 13px; top: 50%;
    transform: translateY(-50%);
    font-size: 13px; font-weight: 600; color: #94a3b8;
    pointer-events: none; user-select: none;
}
.tg-at-wrap .tg-input { padding-left: 26px; }

/* Lock icon */
.tg-lock {
    position: absolute; right: 12px; top: 50%;
    transform: translateY(-50%);
    color: #94a3b8; line-height: 0;
}
.tg-lock svg { width: 14px; height: 14px; }

/* Error icon */
.tg-err-icon {
    position: absolute; right: 12px; top: 50%;
    transform: translateY(-50%);
    color: #ef4444; line-height: 0;
}
.tg-err-icon svg { width: 14px; height: 14px; fill: currentColor; }

/* Error message */
.tg-err-msg {
    display: flex; align-items: center; gap: 4px;
    font-size: 11px; font-weight: 700; color: #dc2626;
    margin-top: 2px;
}
.tg-err-msg svg { width: 11px; height: 11px; fill: currentColor; flex-shrink: 0; }

/* ── Submit button ────────────────────────────────────────────────────── */
.tg-btn {
    width: 100%;
    padding: 14px;
    border-radius: 10px;
    background: #2563eb;
    border: none;
    color: #fff;
    font-size: 14px; font-weight: 700;
    cursor: pointer;
    display: flex; align-items: center; justify-content: center; gap: 7px;
    transition: background .15s, transform .12s, box-shadow .15s;
    box-shadow: 0 3px 12px rgba(37,99,235,.3);
    letter-spacing: -.1px;
    font-family: inherit;
    margin-top: 4px;
    position: relative; overflow: hidden;
}
.tg-btn:hover {
    background: #1d4ed8;
    box-shadow: 0 5px 18px rgba(37,99,235,.38);
    transform: translateY(-1px);
}
.tg-btn:active { transform: translateY(0); box-shadow: 0 2px 8px rgba(37,99,235,.25); }
.tg-btn:disabled { opacity: .65; cursor: not-allowed; transform: none; }
.tg-btn svg { width: 15px; height: 15px; transition: transform .15s; }
.tg-btn:not(:disabled):hover .tg-btn-arrow { transform: translateX(2px); }

/* Shimmer */
.tg-btn::after {
    content: '';
    position: absolute; inset: 0;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,.1), transparent);
    transform: translateX(-100%);
    transition: transform .6s ease;
}
.tg-btn:not(:disabled):hover::after { transform: translateX(100%); }

/* ── Sign-in link ─────────────────────────────────────────────────────── */
.tg-signin {
    text-align: center; font-size: 13px; color: #64748b;
    font-weight: 500; margin-top: 6px;
}
.tg-signin a { font-weight: 700; color: #2563eb; text-decoration: none; }
.tg-signin a:hover { text-decoration: underline; text-underline-offset: 2px; }

/* ── Copyright ────────────────────────────────────────────────────────── */
#tg-copy {
    position: absolute; bottom: 20px; left: 0; right: 0;
    text-align: center; font-size: 11px; color: #94a3b8; font-weight: 500;
}

/* ══════════════════════════════════════════════════════════════════════
   RIGHT PANEL — Ilustrasi task card
   ══════════════════════════════════════════════════════════════════════ */
.tg-blob1 {
    position: absolute; top: -70px; right: -70px;
    width: 220px; height: 220px; border-radius: 50%;
    background: #fff; opacity: .04; pointer-events: none;
}
.tg-blob2 {
    position: absolute; bottom: -60px; left: -50px;
    width: 180px; height: 180px; border-radius: 50%;
    background: #818cf8; opacity: .18; pointer-events: none;
}

.tg-card-stack { position: relative; width: 100%; max-width: 290px; }
.tg-card-shadow {
    position: absolute; top: 10px; left: 10px; right: -10px; bottom: -10px;
    border-radius: 18px;
    background: rgba(255,255,255,.06);
    border: 1px solid rgba(255,255,255,.12);
    pointer-events: none;
}
.tg-card {
    position: relative;
    background: rgba(255,255,255,.13);
    border: 1px solid rgba(255,255,255,.22);
    border-radius: 18px;
    padding: 22px;
    backdrop-filter: blur(12px);
}
.tg-card-hd {
    display: flex; align-items: center; justify-content: space-between;
    margin-bottom: 18px;
}
.tg-card-title {
    font-size: 10px; font-weight: 700; text-transform: uppercase;
    letter-spacing: .09em; color: #bfdbfe;
}
.tg-pill {
    background: rgba(59,130,246,.4); border-radius: 20px;
    padding: 3px 10px; font-size: 11px; font-weight: 700; color: #fff;
}
.tg-tasks { display: flex; flex-direction: column; gap: 11px; }
.tg-task { display: flex; align-items: center; gap: 10px; }

.tg-check {
    width: 19px; height: 19px; border-radius: 50%;
    border: 2px solid rgba(255,255,255,.35);
    flex-shrink: 0;
    display: flex; align-items: center; justify-content: center;
}
.tg-check.done { background: #34d399; border-color: #34d399; }
.tg-check.done svg { width: 10px; height: 10px; stroke: #fff; fill: none; stroke-width: 3; }

.tg-task-label { flex: 1; font-size: 12px; font-weight: 500; color: rgba(255,255,255,.85); }
.tg-task-label.done { text-decoration: line-through; color: rgba(255,255,255,.45); }
.tg-tag { font-size: 10px; font-weight: 700; background: rgba(255,255,255,.1);
          border-radius: 5px; padding: 2px 7px; color: rgba(255,255,255,.65); }

.tg-progress { margin-top: 16px; padding-top: 14px; border-top: 1px solid rgba(255,255,255,.12); }
.tg-progress-row { display: flex; justify-content: space-between; margin-bottom: 7px; }
.tg-progress-label { font-size: 11px; color: #bfdbfe; font-weight: 600; }
.tg-progress-val   { font-size: 11px; color: #fff; font-weight: 700; }
.tg-bar-bg { height: 5px; border-radius: 99px; background: rgba(255,255,255,.18); overflow: hidden; }
.tg-bar-fill { height: 100%; width: 50%; border-radius: 99px;
               background: linear-gradient(90deg, #34d399, #6ee7b7); }

.tg-pills {
    display: flex; gap: 9px; margin-top: 20px;
    flex-wrap: wrap; justify-content: center;
}
.tg-info-pill {
    display: flex; align-items: center; gap: 6px;
    background: rgba(255,255,255,.08);
    border: 1px solid rgba(255,255,255,.14);
    border-radius: 20px; padding: 6px 13px;
}
.tg-dot {
    width: 7px; height: 7px; border-radius: 50%; background: #34d399;
    animation: tg-pulse 2s infinite;
}
@keyframes tg-pulse { 0%,100%{opacity:1} 50%{opacity:.35} }
.tg-pill-txt { font-size: 11px; font-weight: 600; color: rgba(255,255,255,.8); }

.tg-tagline {
    margin-top: 22px; text-align: center;
    font-size: 13px; color: #93c5fd; font-weight: 500;
    line-height: 1.55; max-width: 230px;
}

/* Spinner */
@keyframes tg-spin { to { transform: rotate(360deg); } }
.tg-spin { animation: tg-spin .8s linear infinite; }
</style>

<div id="tg-register">

    {{-- ═══════════════════ LEFT PANEL (form) ════════════════════════════ --}}
    <div id="tg-left">

        {{-- Logo --}}
        <div id="tg-logo" role="banner">
            <div class="tg-logo-icon" aria-hidden="true">
                <svg viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <span class="tg-logo-name">TodoGo</span>
        </div>

        {{-- Form wrapper (max-width centered) --}}
        <div id="tg-form-wrap">

            {{-- Heading --}}
            <p class="tg-eyebrow">Get started for free</p>
            <h1 class="tg-h1">
                Create your<br>
                <span class="tg-h1-grad">TodoGo</span> account.
            </h1>
            <p class="tg-sub">Join TodoGo and start organizing your work smarter.</p>

            {{-- Google verified banner --}}
            @if($isGoogle)
            <div class="tg-gbanner" role="status" aria-label="Google account verified">
                @if(!empty($google['avatar']))
                    <img src="{{ $google['avatar'] }}" alt="{{ $google['name'] }}" class="tg-gavatar">
                @else
                    <div class="tg-gavatar-fallback" aria-hidden="true">
                        {{ strtoupper(substr($first_name, 0, 1)) }}{{ strtoupper(substr($last_name, 0, 1)) }}
                    </div>
                @endif
                <div class="tg-ginfo">
                    <p class="tg-gname">{{ $google['name'] }}</p>
                    <p class="tg-gemail">{{ $google['email'] }}</p>
                </div>
                <div class="tg-gbadge" aria-label="Account verified via Google">
                    <svg fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                    </svg>
                    Verified
                </div>
            </div>
            @endif

            {{-- Form --}}
            <form action="{{ route('register.store') }}" method="POST" id="tgForm" novalidate class="tg-form">
                @csrf

                {{-- First & Last Name --}}
                <div class="tg-row">
                    {{-- First Name --}}
                    <div class="tg-field">
                        <label for="first_name" class="tg-label">First Name</label>
                        <div class="tg-inp-wrap">
                            <input
                                id="first_name"
                                type="text"
                                name="{{ $isGoogle ? '_fn_display' : 'first_name' }}"
                                value="{{ old('first_name', $first_name) }}"
                                placeholder="John"
                                autocomplete="given-name"
                                autofocus
                                {{ $isGoogle ? 'readonly' : 'required' }}
                                aria-label="First name"
                                aria-required="{{ $isGoogle ? 'false' : 'true' }}"
                                aria-invalid="{{ $errors->has('first_name') ? 'true' : 'false' }}"
                                class="tg-input {{ $errors->has('first_name') ? 'tg-error' : '' }} {{ $isGoogle ? 'tg-readonly' : '' }}"
                            >
                            @if($errors->has('first_name'))
                                <span class="tg-err-icon" aria-hidden="true">
                                    <svg viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                                </span>
                            @endif
                        </div>
                        @if($isGoogle)
                            <input type="hidden" name="first_name" value="{{ $first_name }}">
                        @endif
                        @error('first_name')
                            <p class="tg-err-msg" role="alert" id="first_name_err">
                                <svg viewBox="0 0 20 20" aria-hidden="true"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Last Name --}}
                    <div class="tg-field">
                        <label for="last_name" class="tg-label">Last Name</label>
                        <div class="tg-inp-wrap">
                            <input
                                id="last_name"
                                type="text"
                                name="{{ $isGoogle ? '_ln_display' : 'last_name' }}"
                                value="{{ old('last_name', $last_name) }}"
                                placeholder="Doe"
                                autocomplete="family-name"
                                {{ $isGoogle ? 'readonly' : 'required' }}
                                aria-label="Last name"
                                aria-required="{{ $isGoogle ? 'false' : 'true' }}"
                                aria-invalid="{{ $errors->has('last_name') ? 'true' : 'false' }}"
                                class="tg-input {{ $errors->has('last_name') ? 'tg-error' : '' }} {{ $isGoogle ? 'tg-readonly' : '' }}"
                            >
                            @if($errors->has('last_name'))
                                <span class="tg-err-icon" aria-hidden="true">
                                    <svg viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                                </span>
                            @endif
                        </div>
                        @if($isGoogle)
                            <input type="hidden" name="last_name" value="{{ $last_name }}">
                        @endif
                        @error('last_name')
                            <p class="tg-err-msg" role="alert" id="last_name_err">
                                <svg viewBox="0 0 20 20" aria-hidden="true"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>

                {{-- Username --}}
                <div class="tg-field">
                    <label for="username" class="tg-label">Username</label>
                    <div class="tg-at-wrap">
                        <span class="tg-at-prefix" aria-hidden="true">@</span>
                        <input
                            id="username"
                            type="text"
                            name="username"
                            value="{{ old('username') }}"
                            placeholder="yourhandle"
                            autocomplete="username"
                            required
                            aria-label="Username"
                            aria-required="true"
                            aria-invalid="{{ $errors->has('username') ? 'true' : 'false' }}"
                            aria-describedby="{{ $errors->has('username') ? 'username_err' : '' }}"
                            class="tg-input {{ $errors->has('username') ? 'tg-error' : '' }}"
                        >
                        @if($errors->has('username'))
                            <span class="tg-err-icon" aria-hidden="true">
                                <svg viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                            </span>
                        @endif
                    </div>
                    @error('username')
                        <p class="tg-err-msg" role="alert" id="username_err">
                            <svg viewBox="0 0 20 20" aria-hidden="true"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Email --}}
                <div class="tg-field">
                    <label for="email" class="tg-label">Email Address</label>
                    <div class="tg-inp-wrap">
                        <input
                            id="email"
                            type="email"
                            name="{{ $isGoogle ? '_email_display' : 'email' }}"
                            value="{{ old('email', $google['email'] ?? '') }}"
                            placeholder="john@example.com"
                            autocomplete="email"
                            {{ $isGoogle ? 'readonly' : 'required' }}
                            aria-label="Email address"
                            aria-required="{{ $isGoogle ? 'false' : 'true' }}"
                            aria-invalid="{{ $errors->has('email') ? 'true' : 'false' }}"
                            aria-describedby="{{ $errors->has('email') ? 'email_err' : '' }}"
                            style="{{ $isGoogle ? 'padding-right: 38px;' : '' }}"
                            class="tg-input {{ $errors->has('email') ? 'tg-error' : '' }} {{ $isGoogle ? 'tg-readonly' : '' }}"
                        >
                        @if($isGoogle)
                            <span class="tg-lock" aria-hidden="true">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                            </span>
                            <input type="hidden" name="email" value="{{ $google['email'] }}">
                        @elseif($errors->has('email'))
                            <span class="tg-err-icon" aria-hidden="true">
                                <svg viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                            </span>
                        @endif
                    </div>
                    @error('email')
                        <p class="tg-err-msg" role="alert" id="email_err">
                            <svg viewBox="0 0 20 20" aria-hidden="true"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Submit --}}
                <button
                    type="submit"
                    id="tgBtn"
                    class="tg-btn"
                    aria-label="Create your TodoGo account"
                >
                    <span id="tgBtnTxt">Create Account</span>
                    <svg id="tgBtnArr" class="tg-btn-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                    </svg>
                    <svg id="tgBtnSpin" style="display:none" class="tg-spin" fill="none" viewBox="0 0 24 24" aria-hidden="true">
                        <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" opacity=".25"/>
                        <path fill="currentColor" opacity=".75" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/>
                    </svg>
                </button>

                <p class="tg-signin">
                    Already have an account?
                    <a href="{{ route('login') }}">Sign in here</a>
                </p>

            </form>
        </div>{{-- /tg-form-wrap --}}

        {{-- Copyright --}}
        <p id="tg-copy">© {{ date('Y') }} TodoGo Inc. All rights reserved.</p>

    </div>{{-- /tg-left --}}


    {{-- ═══════════════════ RIGHT PANEL (desktop only) ════════════════════ --}}
    <div id="tg-right" aria-hidden="true">
        <div class="tg-blob1"></div>
        <div class="tg-blob2"></div>

        {{-- Task card stack --}}
        <div class="tg-card-stack">
            <div class="tg-card-shadow"></div>
            <div class="tg-card">
                <div class="tg-card-hd">
                    <span class="tg-card-title">My Tasks</span>
                    <span class="tg-pill">4 today</span>
                </div>
                <div class="tg-tasks">
                    <div class="tg-task">
                        <div class="tg-check done">
                            <svg viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <span class="tg-task-label done">Design new landing page</span>
                        <span class="tg-tag">Design</span>
                    </div>
                    <div class="tg-task">
                        <div class="tg-check done">
                            <svg viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <span class="tg-task-label done">Review pull request #42</span>
                        <span class="tg-tag">Dev</span>
                    </div>
                    <div class="tg-task">
                        <div class="tg-check"></div>
                        <span class="tg-task-label">Schedule team standup</span>
                        <span class="tg-tag">Meeting</span>
                    </div>
                    <div class="tg-task">
                        <div class="tg-check"></div>
                        <span class="tg-task-label">Write Q3 performance notes</span>
                        <span class="tg-tag">Writing</span>
                    </div>
                </div>
                <div class="tg-progress">
                    <div class="tg-progress-row">
                        <span class="tg-progress-label">Progress</span>
                        <span class="tg-progress-val">50%</span>
                    </div>
                    <div class="tg-bar-bg"><div class="tg-bar-fill"></div></div>
                </div>
            </div>
        </div>

        <div class="tg-pills">
            <div class="tg-info-pill">
                <span class="tg-dot"></span>
                <span class="tg-pill-txt">Tasks completed</span>
            </div>
            <div class="tg-info-pill">
                <svg width="12" height="12" fill="none" stroke="#93c5fd" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                </svg>
                <span class="tg-pill-txt">Zero setup</span>
            </div>
        </div>

        <p class="tg-tagline">The focused workspace for teams who ship.</p>
    </div>{{-- /tg-right --}}

</div>{{-- /tg-register --}}

<script>
(function () {
    var form    = document.getElementById('tgForm');
    var btn     = document.getElementById('tgBtn');
    var txt     = document.getElementById('tgBtnTxt');
    var arr     = document.getElementById('tgBtnArr');
    var spinner = document.getElementById('tgBtnSpin');

    if (!form || !btn) return;

    form.addEventListener('submit', function (e) {
        if (btn.disabled) { e.preventDefault(); return; }

        btn.disabled = true;
        txt.textContent = 'Creating account\u2026';
        arr.style.display = 'none';
        spinner.style.display = 'block';

        // Beri waktu animasi sebentar lalu submit
        setTimeout(function () { form.submit(); }, 250);
    });
})();
</script>
@endsection