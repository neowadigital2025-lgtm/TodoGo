@extends('layouts.app')

@section('title', 'Beranda')

@section('content')


<div class="max-w-screen-xl mx-auto space-y-6">

    {{-- ── 1. Greeting ─────────────────────────────────────────────── --}}
    <x-dashboard.welcome-card />
    
    {{-- ── 2. Stats section ───────────────────────────────────────── --}}
    <x-dashboard.stats-section />

    {{-- ── 3. Main grid ─────────────────────────────────────────────── --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 lg:gap-8">

        {{-- ── Left column (2/3 width) ──────────────────────────────── --}}
        <div class="lg:col-span-2 space-y-6 lg:space-y-8">

            {{-- Recent tasks --}}
            <div class="bg-white border border-slate-100 rounded-2xl shadow-sm overflow-hidden flex flex-col min-h-[300px]">

                {{-- Header --}}
                <div class="flex items-center justify-between px-6 py-5 border-b border-slate-100">
                    <h2 class="text-base font-bold text-slate-800">Tugas Terbaru</h2>
                    <a href="#" class="text-sm font-semibold text-blue-600 hover:text-blue-700 transition-colors">
                        Lihat Semua
                    </a>
                </div>

                {{-- Task list --}}
                <div class="p-6 flex-1 flex flex-col">
                    @if (empty($tasks))
                        <div class="flex-1 flex flex-col items-center justify-center text-center py-10">
                            <div class="w-32 h-32 mb-6 text-slate-200">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                                    <line x1="16" y1="2" x2="16" y2="6"/>
                                    <line x1="8" y1="2" x2="8" y2="6"/>
                                    <line x1="3" y1="10" x2="21" y2="10"/>
                                    <path d="M8 14h.01M12 14h.01M16 14h.01M8 18h.01M12 18h.01M16 18h.01"/>
                                </svg>
                            </div>
                            <h3 class="text-lg font-bold text-slate-800 mb-2">Hari ini masih kosong!</h3>
                            <p class="text-sm text-slate-500 max-w-sm mb-6">Kamu belum memiliki tugas apa pun. Mulai rencanakan harimu sekarang.</p>
                            <button class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-lg transition-colors shadow-sm">
                                Buat Tugas Pertama
                            </button>
                        </div>
                    @else
                        <ul class="flex flex-col gap-1">
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
                    @endif
                </div>

            </div>
            
            {{-- Workspace Overview --}}
            <div class="bg-white border border-slate-100 rounded-2xl shadow-sm overflow-hidden flex flex-col min-h-[250px]">

                {{-- Header --}}
                <div class="flex items-center justify-between px-6 py-5 border-b border-slate-100">
                    <h2 class="text-base font-bold text-slate-800">Ikhtisar Ruang Kerja</h2>
                    <a href="#" class="text-sm font-semibold text-blue-600 hover:text-blue-700 transition-colors">
                        Lihat Semua
                    </a>
                </div>

                <div class="p-6 flex-1 flex flex-col">
                    @if (empty($workspaces))
                        <div class="flex-1 flex flex-col items-center justify-center text-center py-8">
                            <div class="w-24 h-24 mb-4 text-slate-200">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/>
                                </svg>
                            </div>
                            <h3 class="text-base font-bold text-slate-800 mb-1.5">Belum ada ruang kerja</h3>
                            <p class="text-sm text-slate-500 mb-5">Semuanya berawal dari satu rencana besar.</p>
                            <button class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 text-sm font-semibold rounded-lg transition-colors">
                                Buat Ruang Kerja
                            </button>
                        </div>
                    @else
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            @foreach ($workspaces as $ws)
                                <x-dashboard.workspace-card
                                    :name="$ws['name']"
                                    :taskCount="$ws['taskCount']"
                                    :color="$ws['color']"
                                    :memberCount="$ws['memberCount']" />
                            @endforeach
                        </div>
                    @endif
                </div>

            </div>

        </div>{{-- /left column --}}

        {{-- ── Right column (1/3 width) ─────────────────────────────── --}}
        <div class="space-y-6 lg:space-y-8">

            {{-- Today's Notes --}}
            <div class="bg-white border border-slate-100 rounded-2xl shadow-sm overflow-hidden flex flex-col min-h-[250px]">
                
                {{-- Header --}}
                <div class="flex items-center justify-between px-6 py-5 border-b border-slate-100">
                    <h2 class="text-base font-bold text-slate-800">Catatan Hari Ini</h2>
                    <a href="#" class="text-sm font-semibold text-blue-600 hover:text-blue-700 transition-colors">
                        Tambah Baru
                    </a>
                </div>
                
                <div class="p-6 flex-1 flex flex-col">
                    @if (empty($todayNotes))
                        <div class="flex-1 flex flex-col items-center justify-center text-center py-6">
                            <div class="w-20 h-20 mb-4 text-slate-200">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16c0 1.1.9 2 2 2h12a2 2 0 0 0 2-2V8l-6-6z"/>
                                    <path d="M14 3v5h5M16 13H8M16 17H8M10 9H8"/>
                                </svg>
                            </div>
                            <h3 class="text-base font-bold text-slate-800 mb-1.5">Tidak ada catatan hari ini</h3>
                            <p class="text-sm text-slate-500 mb-5">Tulis sesuatu yang penting agar tidak terlupa.</p>
                            <button class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 text-sm font-semibold rounded-lg transition-colors">
                                Buat Catatan
                            </button>
                        </div>
                    @else
                        <div class="flex flex-col gap-3">
                            @foreach ($todayNotes as $note)
                                <div class="p-4 rounded-xl bg-slate-50 border border-slate-100 hover:border-blue-100 transition-colors cursor-pointer group">
                                    <div class="flex justify-between items-start mb-1.5">
                                        <h4 class="text-sm font-bold text-slate-800 group-hover:text-blue-600 transition-colors">{{ $note['title'] }}</h4>
                                        <span class="text-[10px] font-semibold text-slate-400">{{ $note['time'] }}</span>
                                    </div>
                                    <p class="text-xs text-slate-500 line-clamp-2 leading-relaxed">{{ $note['preview'] }}</p>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

            </div>

            {{-- Upcoming deadlines --}}
            <div class="bg-white border border-slate-100 rounded-2xl shadow-sm overflow-hidden flex flex-col min-h-[300px]">

                {{-- Header --}}
                <div class="flex items-center justify-between px-6 py-5 border-b border-slate-100">
                    <h2 class="text-base font-bold text-slate-800">Deadline Mendatang</h2>
                    <a href="#" class="text-sm font-semibold text-blue-600 hover:text-blue-700 transition-colors">
                        Lihat Kalender
                    </a>
                </div>

                {{-- Deadline list --}}
                <div class="p-6 flex-1 flex flex-col">
                    @if (empty($deadlines))
                        <div class="flex-1 flex flex-col items-center justify-center text-center py-6">
                            <div class="w-20 h-20 mb-4 text-slate-200">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10"/>
                                    <polyline points="12 6 12 12 16 14"/>
                                </svg>
                            </div>
                            <h3 class="text-base font-bold text-slate-800 mb-1.5">Aman terkendali!</h3>
                            <p class="text-sm text-slate-500">Tidak ada deadline yang mendekat dalam waktu dekat.</p>
                        </div>
                    @else
                        <ul class="flex flex-col gap-3">
                            @foreach ($deadlines as $dl)
                                <x-dashboard.deadline-card
                                    :title="$dl['title']"
                                    :workspace="$dl['workspace']"
                                    :date="$dl['date']"
                                    :urgency="$dl['urgency']"
                                    :urgencyColor="$dl['urgencyColor']"
                                    :priority="$dl['priority']"
                                    :priorityColor="$dl['priorityColor']" />
                            @endforeach
                        </ul>
                    @endif
                </div>

            </div>

        </div>{{-- /right column --}}

    </div>{{-- /main grid --}}

</div>{{-- /page wrapper --}}

@endsection