<header class="sticky top-0 z-30 bg-white border-b border-slate-100 h-16 flex items-center px-4 lg:px-6 gap-4">

    {{-- Hamburger (mobile only) --}}
    <button type="button" @click="sidebarOpen = !sidebarOpen"
        class="lg:hidden p-1.5 rounded-md text-slate-500 hover:text-slate-800 hover:bg-slate-100 transition-colors shrink-0">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="3" y1="6" x2="21" y2="6" />
            <line x1="3" y1="12" x2="21" y2="12" />
            <line x1="3" y1="18" x2="21" y2="18" />
        </svg>
    </button>

    {{-- Hamburger (desktop only) --}}
    <button type="button" @click="desktopSidebarOpen = !desktopSidebarOpen"
        class="hidden lg:block p-1.5 rounded-md text-slate-500 hover:text-slate-800 hover:bg-slate-100 transition-colors shrink-0">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="3" y1="6" x2="21" y2="6" />
            <line x1="3" y1="12" x2="21" y2="12" />
            <line x1="3" y1="18" x2="21" y2="18" />
        </svg>
    </button>

    {{-- Search --}}
    <div class="flex-1 max-w-md">
        <label class="flex items-center gap-2 px-3 py-2 bg-slate-50 border border-slate-200 rounded-lg cursor-text
            hover:border-slate-300 transition-colors group">
            <svg class="w-4 h-4 text-slate-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="11" cy="11" r="8" />
                <line x1="21" y1="21" x2="16.65" y2="16.65" />
            </svg>
            <input type="text"
                placeholder="Cari tugas, workspace, atau apa saja..."
                class="flex-1 bg-transparent text-sm text-slate-600 placeholder-slate-400 outline-none min-w-0" />
            <kbd class="hidden sm:inline-flex items-center gap-0.5 px-1.5 py-0.5 rounded text-[10px] font-medium
                text-slate-400 bg-white border border-slate-200 shrink-0 font-mono">
                ⌘ K
            </kbd>
        </label>
    </div>

    {{-- Right actions --}}
    <div class="flex items-center gap-2 ml-auto shrink-0">

        {{-- New button --}}
        <button class="flex items-center justify-center w-9 h-9 bg-blue-600 hover:bg-blue-700 text-white
            rounded-lg transition-colors shadow-sm shrink-0"
            title="Buat baru">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <line x1="12" y1="5" x2="12" y2="19" />
                <line x1="5" y1="12" x2="19" y2="12" />
            </svg>
        </button>

        {{-- Notification bell --}}
        <button class="relative flex items-center justify-center w-9 h-9 rounded-lg text-slate-500
            hover:text-slate-800 hover:bg-slate-100 transition-colors shrink-0"
            title="Notifikasi">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9" />
                <path d="M13.73 21a2 2 0 0 1-3.46 0" />
            </svg>
            <span class="absolute top-1.5 right-1.5 min-w-[16px] h-4 px-1 flex items-center justify-center
                rounded-full bg-red-500 text-white text-[9px] font-bold leading-none">
                3
            </span>
        </button>

        {{-- User avatar --}}
        <button class="w-9 h-9 rounded-full overflow-hidden ring-2 ring-white border border-slate-200
            hover:ring-blue-200 transition-all shrink-0 focus:outline-none focus:ring-blue-300"
            title="{{ auth()->user()->name ?? 'Profil' }}">
            <img
                src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name ?? 'User') }}&background=2563EB&color=fff&size=80&bold=true"
                alt="{{ auth()->user()->name ?? 'User' }}"
                class="w-full h-full object-cover" />
        </button>

    </div>
</header>
