{{-- ════════════════════════════════════════════════════════
     Welcome Card
     Usage: <x-dashboard.welcome-card />
════════════════════════════════════════════════════════ --}}

<div class="bg-gradient-to-r from-blue-600 to-blue-800 rounded-2xl p-6 sm:p-8 flex flex-col sm:flex-row items-center justify-between text-white shadow-lg overflow-hidden relative">
    
    {{-- Decorative background elements --}}
    <div class="absolute top-0 right-0 -mr-8 -mt-8 w-48 h-48 bg-white opacity-10 rounded-full blur-2xl pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 -ml-8 -mb-8 w-32 h-32 bg-white opacity-10 rounded-full blur-xl pointer-events-none"></div>

    <div class="relative z-10 text-center sm:text-left mb-6 sm:mb-0">
        <div class="inline-flex items-center gap-2 px-3 py-1 bg-white/20 backdrop-blur-sm rounded-full text-xs font-semibold mb-4 text-blue-50 border border-white/10">
            <svg class="w-3.5 h-3.5 text-yellow-300" viewBox="0 0 24 24" fill="currentColor">
                <path d="M12 2.25a.75.75 0 01.75.75v2.25a.75.75 0 01-1.5 0V3a.75.75 0 01.75-.75zM7.5 12a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM18.894 6.166a.75.75 0 00-1.06-1.06l-1.591 1.59a.75.75 0 101.06 1.061l1.591-1.59zM21.75 12a.75.75 0 01-.75.75h-2.25a.75.75 0 010-1.5H21a.75.75 0 01.75.75zM17.834 18.894a.75.75 0 001.06-1.06l-1.59-1.591a.75.75 0 10-1.061 1.06l1.59 1.591zM12 18a.75.75 0 01.75.75V21a.75.75 0 01-1.5 0v-2.25A.75.75 0 0112 18zM7.758 17.303a.75.75 0 00-1.061-1.06l-1.591 1.59a.75.75 0 001.06 1.061l1.591-1.59zM6 12a.75.75 0 01-.75.75H3a.75.75 0 010-1.5h2.25A.75.75 0 016 12zM6.697 7.758a.75.75 0 001.06-1.06l-1.59-1.591a.75.75 0 00-1.061 1.06l1.59 1.591z"/>
            </svg>
            Selamat Pagi
        </div>
        <h1 class="text-2xl sm:text-3xl font-bold leading-tight mb-2">
            Selamat datang, {{ auth()->user()->name ?? 'Pengguna' }}! 👋
        </h1>
        <p class="text-blue-100 text-sm sm:text-base max-w-md">
            Let's make today productive. Cek tugas prioritasmu dan mulai capai target hari ini.
        </p>
    </div>
    
    <div class="relative z-10 shrink-0 hidden sm:block">
        <svg class="w-32 h-32 text-white opacity-90" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
            <path d="M9 12l2 2 4-4"/>
        </svg>
    </div>
</div>
