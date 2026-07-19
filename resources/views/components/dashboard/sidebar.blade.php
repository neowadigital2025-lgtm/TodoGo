{{-- ════════════════════════════════════════════════════════
    Desktop Sidebar  ·  Dynamic width  ·  hidden on mobile
════════════════════════════════════════════════════════ --}}

@php
/*
 * Nav structure:
 *   Main      — Beranda (route:dashboard), Tugas, Ruang Kerja, Kalender
 *   Secondary — Notifikasi, Langganan
 *   System    — Profil, Pengaturan, Bantuan, Keluar (logout POST)
 */

$navMain = [
    [
        'label' => 'Beranda',
        'href'  => route('dashboard'),
        'route' => 'dashboard',
        'icon'  => '<path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                    <polyline points="9 22 9 12 15 12 15 22"/>',
    ],
    [
        'label' => 'Tugas',
        'href'  => route('tasks'),
        'route' => 'tasks',
        'icon'  => '<polyline points="9 11 12 14 22 4"/>
                    <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/>',
    ],
    [
        'label' => 'Ruang Kerja',
        'href'  => route('workspaces'),
        'route' => 'workspaces',
        'icon'  => '<rect x="2" y="7" width="20" height="14" rx="2" ry="2"/>
                    <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/>',
    ],
    [
        'label' => 'Kalender',
        'href'  => route('calendar'),
        'route' => 'calendar',
        'icon'  => '<rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                    <line x1="16" y1="2" x2="16" y2="6"/>
                    <line x1="8"  y1="2" x2="8"  y2="6"/>
                    <line x1="3"  y1="10" x2="21" y2="10"/>',
    ],
];

$navSecondary = [
    [
        'label'  => 'Notifikasi',
        'href'   => route('notifications'),
        'route'  => 'notifications',
        'badge'  => 3,
        'icon'   => '<path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/>
                     <path d="M13.73 21a2 2 0 0 1-3.46 0"/>',
    ],
    [
        'label' => 'Langganan',
        'href'  => route('subscription'),
        'route' => 'subscription',
        'icon'  => '<path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>',
    ],
];

$navSystem = [
    [
        'label' => 'Profil',
        'href'  => route('profile'),
        'route' => 'profile',
        'icon'  => '<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                    <circle cx="12" cy="7" r="4"/>',
    ],
    [
        'label' => 'Pengaturan',
        'href'  => route('settings'),
        'route' => 'settings',
        'icon'  => '<circle cx="12" cy="12" r="3"/>
                    <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1-2.83 2.83l-.06-.06
                             a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0
                             v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06
                             a2 2 0 0 1-2.83-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15
                             a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09
                             A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06
                             a2 2 0 0 1 2.83-2.83l.06.06A1.65 1.65 0 0 0 9 4.68
                             a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09
                             a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06
                             a2 2 0 0 1 2.83 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9
                             a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09
                             a1.65 1.65 0 0 0-1.51 1z"/>',
    ],
    [
        'label' => 'Bantuan',
        'href'  => route('help'),
        'route' => 'help',
        'icon'  => '<circle cx="12" cy="12" r="10"/>
                    <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/>
                    <line x1="12" y1="17" x2="12.01" y2="17"/>',
    ],
];
@endphp

<aside :class="{ 'w-72': desktopSidebarOpen, 'w-20': !desktopSidebarOpen }" 
       class="fixed inset-y-0 left-0 z-40 w-72 bg-white border-r border-slate-100 flex-col hidden lg:flex transition-all duration-300">

    {{-- ── Logo ────────────────────────────────────────────────────── --}}
    <div class="flex items-center h-16 border-b border-slate-100 shrink-0 transition-all duration-300 overflow-hidden px-6 w-72" 
         :class="{ 'px-6 w-72': desktopSidebarOpen, 'px-0 w-20 justify-center': !desktopSidebarOpen }">
        <a href="{{ route('dashboard') }}" class="flex items-center gap-2">
            <img
                src="{{ asset('images/todogo-logo.png') }}"
                alt="TodoGo"
                class="w-10 h-10 rounded-lg object-cover object-top shrink-0">

            <span x-show="desktopSidebarOpen" 
                  x-transition:enter="transition-opacity ease-out duration-300 delay-150"
                  x-transition:enter-start="opacity-0"
                  x-transition:enter-end="opacity-100"
                  x-transition:leave="transition-opacity ease-in duration-100"
                  x-transition:leave-start="opacity-100"
                  x-transition:leave-end="opacity-0"
                  class="text-2xl font-bold text-slate-900 whitespace-nowrap">
                Todo<span class="text-blue-600">Go</span>
            </span>
        </a>
    </div>

    {{-- ── Navigation ──────────────────────────────────────────────── --}}
    <nav class="flex-1 overflow-y-auto overflow-x-hidden py-4 flex flex-col gap-6"
         :class="desktopSidebarOpen ? 'px-3' : 'px-2 items-center'">

        {{-- Main --}}
        <div class="space-y-1 w-full">
            <p x-show="desktopSidebarOpen" class="px-3 mb-1.5 text-[10px] font-semibold uppercase tracking-widest text-slate-400">
                Menu
            </p>
            <div x-show="!desktopSidebarOpen" class="h-3 w-full border-b border-slate-100 mb-2"></div>

            @foreach ($navMain as $item)
                @php $active = request()->routeIs($item['route']); @endphp
                <a href="{{ $item['href'] }}"
                   class="group relative flex items-center gap-3 py-2.5 rounded-lg text-sm font-medium transition-colors duration-150
                          {{ $active ? 'bg-blue-50 text-blue-600' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}"
                   :class="desktopSidebarOpen ? 'px-3 w-full' : 'px-0 justify-center w-12 h-10'">
                    <svg class="w-[18px] h-[18px] shrink-0 transition-colors duration-150
                                {{ $active ? 'text-blue-600' : 'text-slate-400 group-hover:text-slate-600' }}"
                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                         stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                        {!! $item['icon'] !!}
                    </svg>
                    
                    <span x-show="desktopSidebarOpen" class="flex-1 whitespace-nowrap">{{ $item['label'] }}</span>
                    
                    @if ($active)
                        <span x-show="desktopSidebarOpen" class="w-1.5 h-1.5 rounded-full bg-blue-600 shrink-0"></span>
                    @endif

                    {{-- Tooltip --}}
                    <div x-show="!desktopSidebarOpen" 
                         class="absolute left-full ml-3 px-2.5 py-1.5 bg-slate-800 text-white text-xs font-medium rounded-md shadow-sm opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap z-50 pointer-events-none">
                        {{ $item['label'] }}
                    </div>
                </a>
            @endforeach
        </div>

        {{-- Secondary --}}
        <div class="space-y-1 w-full">
            <p x-show="desktopSidebarOpen" class="px-3 mb-1.5 text-[10px] font-semibold uppercase tracking-widest text-slate-400">
                Lainnya
            </p>
            <div x-show="!desktopSidebarOpen" class="h-3 w-full border-b border-slate-100 mb-2"></div>

            @foreach ($navSecondary as $item)
                @php $active = request()->routeIs($item['route']); @endphp
                <a href="{{ $item['href'] }}"
                   class="group relative flex items-center gap-3 py-2.5 rounded-lg text-sm font-medium transition-colors duration-150
                          {{ $active ? 'bg-blue-50 text-blue-600' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}"
                   :class="desktopSidebarOpen ? 'px-3 w-full' : 'px-0 justify-center w-12 h-10'">
                    
                    <div class="relative flex items-center justify-center">
                        <svg class="w-[18px] h-[18px] shrink-0 transition-colors duration-150
                                    {{ $active ? 'text-blue-600' : 'text-slate-400 group-hover:text-slate-600' }}"
                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                             stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                            {!! $item['icon'] !!}
                        </svg>
                        
                        @if (!empty($item['badge']))
                            <span x-show="!desktopSidebarOpen" class="absolute -top-1.5 -right-1.5 flex items-center justify-center min-w-[14px] h-[14px] px-1 rounded-full bg-blue-600 text-white text-[8px] font-bold shrink-0">
                                {{ $item['badge'] }}
                            </span>
                        @endif
                    </div>
                    
                    <span x-show="desktopSidebarOpen" class="flex-1 whitespace-nowrap">{{ $item['label'] }}</span>
                    
                    @if (!empty($item['badge']))
                        <span x-show="desktopSidebarOpen" class="flex items-center justify-center min-w-[18px] h-[18px] px-1 rounded-full bg-blue-600 text-white text-[10px] font-semibold shrink-0">
                            {{ $item['badge'] }}
                        </span>
                    @endif

                    {{-- Tooltip --}}
                    <div x-show="!desktopSidebarOpen" 
                         class="absolute left-full ml-3 px-2.5 py-1.5 bg-slate-800 text-white text-xs font-medium rounded-md shadow-sm opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap z-50 pointer-events-none">
                        {{ $item['label'] }}
                    </div>
                </a>
            @endforeach
        </div>

        {{-- System --}}
        <div class="space-y-1 w-full">
            <p x-show="desktopSidebarOpen" class="px-3 mb-1.5 text-[10px] font-semibold uppercase tracking-widest text-slate-400">
                Sistem
            </p>
            <div x-show="!desktopSidebarOpen" class="h-3 w-full border-b border-slate-100 mb-2"></div>

            @foreach ($navSystem as $item)
                @php $active = request()->routeIs($item['route']); @endphp
                <a href="{{ $item['href'] }}"
                   class="group relative flex items-center gap-3 py-2.5 rounded-lg text-sm font-medium transition-colors duration-150
                          {{ $active ? 'bg-blue-50 text-blue-600' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}"
                   :class="desktopSidebarOpen ? 'px-3 w-full' : 'px-0 justify-center w-12 h-10'">
                    <svg class="w-[18px] h-[18px] shrink-0 transition-colors duration-150
                                {{ $active ? 'text-blue-600' : 'text-slate-400 group-hover:text-slate-600' }}"
                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                         stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                        {!! $item['icon'] !!}
                    </svg>
                    
                    <span x-show="desktopSidebarOpen" class="flex-1 whitespace-nowrap">{{ $item['label'] }}</span>

                    {{-- Tooltip --}}
                    <div x-show="!desktopSidebarOpen" 
                         class="absolute left-full ml-3 px-2.5 py-1.5 bg-slate-800 text-white text-xs font-medium rounded-md shadow-sm opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap z-50 pointer-events-none">
                        {{ $item['label'] }}
                    </div>
                </a>
            @endforeach

            {{-- Keluar --}}
            <form method="POST" action="{{ route('logout') }}" class="w-full">
                @csrf
                <button type="submit"
                        class="group relative w-full flex items-center gap-3 py-2.5 rounded-lg text-sm font-medium text-slate-600 hover:bg-red-50 hover:text-red-600 transition-colors duration-150"
                        :class="desktopSidebarOpen ? 'px-3' : 'px-0 justify-center h-10'">
                    <svg class="w-[18px] h-[18px] shrink-0 text-slate-400 group-hover:text-red-500 transition-colors duration-150"
                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                         stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                        <polyline points="16 17 21 12 16 7"/>
                        <line x1="21" y1="12" x2="9" y2="12"/>
                    </svg>
                    
                    <span x-show="desktopSidebarOpen" class="flex-1 text-left whitespace-nowrap">Keluar</span>

                    {{-- Tooltip --}}
                    <div x-show="!desktopSidebarOpen" 
                         class="absolute left-full ml-3 px-2.5 py-1.5 bg-slate-800 text-white text-xs font-medium rounded-md shadow-sm opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap z-50 pointer-events-none">
                        Keluar
                    </div>
                </button>
            </form>
        </div>

    </nav>

    {{-- ── User footer ─────────────────────────────────────────────── --}}
    <div class="shrink-0 border-t border-slate-100 transition-all duration-300"
         :class="desktopSidebarOpen ? 'p-3' : 'p-2'">
        <div class="flex items-center gap-3 rounded-lg hover:bg-slate-50 transition-colors duration-150 cursor-default"
             :class="desktopSidebarOpen ? 'px-2 py-2' : 'justify-center py-2'">
            
            <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name ?? 'User') }}&background=2563EB&color=fff&size=80&bold=true"
                 alt="{{ auth()->user()->name ?? 'User' }}"
                 class="w-8 h-8 rounded-full shrink-0 ring-2 ring-slate-100" />
            
            <div x-show="desktopSidebarOpen" class="flex-1 min-w-0">
                <p class="text-sm font-semibold text-slate-800 truncate leading-tight">
                    {{ auth()->user()->name ?? 'Pengguna' }}
                </p>
                <p class="text-xs text-slate-400 truncate leading-snug">
                    {{ auth()->user()->email ?? '' }}
                </p>
            </div>
        </div>
    </div>

</aside>
