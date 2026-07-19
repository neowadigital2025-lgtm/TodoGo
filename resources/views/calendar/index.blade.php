@extends('layouts.app')

@section('title', 'Kalender')

@section('content')
@php
$monthName = 'Mei 2025';
$startDow  = 3; // Wednesday (0=Sun)
$daysInMonth = 31;
$today = 22;

$events = [
    4  => [['title'=>'Review desain','color'=>'bg-blue-500']],
    8  => [['title'=>'Meeting tim','color'=>'bg-purple-500']],
    12 => [['title'=>'Deadline skripsi','color'=>'bg-red-500']],
    15 => [['title'=>'Presentasi','color'=>'bg-green-500']],
    19 => [['title'=>'Deploy staging','color'=>'bg-orange-400']],
    22 => [['title'=>'Sprint review','color'=>'bg-blue-500'],['title'=>'1:1 mentor','color'=>'bg-pink-400']],
    27 => [['title'=>'Payment gateway','color'=>'bg-red-500']],
    30 => [['title'=>'Bulan baru','color'=>'bg-green-500']],
];

$upcoming = [
    ['title'=>'Sprint review','date'=>'22 Mei','time'=>'10:00','color'=>'bg-blue-500'],
    ['title'=>'Payment gateway deadline','date'=>'27 Mei','time'=>'23:59','color'=>'bg-red-500'],
    ['title'=>'Buat dokumentasi API','date'=>'01 Jun','time'=>'17:00','color'=>'bg-purple-500'],
    ['title'=>'Presentasi akhir skripsi','date'=>'05 Jun','time'=>'09:00','color'=>'bg-green-500'],
];
@endphp

<div class="max-w-screen-xl mx-auto space-y-6">

    {{-- Header --}}
    <x-ui.section-header
        title="Kalender"
        description="Lihat jadwal dan deadline tugasmu." />

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- ── Calendar grid (2/3) ──────────────────────────────────── --}}
        <div class="lg:col-span-2 bg-white border border-slate-100 rounded-xl overflow-hidden">

            {{-- Month nav --}}
            <div class="flex items-center justify-between px-5 py-4 border-b border-slate-100">
                <button class="p-1.5 rounded-lg hover:bg-slate-100 text-slate-500 transition-colors">
                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="15 18 9 12 15 6"/>
                    </svg>
                </button>
                <h2 class="text-sm font-bold text-slate-800">{{ $monthName }}</h2>
                <button class="p-1.5 rounded-lg hover:bg-slate-100 text-slate-500 transition-colors">
                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="9 18 15 12 9 6"/>
                    </svg>
                </button>
            </div>

            {{-- Day headers --}}
            <div class="grid grid-cols-7 border-b border-slate-100">
                @foreach(['Min','Sen','Sel','Rab','Kam','Jum','Sab'] as $d)
                <div class="py-2.5 text-center text-[11px] font-semibold uppercase tracking-wide text-slate-400">
                    {{ $d }}
                </div>
                @endforeach
            </div>

            {{-- Day cells --}}
            <div class="grid grid-cols-7">
                @php $cell = 0; @endphp

                {{-- Leading empty cells --}}
                @for ($e = 0; $e < $startDow; $e++)
                    <div class="min-h-[80px] border-b border-r border-slate-50 bg-slate-50/40 p-1.5"></div>
                    @php $cell++; @endphp
                @endfor

                {{-- Day cells --}}
                @for ($day = 1; $day <= $daysInMonth; $day++)
                    @php
                        $isToday  = $day === $today;
                        $hasEvent = isset($events[$day]);
                        $col = $cell % 7;
                        $isLastCol = $col === 6;
                    @endphp
                    <div class="min-h-[80px] border-b {{ $isLastCol ? '' : 'border-r' }} border-slate-100
                                p-1.5 {{ $isToday ? 'bg-blue-50' : 'hover:bg-slate-50' }} transition-colors">
                        <span class="inline-flex items-center justify-center w-6 h-6 text-xs font-semibold
                                     rounded-full mb-1
                                     {{ $isToday ? 'bg-blue-600 text-white' : 'text-slate-600' }}">
                            {{ $day }}
                        </span>
                        @if ($hasEvent)
                            @foreach ($events[$day] as $ev)
                                <div class="text-[10px] font-medium text-white px-1.5 py-0.5 rounded
                                            {{ $ev['color'] }} truncate mb-0.5">
                                    {{ $ev['title'] }}
                                </div>
                            @endforeach
                        @endif
                    </div>
                    @php $cell++; @endphp
                @endfor

                {{-- Trailing cells --}}
                @php $remaining = 7 - ($cell % 7 === 0 ? 7 : $cell % 7); @endphp
                @if ($remaining < 7)
                    @for ($t = 0; $t < $remaining; $t++)
                        <div class="min-h-[80px] border-b border-r border-slate-50 bg-slate-50/40 p-1.5"></div>
                    @endfor
                @endif
            </div>
        </div>

        {{-- ── Right panel (1/3) ────────────────────────────────────── --}}
        <div class="space-y-4">

            {{-- Today card --}}
            <div class="bg-white border border-slate-100 rounded-xl p-5">
                <p class="text-[11px] font-semibold uppercase tracking-widest text-slate-400 mb-1">Hari Ini</p>
                <p class="text-2xl font-bold text-slate-800">{{ $today }} Mei 2025</p>
                <p class="text-sm text-slate-500 mt-0.5">Kamis</p>

                <div class="mt-4 space-y-2">
                    @foreach ($events[$today] ?? [] as $ev)
                    <div class="flex items-center gap-2.5 p-2.5 rounded-lg bg-slate-50">
                        <span class="w-2 h-2 rounded-full {{ $ev['color'] }} shrink-0"></span>
                        <span class="text-sm text-slate-700 font-medium">{{ $ev['title'] }}</span>
                    </div>
                    @endforeach
                    @if (empty($events[$today]))
                        <p class="text-sm text-slate-400">Tidak ada event hari ini.</p>
                    @endif
                </div>
            </div>

            {{-- Upcoming --}}
            <div class="bg-white border border-slate-100 rounded-xl overflow-hidden">
                <div class="px-5 py-4 border-b border-slate-100">
                    <h3 class="text-sm font-semibold text-slate-800">Mendatang</h3>
                </div>
                <ul class="divide-y divide-slate-50">
                    @foreach ($upcoming as $ev)
                    <li class="flex items-center gap-3 px-5 py-3 hover:bg-slate-50 transition-colors">
                        <span class="w-2 h-2 rounded-full {{ $ev['color'] }} shrink-0"></span>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-slate-800 truncate">{{ $ev['title'] }}</p>
                            <p class="text-xs text-slate-400">{{ $ev['date'] }} · {{ $ev['time'] }}</p>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>

        </div>
    </div>
</div>
@endsection
