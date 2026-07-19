{{-- ════════════════════════════════════════════════════════
     Mobile Sidebar Drawer  ·  Alpine: sidebarOpen
     Slides in from the left, lg:hidden
════════════════════════════════════════════════════════ --}}

@php
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
        'label' => 'Notifikasi',
        'href'  => route('notifications'),
        'route' => 'notifications',
        'badge' => 3,
        'icon'  => '<path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/>
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

<aside
    x-show="sidebarOpen"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 -translate-x-full"
    x-transition:enter-end="opacity-100 translate-x-0"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100 translate-x-0"
    x-transition:leave-end="opacity-0 -translate-x-full"
    @click.outside="sidebarOpen = false"
    class="fixed inset-y-0 left-0 z-50 w-72 bg-white border-r border-slate-100 flex flex-col lg:hidden shadow-2xl"
>

    {{-- ── Logo + close ─────────────────────────────────────────────── --}}
    <div class="flex items-center justify-between h-16 px-5 border-b border-slate-100 shrink-0">
        <div class="flex items-center gap-3">
            <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center shrink-0">
                <svg class="w-4 h-4 text-white" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="20 6 9 17 4 12"/>
                </svg>
            </div>
            <span class="text-[17px] font-bold text-slate-800 tracking-tight">TodoGo</span>
        </div>

        <button @click="sidebarOpen = false"
                class="p-1.5 rounded-lg text-slate-400 hover:text-slate-700 hover:bg-slate-100
                       transition-colors duration-150">
            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="18" y1="6"  x2="6"  y2="18"/>
                <line x1="6"  y1="6"  x2="18" y2="18"/>
            </svg>
        </button>
    </div>

    {{-- ── Navigation ───────────────────────────────────────────────── --}}
    <nav class="flex-1 overflow-y-auto py-4 px-3 flex flex-col gap-6">

        {{-- Main --}}
        <div class="space-y-0.5">
            <p class="px-3 mb-1.5 text-[10px] font-semibold uppercase tracking-widest text-slate-400">
                Menu
            </p>
            @foreach ($navMain as $item)
                @php $active = request()->routeIs($item['route']); @endphp
                <a href="{{ $item['href'] }}"
                   @click="sidebarOpen = false"
                   class="group flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium
                          transition-colors duration-150
                          {{ $active
                              ? 'bg-blue-50 text-blue-600'
                              : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                    <svg class="w-[18px] h-[18px] shrink-0 transition-colors duration-150
                                {{ $active ? 'text-blue-600' : 'text-slate-400 group-hover:text-slate-600' }}"
                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                         stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                        {!! $item['icon'] !!}
                    </svg>
                    <span class="flex-1">{{ $item['label'] }}</span>
                    @if ($active)
                        <span class="w-1.5 h-1.5 rounded-full bg-blue-600 shrink-0"></span>
                    @endif
                </a>
            @endforeach
        </div>

        {{-- Secondary --}}
        <div class="space-y-0.5">
            <p class="px-3 mb-1.5 text-[10px] font-semibold uppercase tracking-widest text-slate-400">
                Lainnya
            </p>
            @foreach ($navSecondary as $item)
                @php $active = request()->routeIs($item['route']); @endphp
                <a href="{{ $item['href'] }}"
                   @click="sidebarOpen = false"
                   class="group flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium
                          transition-colors duration-150
                          {{ $active
                              ? 'bg-blue-50 text-blue-600'
                              : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                    <svg class="w-[18px] h-[18px] shrink-0 transition-colors duration-150
                                {{ $active ? 'text-blue-600' : 'text-slate-400 group-hover:text-slate-600' }}"
                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                         stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                        {!! $item['icon'] !!}
                    </svg>
                    <span class="flex-1">{{ $item['label'] }}</span>
                    @if (!empty($item['badge']))
                        <span class="flex items-center justify-center min-w-[18px] h-[18px] px-1
                                     rounded-full bg-blue-600 text-white text-[10px] font-semibold shrink-0">
                            {{ $item['badge'] }}
                        </span>
                    @endif
                </a>
            @endforeach
        </div>

        {{-- System --}}
        <div class="space-y-0.5">
            <p class="px-3 mb-1.5 text-[10px] font-semibold uppercase tracking-widest text-slate-400">
                Sistem
            </p>
            @foreach ($navSystem as $item)
                @php $active = request()->routeIs($item['route']); @endphp
                <a href="{{ $item['href'] }}"
                   @click="sidebarOpen = false"
                   class="group flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium
                          transition-colors duration-150
                          {{ $active
                              ? 'bg-blue-50 text-blue-600'
                              : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                    <svg class="w-[18px] h-[18px] shrink-0 transition-colors duration-150
                                {{ $active ? 'text-blue-600' : 'text-slate-400 group-hover:text-slate-600' }}"
                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                         stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                        {!! $item['icon'] !!}
                    </svg>
                    <span class="flex-1">{{ $item['label'] }}</span>
                </a>
            @endforeach

            {{-- Keluar --}}
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                        class="group w-full flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium
                               text-slate-600 hover:bg-red-50 hover:text-red-600 transition-colors duration-150">
                    <svg class="w-[18px] h-[18px] shrink-0 text-slate-400 group-hover:text-red-500
                                transition-colors duration-150"
                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                         stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                        <polyline points="16 17 21 12 16 7"/>
                        <line x1="21" y1="12" x2="9" y2="12"/>
                    </svg>
                    <span class="flex-1 text-left">Keluar</span>
                </button>
            </form>
        </div>

    </nav>

    {{-- ── User footer ──────────────────────────────────────────────── --}}
    <div class="shrink-0 border-t border-slate-100 p-3">
        <div class="flex items-center gap-3 px-2 py-2 rounded-lg hover:bg-slate-50
                    transition-colors duration-150 cursor-default">
            <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name ?? 'User') }}&background=2563EB&color=fff&size=80&bold=true"
                 alt="{{ auth()->user()->name ?? 'User' }}"
                 class="w-8 h-8 rounded-full shrink-0 ring-2 ring-slate-100" />
            <div class="flex-1 min-w-0">
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
