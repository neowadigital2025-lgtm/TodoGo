{{-- ==========================================================
Component : Note Card
Folder    : dashboard
Purpose   : Menampilkan satu card catatan dengan judul, preview, dan waktu.
            Reusable untuk Dashboard (Notes Section) maupun halaman Notes.

Props:
  $title   — Judul catatan (string)
  $preview — Teks preview isi catatan (string)
  $time    — Waktu pembuatan/update (string)
  $color   — Warna background card (Tailwind class, default: 'bg-slate-50')
  $href    — URL detail catatan (string, default: '#')
========================================================= --}}

@props([
    'title'   => '',
    'preview' => '',
    'time'    => '',
    'color'   => 'bg-slate-50',
    'href'    => '#',
])

@php
    $bgColors = [
        'bg-blue-500'   => 'bg-blue-50/70 hover:border-blue-300',
        'bg-green-500'  => 'bg-green-50/70 hover:border-green-300',
        'bg-purple-500' => 'bg-purple-50/70 hover:border-purple-300',
        'bg-orange-400' => 'bg-orange-50/70 hover:border-orange-300',
        'bg-red-500'    => 'bg-red-50/70 hover:border-red-300',
        'bg-slate-500'  => 'bg-slate-100/70 hover:border-slate-300',
        'bg-slate-50'   => 'bg-slate-50/70 hover:border-slate-300',
    ];
    $cardBg = $bgColors[$color] ?? $color;
@endphp

<a href="{{ $href }}" class="relative p-4 rounded-xl {{ $cardBg }} border border-transparent transition-all duration-300 cursor-pointer group hover:shadow-md hover:shadow-blue-500/5 hover:-translate-y-0.5 block">
    
    <div class="absolute top-0 right-0 p-2 opacity-0 group-hover:opacity-100 transition-opacity">
        <button class="p-1 text-slate-400 hover:text-slate-600 rounded">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
            </svg>
        </button>
    </div>

    <div class="flex justify-between items-start mb-2 pr-6">
        <h4 class="text-sm font-bold text-slate-800 group-hover:text-blue-600 transition-colors line-clamp-1">{{ $title }}</h4>
    </div>
    
    <p class="text-xs text-slate-600 line-clamp-2 leading-relaxed mb-3">
        {{ $preview }}
    </p>

    <div class="flex items-center text-[10px] font-semibold text-slate-400">
        <svg class="w-3 h-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        {{ $time }}
    </div>
</a>
