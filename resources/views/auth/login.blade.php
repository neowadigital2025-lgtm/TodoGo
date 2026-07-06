@extends('layouts.guest')

@section('title', 'Login | TodoGo')

@section('content')

<div class="bg-white text-[#0F172A] min-h-screen antialiased">

    <div class="min-h-screen flex flex-col lg:flex-row">

        {{-- LEFT: Login Panel --}}
        <div class="w-full lg:w-[45%] bg-white flex items-center justify-center px-6 py-12 sm:px-10 lg:px-16 xl:px-20 order-1">
            <div class="w-full max-w-md">

                {{-- Logo --}}
                <a href="/" class="inline-flex items-center gap-2.5 mb-10 group">
                    <img src="{{ asset('images/todogo-logo.png') }}" alt="" class="h-10 w-10 object-cover object-top rounded-lg shadow-md shadow-blue-500/20 group-hover:shadow-lg group-hover:shadow-blue-500/30 transition-shadow duration-300" aria-hidden="true">
                    <span class="font-bold text-xl tracking-tight">Todo<span class="text-[#2563EB]">Go</span></span>
                </a>

                {{-- Badge --}}
                <div class="inline-flex items-center gap-2 bg-blue-50 border border-blue-100 text-blue-700 text-xs font-semibold px-4 py-2 rounded-full mb-6">
                    <span aria-hidden="true">✨</span>
                    <span>Secure Authentication</span>
                </div>

                {{-- Headline --}}
                <h1 class="text-3xl sm:text-4xl font-extrabold text-[#0F172A] tracking-tight mb-3">
                    Welcome Back.
                </h1>

                <p class="text-[#64748B] leading-relaxed mb-8">
                    Choose your preferred sign-in method. Continue instantly with Google or receive a secure passwordless login link via email.
                </p>

                {{-- Google Sign In --}}
                <a href="{{ route('google.login') }}" class="flex items-center justify-center gap-3 w-full bg-white border border-slate-200 hover:border-slate-300 text-[#0F172A] font-semibold px-6 py-4 rounded-xl shadow-sm hover:shadow-lg transition-all duration-300 hover:scale-[1.02] active:scale-[0.98]">
                    <svg class="w-5 h-5 shrink-0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                        <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                        <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
                        <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                    </svg>
                    Continue with Google
                </a>

                <p class="text-xs text-[#64748B] text-center mt-5 leading-relaxed">
                    By continuing, you agree to our
                    <a href="#" class="text-[#2563EB] hover:underline font-medium">Terms of Service</a>
                    and
                    <a href="#" class="text-[#2563EB] hover:underline font-medium">Privacy Policy</a>.
                </p>

                {{-- Divider --}}
                <div class="flex items-center gap-4 my-8">
                    <div class="flex-1 h-px bg-slate-200"></div>
                    <span class="text-xs font-semibold text-[#64748B] uppercase tracking-widest">OR</span>
                    <div class="flex-1 h-px bg-slate-200"></div>
                </div>
<form action="{{ route('login.send') }}" method="POST" class="space-y-4">

    @csrf

    <div>
        <label class="block text-sm font-semibold text-[#0F172A] mb-2">
            Email Address
        </label>

        <input
            type="email"
            name="email"
            placeholder="you@example.com"
            required
            class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:border-[#2563EB] focus:ring-2 focus:ring-blue-100 outline-none transition"
        >
    </div>

    <button
        type="submit"
        class="w-full rounded-xl bg-[#2563EB] text-white py-3 font-semibold hover:bg-blue-700 transition margin-top-4 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:ring-offset-2 mb-4 mt-4"
    >
        Continue with Email
    </button>

</form>
                {{-- Security Card --}}
                <div class="bg-[#F8FAFC] border border-slate-100 rounded-2xl p-5 shadow-sm hover:shadow-md transition-all duration-300 hover:-translate-y-0.5">
                    <div class="flex items-start gap-3">
                        <div class="w-10 h-10 rounded-xl bg-blue-100 flex items-center justify-center shrink-0 text-lg" aria-hidden="true">
                            🔒
                        </div>
                        <div>
                            <p class="text-sm font-bold text-[#0F172A] mb-1">Secure Authentication</p>
                            <p class="text-xs text-[#64748B] leading-relaxed">
                                Your password is never stored.<br>
                                Authentication is handled securely by Google.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        {{-- RIGHT: Illustration Panel --}}
        <div class="w-full lg:w-[55%] relative overflow-hidden bg-gradient-to-br from-blue-50 via-[#F8FAFC] to-blue-100 flex items-center justify-center px-6 py-16 sm:py-20 lg:py-12 order-2 min-h-[420px] lg:min-h-screen">

            {{-- Background circles --}}
            <div class="absolute top-10 right-10 w-64 h-64 bg-blue-200/40 rounded-full blur-3xl pointer-events-none" aria-hidden="true"></div>
            <div class="absolute bottom-16 left-8 w-48 h-48 bg-blue-300/30 rounded-full blur-3xl pointer-events-none" aria-hidden="true"></div>
            <div class="absolute top-1/2 left-1/3 w-32 h-32 bg-white/60 rounded-full blur-2xl pointer-events-none" aria-hidden="true"></div>

            <div class="relative w-full max-w-lg">

                {{-- Main glass card --}}
                <div class="bg-white/60 backdrop-blur-xl rounded-3xl border border-white/80 shadow-2xl shadow-blue-200/40 p-6 sm:p-8 hover:-translate-y-1 transition-transform duration-300">

                    {{-- Header --}}
                    <div class="flex items-center justify-between mb-6">
                        <div>
                            <p class="text-xs font-bold text-[#0F172A]">Your Todo Workspace</p>
                            <p class="text-[10px] text-[#64748B] mt-0.5">Saturday, June 28</p>
                        </div>
                        <div class="bg-[#2563EB] text-white text-[10px] font-semibold px-2.5 py-1 rounded-lg">Today</div>
                    </div>

                    {{-- Progress row --}}
                    <div class="bg-white/70 backdrop-blur-md rounded-2xl border border-white/90 p-4 mb-4 shadow-sm hover:-translate-y-0.5 transition-transform duration-300">
                        <div class="flex items-center justify-between mb-2">
                            <p class="text-xs font-semibold text-[#0F172A]">Daily Progress</p>
                            <span class="text-xs font-bold text-[#2563EB]">65%</span>
                        </div>
                        <div class="w-full bg-slate-200/80 rounded-full h-2">
                            <div class="bg-gradient-to-r from-[#2563EB] to-blue-400 h-2 rounded-full w-[65%]"></div>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-3 mb-4">
                        {{-- Upcoming Tasks --}}
                        <div class="bg-white/70 backdrop-blur-md rounded-2xl border border-white/90 p-3 shadow-sm hover:-translate-y-1 transition-transform duration-300">
                            <p class="text-[10px] font-bold text-[#0F172A] mb-2">Upcoming Tasks</p>
                            @foreach(['Team meeting', 'Submit report'] as $task)
                                <div class="flex items-center gap-2 py-1">
                                    <div class="w-2.5 h-2.5 rounded-full bg-blue-400 shrink-0"></div>
                                    <span class="text-[10px] text-[#0F172A] truncate">{{ $task }}</span>
                                </div>
                            @endforeach
                        </div>

                        {{-- Completed Tasks --}}
                        <div class="bg-white/70 backdrop-blur-md rounded-2xl border border-white/90 p-3 shadow-sm hover:-translate-y-1 transition-transform duration-300">
                            <p class="text-[10px] font-bold text-[#0F172A] mb-2">Completed Tasks</p>
                            @foreach(['Morning workout', 'Reply emails'] as $task)
                                <div class="flex items-center gap-2 py-1">
                                    <div class="w-2.5 h-2.5 rounded border border-green-400 bg-green-400 shrink-0 flex items-center justify-center">
                                        <svg class="w-1.5 h-1.5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                    <span class="text-[10px] line-through text-slate-400 truncate">{{ $task }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-3">
                        {{-- Calendar Widget --}}
                        <div class="bg-white/70 backdrop-blur-md rounded-2xl border border-white/90 p-3 shadow-sm hover:-translate-y-1 transition-transform duration-300">
                            <p class="text-[10px] font-bold text-[#0F172A] mb-2">Calendar</p>
                            <div class="grid grid-cols-7 gap-0.5 text-center">
                                @foreach(['S','M','T','W','T','F','S'] as $day)
                                    <span class="text-[8px] text-slate-400">{{ $day }}</span>
                                @endforeach
                                @foreach(range(1, 14) as $d)
                                    <span class="text-[8px] py-0.5 rounded {{ $d === 14 ? 'bg-[#2563EB] text-white font-bold' : 'text-slate-500' }}">{{ $d }}</span>
                                @endforeach
                            </div>
                        </div>

                        {{-- Productivity Graph --}}
                        <div class="bg-white/70 backdrop-blur-md rounded-2xl border border-white/90 p-3 shadow-sm hover:-translate-y-1 transition-transform duration-300">
                            <p class="text-[10px] font-bold text-[#0F172A] mb-2">Productivity</p>
                            <div class="flex items-end gap-1 h-12">
                                <div class="flex-1 bg-blue-100 rounded-t h-[40%]"></div>
                                <div class="flex-1 bg-blue-200 rounded-t h-[60%]"></div>
                                <div class="flex-1 bg-blue-100 rounded-t h-[45%]"></div>
                                <div class="flex-1 bg-blue-300 rounded-t h-[75%]"></div>
                                <div class="flex-1 bg-[#2563EB] rounded-t h-[90%]"></div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Floating Todo Card --}}
                <div class="absolute -top-4 -right-2 sm:-right-6 bg-white/80 backdrop-blur-xl rounded-2xl border border-white/90 px-4 py-3 shadow-xl shadow-blue-200/50 hover:-translate-y-1 transition-transform duration-300">
                    <div class="flex items-center gap-2 mb-1.5">
                        <div class="w-3.5 h-3.5 rounded border-2 border-slate-300 shrink-0"></div>
                        <span class="text-xs font-semibold text-[#0F172A]">Design mockups</span>
                        <span class="text-[9px] font-semibold px-1.5 py-0.5 rounded bg-red-100 text-red-700 shrink-0">High</span>
                    </div>
                    <p class="text-[10px] text-[#64748B] pl-5">Due today · 5:00 PM</p>
                </div>

                {{-- Floating Priority Card --}}
                <div class="absolute -bottom-4 -left-2 sm:-left-6 bg-white/80 backdrop-blur-xl rounded-2xl border border-white/90 px-4 py-3 shadow-xl shadow-blue-200/50 hover:-translate-y-1 transition-transform duration-300">
                    <p class="text-[10px] font-bold text-[#0F172A] mb-2">Priority Labels</p>
                    <div class="flex flex-wrap gap-1.5">
                        <span class="text-[9px] font-semibold px-2 py-0.5 rounded-full bg-red-100 text-red-700">High</span>
                        <span class="text-[9px] font-semibold px-2 py-0.5 rounded-full bg-amber-100 text-amber-700">Medium</span>
                        <span class="text-[9px] font-semibold px-2 py-0.5 rounded-full bg-slate-100 text-slate-600">Low</span>
                    </div>
                </div>

                {{-- Notification Card (Coming Soon) --}}
                <div class="absolute top-1/2 -right-4 sm:-right-8 bg-white/70 backdrop-blur-xl rounded-2xl border border-dashed border-blue-200 px-4 py-3 shadow-lg hover:-translate-y-1 transition-transform duration-300 hidden sm:block">
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 rounded-xl bg-blue-50 flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4 text-[#2563EB]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-[10px] font-bold text-[#0F172A]">Notifications</p>
                            <span class="text-[9px] font-semibold uppercase tracking-wide text-amber-600 bg-amber-50 px-1.5 py-0.5 rounded">Coming Soon</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

</div>

@endsection
