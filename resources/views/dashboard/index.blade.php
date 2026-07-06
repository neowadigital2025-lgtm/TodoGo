@extends('layouts.app')

@section('title', 'Beranda')

@section('content')

@php
/* ── Static placeholder data ─────────────────────────────────────────────
 * Replace these arrays with real model data once Tasks / Workspaces
 * migrations exist. The component API stays the same.
 * ──────────────────────────────────────────────────────────────────────── */

$stats = [
    [
        'label'      => 'Total Tugas',
        'value'      => '24',
        'trend'      => '↑ 12% dari minggu lalu',
        'trendUp'    => true,
        'iconColor'  => 'bg-blue-50',
        'iconStroke' => 'text-blue-500',
        'icon'       => '<rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                         <line x1="16" y1="2" x2="16" y2="6"/>
                         <line x1="8"  y1="2" x2="8"  y2="6"/>
                         <line x1="3"  y1="10" x2="21" y2="10"/>',
    ],
    [
        'label'      => 'Selesai',
        'value'      => '16',
        'trend'      => '↑ 8% dari minggu lalu',
        'trendUp'    => true,
        'iconColor'  => 'bg-green-50',
        'iconStroke' => 'text-green-500',
        'icon'       => '<polyline points="9 11 12 14 22 4"/>
                         <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/>',
    ],
    [
        'label'      => 'Dalam Proses',
        'value'      => '6',
        'trend'      => '↓ 2% dari minggu lalu',
        'trendUp'    => false,
        'iconColor'  => 'bg-orange-50',
        'iconStroke' => 'text-orange-400',
        'icon'       => '<circle cx="12" cy="12" r="10"/>
                         <polyline points="12 6 12 12 16 14"/>',
    ],
    [
        'label'      => 'Deadline Hari Ini',
        'value'      => '3',
        'trendNote'  => 'Jangan lupa selesaikan!',
        'iconColor'  => 'bg-purple-50',
        'iconStroke' => 'text-purple-400',
        'icon'       => '<rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                         <line x1="16" y1="2" x2="16" y2="6"/>
                         <line x1="8"  y1="2" x2="8"  y2="6"/>
                         <line x1="3"  y1="10" x2="21" y2="10"/>',
    ],
];

$tasks = [
    [
        'title'         => 'Membuat desain landing page',
        'workspace'     => 'TodoGo Development',
        'priority'      => 'Tinggi',
        'priorityColor' => 'text-red-500 bg-red-50',
        'date'          => '23 Mei 2025',
        'done'          => false,
    ],
    [
        'title'         => 'Riset kompetitor aplikasi to-do list',
        'workspace'     => 'TodoGo Development',
        'priority'      => 'Selesai',
        'priorityColor' => 'text-green-600 bg-green-50',
        'date'          => '21 Mei 2025',
        'done'          => true,
    ],
    [
        'title'         => 'Implementasi sidebar dashboard',
        'workspace'     => 'TodoGo Development',
        'priority'      => 'Sedang',
        'priorityColor' => 'text-yellow-600 bg-yellow-50',
        'date'          => '24 Mei 2025',
        'done'          => false,
    ],
    [
        'title'         => 'Integrasi payment gateway',
        'workspace'     => 'TodoGo Development',
        'priority'      => 'Tinggi',
        'priorityColor' => 'text-red-500 bg-red-50',
        'date'          => '27 Mei 2025',
        'done'          => false,
    ],
    [
        'title'         => 'Persiapan presentasi skripsi',
        'workspace'     => 'Skripsi',
        'priority'      => 'Rendah',
        'priorityColor' => 'text-slate-500 bg-slate-100',
        'date'          => '30 Mei 2025',
        'done'          => false,
    ],
];

$workspaces = [
    ['name' => 'TodoGo Development', 'taskCount' => 12, 'color' => 'bg-blue-500',   'memberCount' => 5],
    ['name' => 'Skripsi',            'taskCount' => 8,  'color' => 'bg-green-500',  'memberCount' => 2],
    ['name' => 'Organisasi Kampus',  'taskCount' => 5,  'color' => 'bg-purple-500', 'memberCount' => 3],
    ['name' => 'Pribadi',            'taskCount' => 3,  'color' => 'bg-orange-400', 'memberCount' => 1],
];

$deadlines = [
    [
        'title'        => 'Membuat desain landing page',
        'workspace'    => 'TodoGo Development',
        'date'         => '23 Mei',
        'urgency'      => 'Besok',
        'urgencyColor' => 'text-red-500',
        'dotColor'     => 'bg-red-400',
    ],
    [
        'title'        => 'Implementasi sidebar dashboard',
        'workspace'    => 'TodoGo Development',
        'date'         => '24 Mei',
        'urgency'      => '2 hari lagi',
        'urgencyColor' => 'text-slate-400',
        'dotColor'     => 'bg-orange-400',
    ],
    [
        'title'        => 'Integrasi payment gateway',
        'workspace'    => 'TodoGo Development',
        'date'         => '27 Mei',
        'urgency'      => '5 hari lagi',
        'urgencyColor' => 'text-slate-400',
        'dotColor'     => 'bg-purple-400',
    ],
];

$chartDays = ['Sen', 'Sal', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'];
$chartBars = [55, 70, 60, 90, 75, 45, 30];
$chartMax  = max($chartBars);
@endphp

{{-- ══════════════════════════════════════════════════════════════════════
     Page wrapper
══════════════════════════════════════════════════════════════════════ --}}
<div class="max-w-screen-xl mx-auto space-y-6">

    {{-- ── 1. Greeting ─────────────────────────────────────────────── --}}
    <x-dashboard.welcome-card />

    {{-- ── 2. Stats row ─────────────────────────────────────────────── --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        @foreach ($stats as $stat)
            <x-dashboard.stats-card
                :label="$stat['label']"
                :value="$stat['value']"
                :trend="$stat['trend'] ?? null"
                :trendUp="$stat['trendUp'] ?? true"
                :trendNote="$stat['trendNote'] ?? null"
                :iconColor="$stat['iconColor']"
                :iconStroke="$stat['iconStroke']"
                :icon="$stat['icon']" />
        @endforeach
    </div>

    {{-- ── 3. Main grid ─────────────────────────────────────────────── --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- ── Left column (2/3 width) ──────────────────────────────── --}}
        <div class="lg:col-span-2 space-y-6">

            {{-- Recent tasks --}}
            <div class="bg-white border border-slate-100 rounded-xl overflow-hidden">

                {{-- Header --}}
                <div class="flex items-center justify-between px-5 py-4 border-b border-slate-100">
                    <h2 class="text-sm font-semibold text-slate-800">Tugas Terbaru</h2>
                    <a href="#" class="text-xs font-medium text-blue-600 hover:underline">
                        Lihat Semua
                    </a>
                </div>

                {{-- Task list --}}
                <ul class="divide-y divide-slate-50">
                    @foreach ($tasks as $task)
                        <x-dashboard.task-card
                            :title="$task['title']"
                            :workspace="$task['workspace']"
                            :priority="$task['priority']"
                            :priorityColor="$task['priorityColor']"
                            :date="$task['date']"
                            :done="$task['done']" />
                    @endforeach
                </ul>

            </div>

            {{-- Active workspaces --}}
            <div class="bg-white border border-slate-100 rounded-xl overflow-hidden">

                {{-- Header --}}
                <div class="flex items-center justify-between px-5 py-4 border-b border-slate-100">
                    <h2 class="text-sm font-semibold text-slate-800">Workspace Aktif</h2>
                    <a href="#" class="text-xs font-medium text-blue-600 hover:underline">
                        Lihat Semua
                    </a>
                </div>

                {{-- Grid of workspace cards, separated by hairline --}}
                <div class="grid grid-cols-2 sm:grid-cols-4 divide-x divide-y divide-slate-100">
                    @foreach ($workspaces as $ws)
                        <x-dashboard.workspace-card
                            :name="$ws['name']"
                            :taskCount="$ws['taskCount']"
                            :color="$ws['color']"
                            :memberCount="$ws['memberCount']" />
                    @endforeach
                </div>

            </div>

        </div>{{-- /left column --}}

        {{-- ── Right column (1/3 width) ─────────────────────────────── --}}
        <div class="space-y-6">

            {{-- Weekly progress --}}
            <div class="bg-white border border-slate-100 rounded-xl p-5">

                <div class="flex items-center justify-between">
                    <h2 class="text-sm font-semibold text-slate-800">Progress Mingguan</h2>
                    <a href="#" class="text-xs font-medium text-blue-600 hover:underline">
                        Lihat Laporan
                    </a>
                </div>

                {{-- Percentage --}}
                <p class="mt-4 text-3xl font-bold text-blue-600 leading-none">67%</p>
                <p class="mt-1 mb-3 text-xs text-slate-400">Produktivitas minggu ini</p>

                {{-- Progress bar --}}
                <div class="w-full h-1.5 bg-slate-100 rounded-full overflow-hidden mb-5">
                    <div class="h-full bg-blue-600 rounded-full" style="width: 67%"></div>
                </div>

                {{-- Bar chart --}}
                <div class="flex items-end gap-1.5 h-20">
                    @foreach ($chartDays as $i => $day)
                        @php $pct = round(($chartBars[$i] / $chartMax) * 100); @endphp
                        <div class="flex-1 flex flex-col items-center gap-1.5 h-full justify-end">
                            <div class="w-full rounded-t
                                        {{ $i === 3 ? 'bg-blue-600' : 'bg-blue-100' }}"
                                 style="height: {{ $pct }}%"></div>
                            <span class="text-[10px] text-slate-400 shrink-0">{{ $day }}</span>
                        </div>
                    @endforeach
                </div>

                {{-- Y-axis labels --}}
                <div class="flex justify-between text-[10px] text-slate-300 mt-1">
                    <span>0%</span>
                    <span>50%</span>
                    <span>100%</span>
                </div>

            </div>

            {{-- Upcoming deadlines --}}
            <div class="bg-white border border-slate-100 rounded-xl overflow-hidden">

                {{-- Header --}}
                <div class="flex items-center justify-between px-5 py-4 border-b border-slate-100">
                    <h2 class="text-sm font-semibold text-slate-800">Deadline Mendatang</h2>
                    <a href="#" class="text-xs font-medium text-blue-600 hover:underline">
                        Lihat Kalender
                    </a>
                </div>

                {{-- Deadline list --}}
                <ul class="divide-y divide-slate-50">
                    @foreach ($deadlines as $dl)
                        <x-dashboard.deadline-card
                            :title="$dl['title']"
                            :workspace="$dl['workspace']"
                            :date="$dl['date']"
                            :urgency="$dl['urgency']"
                            :urgencyColor="$dl['urgencyColor']"
                            :dotColor="$dl['dotColor']" />
                    @endforeach
                </ul>

            </div>

        </div>{{-- /right column --}}

    </div>{{-- /main grid --}}

</div>{{-- /page wrapper --}}

@endsection
