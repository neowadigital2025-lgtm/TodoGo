@extends('layouts.app')

@section('title', 'Pencarian')

@section('content')
@php
$recent = ['Desain landing page','Payment gateway','Skripsi bab 3','Sprint review','TodoGo Development'];
$suggested = [
    ['title'=>'Membuat desain landing page',    'type'=>'Tugas',      'workspace'=>'TodoGo Development','icon_bg'=>'bg-blue-50',  'icon_color'=>'text-blue-600'],
    ['title'=>'TodoGo Development',             'type'=>'Workspace',  'workspace'=>'5 anggota',         'icon_bg'=>'bg-green-50', 'icon_color'=>'text-green-600'],
    ['title'=>'Implementasi sidebar dashboard', 'type'=>'Tugas',      'workspace'=>'TodoGo Development','icon_bg'=>'bg-blue-50',  'icon_color'=>'text-blue-600'],
    ['title'=>'Persiapan presentasi skripsi',   'type'=>'Tugas',      'workspace'=>'Skripsi',           'icon_bg'=>'bg-purple-50','icon_color'=>'text-purple-600'],
    ['title'=>'Skripsi',                        'type'=>'Workspace',  'workspace'=>'2 anggota',         'icon_bg'=>'bg-orange-50','icon_color'=>'text-orange-500'],
];
@endphp

<div class="max-w-2xl mx-auto space-y-6">

    <x-ui.section-header title="Pencarian" description="Temukan tugas, workspace, atau anggota." />

    {{-- Search input --}}
    <div class="relative">
        <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-slate-400 pointer-events-none"
             viewBox="0 0 24 24" fill="none" stroke="currentColor"
             stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>
        </svg>
        <input type="text" placeholder="Cari tugas, workspace, anggota..."
               autofocus
               class="w-full pl-12 pr-14 py-3.5 text-sm bg-white border border-slate-200 rounded-xl
                      focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent
                      placeholder-slate-400 shadow-sm transition" />
        <kbd class="absolute right-4 top-1/2 -translate-y-1/2 hidden sm:flex items-center gap-0.5
                    px-1.5 py-0.5 rounded text-[10px] font-medium text-slate-400
                    bg-slate-50 border border-slate-200 font-mono pointer-events-none">
            ESC
        </kbd>
    </div>

    {{-- Filter chips --}}
    <div class="flex items-center gap-2 flex-wrap" x-data="{ filter: 'all' }">
        @foreach(['all'=>'Semua','task'=>'Tugas','workspace'=>'Workspace','member'=>'Anggota'] as $k => $v)
        <button @click="filter = '{{ $k }}'"
                :class="filter === '{{ $k }}' ? 'bg-blue-600 text-white border-blue-600' : 'bg-white text-slate-600 border-slate-200 hover:border-slate-300'"
                class="px-3 py-1.5 text-xs font-medium border rounded-full transition-colors duration-150">
            {{ $v }}
        </button>
        @endforeach
    </div>

    {{-- Recent searches --}}
    <div class="bg-white border border-slate-100 rounded-xl overflow-hidden">
        <div class="flex items-center justify-between px-5 py-3.5 border-b border-slate-100">
            <p class="text-xs font-semibold uppercase tracking-widest text-slate-400">Pencarian Terbaru</p>
            <button class="text-xs text-blue-600 hover:text-blue-700 font-medium transition-colors">
                Hapus Semua
            </button>
        </div>
        <ul class="divide-y divide-slate-50">
            @foreach ($recent as $q)
            <li class="flex items-center gap-3 px-5 py-3 hover:bg-slate-50
                       transition-colors duration-150 cursor-pointer group">
                <svg class="w-4 h-4 text-slate-300 shrink-0" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"/>
                    <polyline points="12 6 12 12 16 14"/>
                </svg>
                <span class="flex-1 text-sm text-slate-700">{{ $q }}</span>
                <button class="text-slate-300 hover:text-slate-500 opacity-0 group-hover:opacity-100
                               transition-all">
                    <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/>
                    </svg>
                </button>
            </li>
            @endforeach
        </ul>
    </div>

    {{-- Suggested results --}}
    <div class="bg-white border border-slate-100 rounded-xl overflow-hidden">
        <div class="px-5 py-3.5 border-b border-slate-100">
            <p class="text-xs font-semibold uppercase tracking-widest text-slate-400">Saran</p>
        </div>
        <ul class="divide-y divide-slate-50">
            @foreach ($suggested as $item)
            <li class="flex items-center gap-4 px-5 py-3.5 hover:bg-slate-50
                       transition-colors duration-150 cursor-pointer">
                <div class="w-9 h-9 rounded-xl {{ $item['icon_bg'] }} flex items-center
                            justify-center shrink-0">
                    <svg class="w-4 h-4 {{ $item['icon_color'] }}" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                        @if ($item['type'] === 'Workspace')
                            <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/>
                        @else
                            <polyline points="9 11 12 14 22 4"/>
                            <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/>
                        @endif
                    </svg>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-semibold text-slate-800 truncate">{{ $item['title'] }}</p>
                    <p class="text-xs text-slate-400 mt-0.5">{{ $item['workspace'] }}</p>
                </div>
                <x-ui.badge color="{{ $item['type'] === 'Workspace' ? 'green' : 'blue' }}">
                    {{ $item['type'] }}
                </x-ui.badge>
            </li>
            @endforeach
        </ul>
    </div>

    {{-- Empty state (shown when search has no results) --}}
    <div class="hidden">
        <x-ui.empty-state
            title="Tidak ada hasil ditemukan"
            description="Coba kata kunci lain atau periksa ejaanmu."
            icon='<circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>' />
    </div>

</div>
@endsection
