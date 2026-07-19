@extends('layouts.app')

@section('title', 'Notifikasi')

@section('content')
@php
$groups = [
    'Hari Ini' => [
        ['icon_bg'=>'bg-blue-100',  'icon_color'=>'text-blue-600',  'icon'=>'<polyline points="9 11 12 14 22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/>',  'title'=>'Tugas baru ditugaskan',          'body'=>'Membuat desain landing page ditambahkan ke TodoGo Development.', 'time'=>'2 menit lalu',   'read'=>false],
        ['icon_bg'=>'bg-green-100', 'icon_color'=>'text-green-600', 'icon'=>'<polyline points="20 6 9 17 4 12"/>',                                                                          'title'=>'Tugas selesai',                  'body'=>'Riset kompetitor telah ditandai selesai.',                        'time'=>'1 jam lalu',     'read'=>false],
        ['icon_bg'=>'bg-purple-100','icon_color'=>'text-purple-600','icon'=>'<path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>','title'=>'Anggota baru bergabung',        'body'=>'Budi Santoso bergabung ke workspace TodoGo Development.',        'time'=>'3 jam lalu',     'read'=>false],
        ['icon_bg'=>'bg-orange-100','icon_color'=>'text-orange-600','icon'=>'<path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/>',             'title'=>'Pengingat deadline',             'body'=>'Integrasi payment gateway jatuh tempo dalam 5 hari.',            'time'=>'5 jam lalu',     'read'=>true],
    ],
    'Kemarin' => [
        ['icon_bg'=>'bg-blue-100',  'icon_color'=>'text-blue-600',  'icon'=>'<path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>',                                  'title'=>'Komentar baru',                  'body'=>'Andi meninggalkan komentar di Implementasi sidebar.',             'time'=>'Kemarin 14:20', 'read'=>true],
        ['icon_bg'=>'bg-red-100',   'icon_color'=>'text-red-500',   'icon'=>'<circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/>','title'=>'Deadline terlewat',          'body'=>'Review UI homepage sudah melewati tanggal jatuh tempo.',         'time'=>'Kemarin 09:00', 'read'=>true],
    ],
    'Minggu Ini' => [
        ['icon_bg'=>'bg-yellow-100','icon_color'=>'text-yellow-600','icon'=>'<polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>','title'=>'Langganan diperpanjang',    'body'=>'Plan Pro kamu diperpanjang hingga 1 Juli 2025.',                 'time'=>'3 hari lalu',   'read'=>true],
        ['icon_bg'=>'bg-green-100', 'icon_color'=>'text-green-600', 'icon'=>'<polyline points="20 6 9 17 4 12"/>',                                                                          'title'=>'Sprint selesai',                 'body'=>'Sprint 12 TodoGo Development berhasil diselesaikan.',            'time'=>'5 hari lalu',   'read'=>true],
    ],
];
$unreadCount = collect($groups)->flatten(1)->where('read', false)->count();
@endphp

<div class="max-w-screen-xl mx-auto space-y-6">

    {{-- Header --}}
    <div class="flex items-center justify-between gap-4">
        <div>
            <div class="flex items-center gap-2">
                <h1 class="text-xl font-bold text-slate-800">Notifikasi</h1>
                @if ($unreadCount > 0)
                    <span class="inline-flex items-center justify-center min-w-[22px] h-[22px] px-1.5
                                 rounded-full bg-blue-600 text-white text-[11px] font-bold">
                        {{ $unreadCount }}
                    </span>
                @endif
            </div>
            <p class="mt-0.5 text-sm text-slate-500">Semua pemberitahuan terbaru untukmu.</p>
        </div>
        <button class="text-sm font-medium text-blue-600 hover:text-blue-700 transition-colors shrink-0">
            Tandai Semua Dibaca
        </button>
    </div>

    {{-- Filter tabs --}}
    <div class="flex items-center gap-1 p-1 bg-white border border-slate-200 rounded-lg w-fit"
         x-data="{ tab: 'all' }">
        @foreach(['all'=>'Semua','unread'=>'Belum Dibaca','mention'=>'Mention'] as $key => $label)
        <button @click="tab = '{{ $key }}'"
                :class="tab === '{{ $key }}' ? 'bg-slate-100 text-slate-800 shadow-sm' : 'text-slate-500 hover:text-slate-700'"
                class="px-3 py-1.5 rounded-md text-sm font-medium transition-all">
            {{ $label }}
        </button>
        @endforeach
    </div>

    {{-- Notification groups --}}
    <div class="space-y-6">
        @foreach ($groups as $groupLabel => $notifs)
        <div>
            <p class="text-[11px] font-semibold uppercase tracking-widest text-slate-400 mb-3">
                {{ $groupLabel }}
            </p>
            <div class="bg-white border border-slate-100 rounded-xl overflow-hidden">
                <ul class="divide-y divide-slate-50">
                    @foreach ($notifs as $n)
                    <li class="flex items-start gap-4 px-5 py-4
                               hover:bg-slate-50 transition-colors duration-150
                               {{ !$n['read'] ? 'bg-blue-50/40' : '' }}">

                        {{-- Icon --}}
                        <div class="w-9 h-9 rounded-xl {{ $n['icon_bg'] }} flex items-center justify-center shrink-0 mt-0.5">
                            <svg class="w-4 h-4 {{ $n['icon_color'] }}" viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                {!! $n['icon'] !!}
                            </svg>
                        </div>

                        {{-- Content --}}
                        <div class="flex-1 min-w-0">
                            <div class="flex items-start justify-between gap-2">
                                <p class="text-sm font-semibold text-slate-800 leading-snug">
                                    {{ $n['title'] }}
                                    @if (!$n['read'])
                                        <span class="inline-block w-1.5 h-1.5 rounded-full bg-blue-600 mb-0.5 ml-1"></span>
                                    @endif
                                </p>
                                <span class="text-[11px] text-slate-400 shrink-0 whitespace-nowrap">{{ $n['time'] }}</span>
                            </div>
                            <p class="text-xs text-slate-500 mt-0.5 leading-relaxed">{{ $n['body'] }}</p>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endforeach
    </div>

</div>
@endsection
