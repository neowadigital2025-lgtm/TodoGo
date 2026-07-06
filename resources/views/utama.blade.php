<!-- @extends('layouts.guest')

@section('title', 'TodoGo')

@section('content')

<div class="bg-white text-[#0F172A] min-h-screen antialiased">

    {{-- Sticky Navbar --}}
    <header class="sticky top-0 z-50 bg-white/80 backdrop-blur-md border-b border-slate-100 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16 lg:h-20">
                {{-- Logo --}}
                <a href="/" class="flex items-center gap-2.5 group">
                    <img src="{{ asset('images/todogo-logo.png') }}" alt="" class="h-12 w-12 object-cover object-top rounded-lg shadow-md shadow-blue-500/20 group-hover:shadow-lg group-hover:shadow-blue-500/30 transition-shadow duration-300" aria-hidden="true">
                    <span class="font-bold text-3xl tracking-tight">Todo<span class="text-[#2563EB]">Go</span></span>
                </a>

                {{-- Center Nav --}}
                <nav class="hidden md:flex items-center gap-10" aria-label="Main navigation">
                    <a href="#features" class="text-sm text-[#64748B] hover:text-[#2563EB] transition-colors duration-200 font-medium">Features</a>
                    <a href="#how-it-works" class="text-sm text-[#64748B] hover:text-[#2563EB] transition-colors duration-200 font-medium">How It Works</a>
                    <a href="#about" class="text-sm text-[#64748B] hover:text-[#2563EB] transition-colors duration-200 font-medium">About</a>
                </nav>

                {{-- CTA --}}
                <a href="{{ route('login') }}" class="inline-flex items-center gap-2 bg-[#2563EB] hover:bg-blue-700 text-white text-sm font-semibold px-4 py-2.5 sm:px-5 rounded-xl shadow-md shadow-blue-500/20 hover:shadow-lg hover:shadow-blue-500/30 transition-all duration-200 hover:-translate-y-0.5">
                    <svg class="w-4 h-4" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#fff"/>
                        <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#fff"/>
                        <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#fff"/>
                        <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#fff"/>
                    </svg>
                    <span class="hidden sm:inline">Continue with Google</span>
                    <span class="sm:hidden">Sign in</span>
                </a>
            </div>
        </div>
    </header>

    {{-- Hero Section --}}
    <section class="relative overflow-hidden bg-white pt-12 pb-20 sm:pt-16 sm:pb-24 lg:pt-24 lg:pb-32">
        <div class="absolute top-0 left-1/4 w-72 sm:w-96 h-72 sm:h-96 bg-blue-100 rounded-full opacity-40 blur-3xl -translate-y-1/2 pointer-events-none" aria-hidden="true"></div>
        <div class="absolute top-1/3 right-0 w-56 sm:w-72 h-56 sm:h-72 bg-blue-200 rounded-full opacity-30 blur-3xl pointer-events-none" aria-hidden="true"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">

                {{-- Left --}}
                <div class="space-y-8 text-center lg:text-left">
                    <div class="inline-flex items-center gap-2 bg-blue-50 border border-blue-100 text-blue-700 text-xs font-semibold px-4 py-2 rounded-full">
                        <span aria-hidden="true">✨</span>
                        <span>Modern Todo List Platform</span>
                    </div>

                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-[#0F172A] leading-[1.1] tracking-tight">
                        Stay Organized,<br>
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#2563EB] to-blue-400">One Task at a Time.</span>
                    </h1>

                    <p class="text-lg text-[#64748B] leading-relaxed max-w-lg mx-auto lg:mx-0">
                        TodoGo helps students, professionals, and teams organize daily tasks, stay focused, and achieve more with a clean and intuitive workspace.
                    </p>

                    <div class="flex flex-col sm:flex-row gap-3 justify-center lg:justify-start">
                        <a href="{{ route('login') }}" class="inline-flex items-center justify-center gap-2 bg-[#2563EB] hover:bg-blue-700 text-white font-semibold px-6 py-3.5 rounded-xl shadow-lg shadow-blue-500/25 hover:shadow-xl hover:shadow-blue-500/30 transition-all duration-200 hover:-translate-y-0.5">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#fff"/>
                                <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#fff"/>
                                <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#fff"/>
                                <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#fff"/>
                            </svg>
                            Continue with Google
                        </a>
                        <a href="#features" class="inline-flex items-center justify-center gap-2 bg-white border border-slate-200 hover:border-blue-300 text-[#0F172A] font-semibold px-6 py-3.5 rounded-xl shadow-sm hover:shadow-md transition-all duration-200 hover:-translate-y-0.5">
                            Learn More
                            <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </a>
                    </div>

                    <div class="flex flex-wrap gap-x-6 gap-y-2 text-sm text-[#64748B] justify-center lg:justify-start">
                        <span class="flex items-center gap-1.5"><span class="text-green-500" aria-hidden="true">✔</span> Free Forever</span>
                        <span class="flex items-center gap-1.5"><span class="text-green-500" aria-hidden="true">✔</span> Secure Google Login</span>
                        <span class="flex items-center gap-1.5"><span class="text-green-500" aria-hidden="true">✔</span> Reminder Notifications (Coming Soon)</span>
                    </div>
                </div>

                {{-- Right: Dashboard Mockup --}}
                <div class="relative mt-4 lg:mt-0">
                    <div class="bg-[#F8FAFC] rounded-2xl border border-slate-200 shadow-2xl shadow-slate-200/60 overflow-hidden">
                        <div class="bg-white border-b border-slate-100 px-4 py-3 flex items-center gap-2">
                            <div class="w-3 h-3 rounded-full bg-red-400"></div>
                            <div class="w-3 h-3 rounded-full bg-yellow-400"></div>
                            <div class="w-3 h-3 rounded-full bg-green-400"></div>
                            <div class="flex-1 mx-4 bg-slate-100 rounded-md h-5 max-w-xs"></div>
                        </div>

                        <div class="flex h-80 sm:h-96">
                            {{-- Sidebar --}}
                            <aside class="hidden sm:flex w-40 lg:w-44 bg-white border-r border-slate-100 p-3 flex-col gap-1 shrink-0">
                                <div class="flex items-center gap-2 px-2 py-1.5 mb-2">
                                    <img src="{{ asset('images/todogo-logo.png') }}" alt="" class="h-5 w-5 object-cover object-top rounded" aria-hidden="true">
                                    <span class="text-xs font-bold">Todo<span class="text-blue-600">Go</span></span>
                                </div>
                                @foreach([
                                    ['Today', true],
                                    ['Upcoming', false],
                                    ['Completed', false],
                                    ['Calendar', false],
                                    ['Settings', false],
                                ] as [$item, $active])
                                    <div class="flex items-center gap-2 px-2 py-1.5 rounded-lg {{ $active ? 'bg-blue-50 text-blue-700' : 'text-slate-500' }}">
                                        <div class="w-3 h-3 rounded {{ $active ? 'bg-blue-400' : 'bg-slate-200' }}"></div>
                                        <span class="text-xs font-medium truncate">{{ $item }}</span>
                                    </div>
                                @endforeach
                            </aside>

                            {{-- Main Content --}}
                            <div class="flex-1 p-3 sm:p-4 overflow-hidden">
                                <p class="text-xs font-bold text-[#0F172A] mb-3">Today's Overview</p>

                                <div class="grid grid-cols-2 gap-2 sm:gap-3 mb-3">
                                    {{-- Progress Card --}}
                                    <div class="bg-white rounded-xl p-3 border border-slate-100 shadow-sm">
                                        <p class="text-xs text-[#64748B] mb-1">Progress</p>
                                        <p class="text-lg font-extrabold text-[#0F172A]">78%</p>
                                        <div class="w-full bg-slate-100 rounded-full h-1.5 mt-1.5">
                                            <div class="bg-gradient-to-r from-blue-500 to-blue-400 h-1.5 rounded-full w-[78%]"></div>
                                        </div>
                                    </div>

                                    {{-- Upcoming Tasks --}}
                                    <div class="bg-white rounded-xl p-3 border border-slate-100 shadow-sm">
                                        <p class="text-xs text-[#64748B] mb-1">Upcoming Tasks</p>
                                        <p class="text-xs font-semibold text-[#0F172A]">Design Review</p>
                                        <p class="text-xs text-[#64748B] mt-0.5">Tomorrow, 2:00 PM</p>
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 sm:grid-cols-5 gap-2 sm:gap-3 mb-3">
                                    {{-- Today's Tasks --}}
                                    <div class="sm:col-span-3 bg-white rounded-xl border border-slate-100 shadow-sm p-3">
                                        <p class="text-xs font-semibold text-[#0F172A] mb-2">Today's Tasks</p>
                                        @foreach([
                                            ['Finalize wireframes', 'High', 'bg-red-100 text-red-700'],
                                            ['Team standup call', 'Medium', 'bg-amber-100 text-amber-700'],
                                            ['Write API docs', 'Low', 'bg-slate-100 text-slate-600'],
                                        ] as $i => [$task, $priority, $badgeClass])
                                            <div class="flex items-center gap-2 py-1">
                                                <div class="w-3.5 h-3.5 rounded border-2 {{ $i === 0 ? 'border-blue-500 bg-blue-500' : 'border-slate-300' }} flex items-center justify-center shrink-0">
                                                    @if($i === 0)
                                                        <svg class="w-2 h-2 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                                        </svg>
                                                    @endif
                                                </div>
                                                <span class="text-xs truncate flex-1 {{ $i === 0 ? 'line-through text-slate-400' : 'text-[#0F172A]' }}">{{ $task }}</span>
                                                <span class="text-[9px] font-semibold px-1.5 py-0.5 rounded {{ $badgeClass }} shrink-0">{{ $priority }}</span>
                                            </div>
                                        @endforeach
                                    </div>

                                    {{-- Calendar Preview --}}
                                    <div class="sm:col-span-2 bg-white rounded-xl border border-slate-100 shadow-sm p-3">
                                        <p class="text-xs font-semibold text-[#0F172A] mb-2">Calendar Preview</p>
                                        <div class="grid grid-cols-7 gap-0.5 text-center">
                                            @foreach(['S','M','T','W','T','F','S'] as $day)
                                                <span class="text-[9px] text-slate-400 font-medium">{{ $day }}</span>
                                            @endforeach
                                            @foreach(range(1, 28) as $d)
                                                <span class="text-[9px] py-0.5 rounded {{ $d === 28 ? 'bg-[#2563EB] text-white font-bold' : ($d === 15 ? 'bg-blue-50 text-blue-700 font-semibold' : 'text-slate-500') }}">{{ $d }}</span>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                {{-- Task Columns --}}
                                <div class="grid grid-cols-3 gap-2">
                                    <div class="bg-slate-50 rounded-lg p-2 border border-slate-100">
                                        <p class="text-[10px] font-semibold text-slate-700 mb-1.5">Today's Tasks</p>
                                        <div class="bg-white rounded-md p-1.5 mb-1 border border-slate-100 shadow-sm">
                                            <div class="w-full h-1.5 bg-slate-200 rounded mb-1"></div>
                                            <div class="w-2/3 h-1.5 bg-slate-100 rounded"></div>
                                        </div>
                                    </div>
                                    <div class="bg-blue-50 rounded-lg p-2 border border-blue-100">
                                        <p class="text-[10px] font-semibold text-blue-700 mb-1.5">Upcoming Tasks</p>
                                        <div class="bg-white rounded-md p-1.5 border border-blue-100 shadow-sm">
                                            <div class="w-full h-1.5 bg-blue-200 rounded mb-1"></div>
                                            <div class="w-1/2 h-1.5 bg-blue-100 rounded"></div>
                                        </div>
                                    </div>
                                    <div class="bg-green-50 rounded-lg p-2 border border-green-100">
                                        <p class="text-[10px] font-semibold text-green-700 mb-1.5">Completed Tasks</p>
                                        <div class="bg-white rounded-md p-1.5 border border-green-100 shadow-sm">
                                            <div class="w-2/3 h-1.5 bg-green-200 rounded"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Floating cards --}}
                    <div class="absolute -top-3 -right-2 sm:-top-4 sm:-right-4 bg-white rounded-xl px-3 sm:px-4 py-2.5 sm:py-3 shadow-xl border border-slate-100 flex items-center gap-3 hover:-translate-y-1 transition-transform duration-300">
                        <div class="w-8 h-8 rounded-full bg-green-100 flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-[#0F172A]">Task Completed!</p>
                            <p class="text-xs text-[#64748B]">+12 streak 🔥</p>
                        </div>
                    </div>

                    <div class="absolute -bottom-3 -left-2 sm:-bottom-4 sm:-left-4 bg-white rounded-xl px-3 sm:px-4 py-2.5 sm:py-3 shadow-xl border border-slate-100 hover:-translate-y-1 transition-transform duration-300">
                        <p class="text-xs text-[#64748B] mb-1">Weekly Goal</p>
                        <div class="flex items-center gap-2">
                            <span class="text-sm font-extrabold text-[#0F172A]">89%</span>
                            <div class="w-16 sm:w-20 bg-slate-100 rounded-full h-1.5">
                                <div class="bg-[#2563EB] h-1.5 rounded-full w-[89%]"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Trusted Section --}}
    <section class="bg-[#F8FAFC] py-14 sm:py-16 border-y border-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p class="text-sm font-semibold text-[#64748B] uppercase tracking-widest mb-8 sm:mb-10">Trusted by productive people worldwide</p>
            <div class="flex flex-wrap justify-center items-center gap-4 sm:gap-8">
                @foreach(['Acme Corp', 'Brightline', 'Nexora', 'Stackify', 'Lumora', 'Datavert'] as $company)
                    <div class="bg-white border border-slate-200 rounded-xl px-5 sm:px-6 py-3 shadow-sm hover:shadow-md hover:border-blue-200 transition-all duration-200">
                        <span class="text-sm font-bold text-slate-400">{{ $company }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Features Section --}}
    <section id="features" class="bg-white py-20 sm:py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-14 sm:mb-16">
                <div class="inline-flex items-center gap-2 bg-blue-50 border border-blue-100 text-blue-700 text-xs font-semibold px-4 py-2 rounded-full mb-4">
                    Features
                </div>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-[#0F172A] tracking-tight">Everything you need to stay on track</h2>
                <p class="mt-4 text-[#64748B] max-w-xl mx-auto">A complete toolkit designed for individuals and teams who take their work seriously.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 sm:gap-8">
                <article class="group bg-[#F8FAFC] hover:bg-white rounded-2xl p-8 border border-slate-100 hover:border-blue-200 shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                    <div class="w-12 h-12 bg-blue-100 group-hover:bg-[#2563EB] rounded-xl flex items-center justify-center mb-6 transition-colors duration-300">
                        <svg class="w-6 h-6 text-[#2563EB] group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-[#0F172A] mb-3">Task Management</h3>
                    <p class="text-sm text-[#64748B] leading-relaxed">Create, edit, organize, and complete your daily tasks with ease.</p>
                </article>

                <article class="group bg-[#F8FAFC] hover:bg-white rounded-2xl p-8 border border-slate-100 hover:border-blue-200 shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                    <div class="w-12 h-12 bg-blue-100 group-hover:bg-[#2563EB] rounded-xl flex items-center justify-center mb-6 transition-colors duration-300">
                        <svg class="w-6 h-6 text-[#2563EB] group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-[#0F172A] mb-3">Priority Management</h3>
                    <p class="text-sm text-[#64748B] leading-relaxed">Organize tasks based on priority levels to stay focused on what matters most.</p>
                </article>

                <article class="group bg-[#F8FAFC] hover:bg-white rounded-2xl p-8 border border-slate-100 hover:border-blue-200 shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1 relative">
                    <span class="absolute top-6 right-6 text-[10px] font-semibold uppercase tracking-wide bg-amber-100 text-amber-700 px-2 py-1 rounded-full">Coming Soon</span>
                    <div class="w-12 h-12 bg-blue-100 group-hover:bg-[#2563EB] rounded-xl flex items-center justify-center mb-6 transition-colors duration-300">
                        <svg class="w-6 h-6 text-[#2563EB] group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-[#0F172A] mb-3">Reminder Notifications</h3>
                    <p class="text-sm text-[#64748B] leading-relaxed">Never miss important deadlines with smart reminders.</p>
                </article>
            </div>
        </div>
    </section>

    {{-- Dashboard Preview Section --}}
    <section id="how-it-works" class="bg-[#F8FAFC] py-20 sm:py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-14 sm:mb-16">
                <div class="inline-flex items-center gap-2 bg-blue-50 border border-blue-100 text-blue-700 text-xs font-semibold px-4 py-2 rounded-full mb-4">
                    Dashboard Preview
                </div>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-[#0F172A] tracking-tight">Your command center for deep work</h2>
                <p class="mt-4 text-[#64748B] max-w-xl mx-auto">A clean, distraction-free interface designed to put your most important work front and center.</p>
            </div>

            <div class="relative">
                <div class="absolute inset-0 bg-gradient-to-br from-blue-400/20 via-purple-400/10 to-blue-600/20 rounded-3xl blur-2xl" aria-hidden="true"></div>

                <div class="relative bg-white/70 backdrop-blur-xl rounded-3xl border border-white/60 shadow-2xl shadow-slate-300/40 overflow-hidden">
                    <div class="bg-white/50 backdrop-blur-sm border-b border-slate-200/60 px-4 sm:px-6 py-4 flex items-center gap-3">
                        <div class="flex gap-1.5">
                            <div class="w-3 h-3 rounded-full bg-red-400"></div>
                            <div class="w-3 h-3 rounded-full bg-yellow-400"></div>
                            <div class="w-3 h-3 rounded-full bg-green-400"></div>
                        </div>
                        <div class="flex-1 max-w-xs mx-auto bg-white/80 rounded-lg h-6 border border-slate-200/80 flex items-center px-3">
                            <span class="text-xs text-slate-400">app.todogo.io/dashboard</span>
                        </div>
                    </div>

                    <div class="flex flex-col lg:flex-row min-h-[420px]">
                        {{-- Sidebar --}}
                        <aside class="lg:w-56 bg-white/40 backdrop-blur-md border-b lg:border-b-0 lg:border-r border-slate-200/60 p-4 flex flex-row lg:flex-col gap-1 overflow-x-auto lg:overflow-visible shrink-0">
                            <div class="hidden lg:flex items-center gap-2 px-3 py-2 mb-3">
                                <img src="{{ asset('images/todogo-logo.png') }}" alt="" class="h-6 w-6 object-cover object-top rounded" aria-hidden="true">
                                <span class="text-sm font-bold">Todo<span class="text-[#2563EB]">Go</span></span>
                            </div>
                            @foreach([
                                ['Today', true],
                                ['Upcoming', false],
                                ['Completed', false],
                                ['Calendar', false],
                                ['Settings', false],
                            ] as [$item, $active])
                                <div class="flex items-center gap-3 px-3 py-2 rounded-xl whitespace-nowrap {{ $active ? 'bg-[#2563EB] text-white shadow-md shadow-blue-500/30' : 'text-slate-500 bg-white/50' }}">
                                    <div class="w-4 h-4 rounded {{ $active ? 'bg-blue-400' : 'bg-slate-200' }}"></div>
                                    <span class="text-xs font-medium">{{ $item }}</span>
                                </div>
                            @endforeach
                        </aside>

                        {{-- Main --}}
                        <div class="flex-1 p-4 sm:p-6">
                            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-6">
                                <div>
                                    <h3 class="text-base font-bold text-[#0F172A]">Good morning, Alex 👋</h3>
                                    <p class="text-xs text-[#64748B]">You have 5 tasks due today</p>
                                </div>
                                <div class="bg-blue-50/80 backdrop-blur-sm text-blue-700 text-xs font-semibold px-3 py-1.5 rounded-lg border border-blue-100 self-start">+ New Task</div>
                            </div>

                            {{-- Progress Bar --}}
                            <div class="bg-white/60 backdrop-blur-md rounded-2xl p-4 border border-white/80 shadow-sm mb-4">
                                <div class="flex items-center justify-between mb-2">
                                    <p class="text-xs font-bold text-[#0F172A]">Daily Progress</p>
                                    <span class="text-xs font-bold text-[#2563EB]">78%</span>
                                </div>
                                <div class="w-full bg-slate-200/80 rounded-full h-2">
                                    <div class="bg-gradient-to-r from-[#2563EB] to-blue-400 h-2 rounded-full w-[78%]"></div>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-4">
                                <div class="bg-gradient-to-br from-[#2563EB] to-blue-500 rounded-2xl p-4 text-white shadow-lg shadow-blue-500/25">
                                    <p class="text-xs opacity-80 mb-1">Today's Tasks</p>
                                    <p class="text-3xl font-extrabold">5</p>
                                    <p class="text-xs text-blue-100 mt-1">3 completed today</p>
                                </div>
                                <div class="bg-white/60 backdrop-blur-md rounded-2xl p-4 border border-white/80 shadow-sm">
                                    <p class="text-xs text-[#64748B] mb-1">Upcoming Tasks</p>
                                    <p class="text-3xl font-extrabold text-[#0F172A]">8</p>
                                    <p class="text-xs text-[#64748B] mt-1">Due this week</p>
                                </div>
                                <div class="bg-white/60 backdrop-blur-md rounded-2xl p-4 border border-white/80 shadow-sm">
                                    <p class="text-xs text-[#64748B] mb-1">Completed Tasks</p>
                                    <p class="text-3xl font-extrabold text-[#0F172A]">14</p>
                                    <p class="text-xs text-green-500 mt-1 font-medium">↑ 3 from yesterday</p>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                                {{-- Today's Tasks --}}
                                <div class="bg-white/60 backdrop-blur-md rounded-2xl border border-white/80 shadow-sm p-4">
                                    <p class="text-xs font-bold text-[#0F172A] mb-3">Today's Tasks</p>
                                    @foreach([
                                        ['Finalize homepage design', true, 'High', 'bg-red-100 text-red-700'],
                                        ['Review pull requests', true, 'High', 'bg-red-100 text-red-700'],
                                        ['Write sprint recap', false, 'Medium', 'bg-amber-100 text-amber-700'],
                                        ['Update project docs', false, 'Low', 'bg-slate-100 text-slate-600'],
                                    ] as [$task, $done, $priority, $badgeClass])
                                        <div class="flex items-center gap-3 py-1.5 border-b border-slate-100/80 last:border-0">
                                            <div class="w-4 h-4 rounded border-2 {{ $done ? 'border-blue-500 bg-blue-500' : 'border-slate-300' }} flex items-center justify-center shrink-0">
                                                @if($done)
                                                    <svg class="w-2.5 h-2.5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                                    </svg>
                                                @endif
                                            </div>
                                            <span class="text-xs flex-1 {{ $done ? 'line-through text-slate-400' : 'text-[#0F172A]' }}">{{ $task }}</span>
                                            <span class="text-[9px] font-semibold px-1.5 py-0.5 rounded {{ $badgeClass }} shrink-0">{{ $priority }}</span>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="flex flex-col gap-4">
                                    {{-- Calendar Preview --}}
                                    <div class="bg-white/60 backdrop-blur-md rounded-2xl border border-white/80 shadow-sm p-4">
                                        <p class="text-xs font-bold text-[#0F172A] mb-3">Calendar Preview</p>
                                        <div class="grid grid-cols-7 gap-1 text-center">
                                            @foreach(['S','M','T','W','T','F','S'] as $day)
                                                <span class="text-[10px] text-slate-400 font-medium">{{ $day }}</span>
                                            @endforeach
                                            @foreach(range(1, 28) as $d)
                                                <span class="text-[10px] py-1 rounded {{ $d === 28 ? 'bg-[#2563EB] text-white font-bold' : ($d === 15 ? 'bg-blue-50 text-blue-700 font-semibold' : 'text-slate-500') }}">{{ $d }}</span>
                                            @endforeach
                                        </div>
                                    </div>

                                    {{-- Upcoming & Completed --}}
                                    <div class="bg-white/60 backdrop-blur-md rounded-2xl border border-white/80 shadow-sm p-4">
                                        <p class="text-xs font-bold text-[#0F172A] mb-3">Upcoming Tasks</p>
                                        @foreach(['Client presentation', 'Submit report'] as $task)
                                            <div class="flex items-center gap-2 py-1 border-b border-slate-100/80 last:border-0">
                                                <div class="w-3 h-3 rounded-full bg-blue-400 shrink-0"></div>
                                                <span class="text-xs text-[#0F172A]">{{ $task }}</span>
                                            </div>
                                        @endforeach
                                        <p class="text-xs font-bold text-[#0F172A] mt-3 mb-2">Completed Tasks</p>
                                        @foreach(['Team standup', 'Email follow-up'] as $task)
                                            <div class="flex items-center gap-2 py-1 border-b border-slate-100/80 last:border-0">
                                                <div class="w-3 h-3 rounded-full bg-green-400 shrink-0"></div>
                                                <span class="text-xs line-through text-slate-400">{{ $task }}</span>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Statistics Section --}}
    <section class="bg-white py-16 sm:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 sm:gap-8 text-center">
                <div class="group p-8 rounded-2xl border border-slate-100 hover:border-blue-200 hover:shadow-xl transition-all duration-300 hover:-translate-y-1 bg-[#F8FAFC] hover:bg-white">
                    <p class="text-4xl sm:text-5xl font-extrabold text-[#0F172A] mb-2 group-hover:text-[#2563EB] transition-colors">10K+</p>
                    <p class="text-sm text-[#64748B] font-medium">Tasks Created</p>
                </div>
                <div class="group p-8 rounded-2xl border border-slate-100 hover:border-blue-200 hover:shadow-xl transition-all duration-300 hover:-translate-y-1 bg-[#F8FAFC] hover:bg-white">
                    <p class="text-4xl sm:text-5xl font-extrabold text-[#0F172A] mb-2 group-hover:text-[#2563EB] transition-colors">98%</p>
                    <p class="text-sm text-[#64748B] font-medium">User Satisfaction</p>
                </div>
                <div class="group p-8 rounded-2xl border border-slate-100 hover:border-blue-200 hover:shadow-xl transition-all duration-300 hover:-translate-y-1 bg-[#F8FAFC] hover:bg-white">
                    <p class="text-4xl sm:text-5xl font-extrabold text-[#0F172A] mb-2 group-hover:text-[#2563EB] transition-colors">Coming Soon</p>
                    <p class="text-sm text-[#64748B] font-medium">Reminder Notifications</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Testimonials --}}
    <section class="bg-[#F8FAFC] py-20 sm:py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-14 sm:mb-16">
                <div class="inline-flex items-center gap-2 bg-blue-50 border border-blue-100 text-blue-700 text-xs font-semibold px-4 py-2 rounded-full mb-4">
                    Testimonials
                </div>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-[#0F172A] tracking-tight">People love TodoGo</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 sm:gap-8">
                @foreach([
                    [
                        'quote' => 'TodoGo completely transformed how I manage my freelance projects. I stay organized every day and my clients have noticed.',
                        'name' => 'Sarah Chen',
                        'role' => 'Freelance Designer',
                        'initials' => 'SC',
                        'gradient' => 'from-pink-400 to-purple-500',
                    ],
                    [
                        'quote' => 'As a student juggling assignments and part-time work, TodoGo keeps everything in order. The interface is clean and actually useful.',
                        'name' => 'Marcus Rivera',
                        'role' => 'Computer Science Student',
                        'initials' => 'MR',
                        'gradient' => 'from-blue-400 to-cyan-500',
                    ],
                    [
                        'quote' => 'Our team switched to TodoGo last quarter and our task completion rate jumped by 40%. It just works without getting in the way.',
                        'name' => 'Priya Nair',
                        'role' => 'Engineering Lead',
                        'initials' => 'PN',
                        'gradient' => 'from-orange-400 to-amber-500',
                    ],
                ] as $testimonial)
                    <blockquote class="bg-white rounded-2xl p-8 border border-slate-100 shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                        <div class="flex mb-4" aria-hidden="true">
                            @for($i = 0; $i < 5; $i++)
                                <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                            @endfor
                        </div>
                        <p class="text-sm text-[#64748B] leading-relaxed mb-6">&ldquo;{{ $testimonial['quote'] }}&rdquo;</p>
                        <footer class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-gradient-to-br {{ $testimonial['gradient'] }} flex items-center justify-center shrink-0">
                                <span class="text-white text-xs font-bold">{{ $testimonial['initials'] }}</span>
                            </div>
                            <div>
                                <cite class="text-sm font-bold text-[#0F172A] not-italic">{{ $testimonial['name'] }}</cite>
                                <p class="text-xs text-[#64748B]">{{ $testimonial['role'] }}</p>
                            </div>
                        </footer>
                    </blockquote>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="bg-gradient-to-br from-[#2563EB] via-blue-600 to-blue-700 py-20 sm:py-24 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-72 sm:w-96 h-72 sm:h-96 bg-blue-500 rounded-full opacity-30 blur-3xl translate-x-1/3 -translate-y-1/3 pointer-events-none" aria-hidden="true"></div>
        <div class="absolute bottom-0 left-0 w-56 sm:w-64 h-56 sm:h-64 bg-blue-800 rounded-full opacity-30 blur-3xl -translate-x-1/3 translate-y-1/3 pointer-events-none" aria-hidden="true"></div>

        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white tracking-tight mb-6">
                Ready to Get Things Done?
            </h2>
            <p class="text-blue-100 text-lg mb-10 max-w-xl mx-auto">Start organizing your daily tasks with TodoGo and boost your productivity.</p>

            <a href="{{ route('login') }}" class="inline-flex items-center gap-3 bg-white hover:bg-slate-50 text-[#2563EB] font-bold px-8 py-4 rounded-xl shadow-xl hover:shadow-2xl transition-all duration-200 hover:-translate-y-1 text-sm">
                <svg class="w-5 h-5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                    <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                    <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
                    <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                </svg>
                Continue with Google
            </a>

            <p class="text-blue-200 text-sm mt-5">No credit card required.</p>
        </div>
    </section>

    {{-- Footer --}}
    <footer id="about" class="bg-[#0F172A] text-slate-400 py-14 sm:py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-5 gap-8 mb-12">
                <div class="col-span-2 md:col-span-1">
                    <div class="flex items-center gap-2 mb-4">
                        <img src="{{ asset('images/todogo-logo.png') }}" alt="" class="h-8 w-8 object-cover object-top rounded-lg" aria-hidden="true">
                        <span class="text-white font-bold text-lg tracking-tight">Todo<span class="text-blue-400">Go</span></span>
                    </div>
                    <p class="text-sm leading-relaxed">Modern todo list for productive people.</p>
                </div>

                <div>
                    <h4 class="text-white text-sm font-semibold mb-4">Product</h4>
                    <ul class="space-y-2">
                        @foreach(['Features', 'Dashboard', 'Integrations', 'Changelog'] as $link)
                            <li><a href="#" class="text-sm hover:text-white transition-colors duration-200">{{ $link }}</a></li>
                        @endforeach
                    </ul>
                </div>

                <div>
                    <h4 class="text-white text-sm font-semibold mb-4">Resources</h4>
                    <ul class="space-y-2">
                        @foreach(['Documentation', 'Blog', 'Community', 'Support'] as $link)
                            <li><a href="#" class="text-sm hover:text-white transition-colors duration-200">{{ $link }}</a></li>
                        @endforeach
                    </ul>
                </div>

                <div>
                    <h4 class="text-white text-sm font-semibold mb-4">Company</h4>
                    <ul class="space-y-2">
                        @foreach(['About', 'Careers', 'Press', 'Contact'] as $link)
                            <li><a href="#" class="text-sm hover:text-white transition-colors duration-200">{{ $link }}</a></li>
                        @endforeach
                    </ul>
                </div>

                <div>
                    <h4 class="text-white text-sm font-semibold mb-4">Legal</h4>
                    <ul class="space-y-2">
                        @foreach(['Privacy Policy', 'Terms of Service', 'Cookie Policy', 'Security'] as $link)
                            <li><a href="#" class="text-sm hover:text-white transition-colors duration-200">{{ $link }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="border-t border-slate-800 pt-8 flex flex-col sm:flex-row items-center justify-between gap-4">
                <p class="text-sm text-center sm:text-left">&copy; 2026 TodoGo. All rights reserved.</p>
                <div class="flex items-center gap-4">
                    <a href="#" class="text-slate-500 hover:text-white transition-colors duration-200" aria-label="Twitter">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/></svg>
                    </a>
                    <a href="#" class="text-slate-500 hover:text-white transition-colors duration-200" aria-label="GitHub">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd"/></svg>
                    </a>
                    <a href="#" class="text-slate-500 hover:text-white transition-colors duration-200" aria-label="LinkedIn">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" clip-rule="evenodd"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </footer>

</div>

@endsection -->