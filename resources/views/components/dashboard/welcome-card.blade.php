{{-- ============================================================
     Welcome Card - Simple & Elegant
     No time-based greeting, just user name and motivational message
     
     Usage: <x-dashboard.welcome-card />
============================================================ --}}

<div class="bg-gradient-to-br from-blue-600 to-blue-700 rounded-2xl text-white p-8 relative overflow-hidden">
    {{-- Background decoration --}}
    <div class="absolute top-0 right-0 w-32 h-32 bg-white/5 rounded-full -translate-y-8 translate-x-8"></div>
    <div class="absolute bottom-0 left-0 w-20 h-20 bg-white/5 rounded-full translate-y-4 -translate-x-4"></div>
    
    <div class="relative z-10">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-6">
            
            {{-- Left Content --}}
            <div class="flex-1">
                <h1 class="text-2xl sm:text-3xl font-bold mb-2 leading-tight">
                    Halo, {{ auth()->user()->name }}! 👋
                </h1>
                <p class="text-blue-100 text-sm sm:text-base leading-relaxed max-w-md">
                    Selamat datang di TodoGo. Mari kelola tugasmu dengan efisien dan capai tujuanmu hari ini.
                </p>
            </div>

            {{-- Right Action --}}
            <div class="shrink-0">
                <a href="{{ route('tasks.create') }}"
                   class="inline-flex items-center justify-center gap-2 px-6 py-3 
                          bg-white text-blue-600 font-semibold rounded-xl 
                          hover:bg-blue-50 transition-all duration-200 shadow-lg
                          hover:shadow-xl hover:scale-105">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="12" y1="5" x2="12" y2="19"/>
                        <line x1="5"  y1="12" x2="19" y2="12"/>
                    </svg>
                    Buat Tugas
                </a>
                
                {{-- Quick info --}}
                <div class="mt-4 flex items-center gap-4 text-blue-100 text-xs">
                    <div class="flex items-center gap-1.5">
                        <div class="w-2 h-2 bg-green-400 rounded-full"></div>
                        <span>Online</span>
                    </div>
                    <div class="flex items-center gap-1.5">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                             stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                            <line x1="16" y1="2" x2="16" y2="6"/>
                            <line x1="8"  y1="2" x2="8"  y2="6"/>
                            <line x1="3"  y1="10" x2="21" y2="10"/>
                        </svg>
                        <span>{{ now()->format('d M Y') }}</span>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
