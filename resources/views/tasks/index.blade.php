@extends('layouts.app')

@section('title', 'Tugas')

@section('content')

<div class="max-w-screen-xl mx-auto space-y-6" x-data="{ view: 'list' }">

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg relative" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    {{-- ── Header ──────────────────────────────────────────────────── --}}
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-xl font-bold text-slate-800">Semua Tugas</h1>
            <p class="mt-0.5 text-sm text-slate-500">Kelola dan pantau semua tugasmu di satu tempat.</p>
        </div>
        <div class="flex items-center gap-5">

        <a href="{{ route('tasks.create') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 hover:bg-blue-700
                       text-white text-sm font-medium rounded-lg transition-colors shadow-sm shrink-0">
            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                 stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/>
            </svg>
            Buat Tugas
        </a>
            @if($completedCount > 0)
            <form action="{{ route('tasks.destroyCompleted') }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus semua tugas yang sudah selesai? Tindakan ini tidak dapat dibatalkan.')">
            @csrf
            @method('DELETE')
                <button type="submit" class="inline-flex items-center gap-2 rounded-lg bg-red-600 px-4 py-2 text-sm font-medium text-blue-500 shadow-sm transition-all hover:bg-red-700 hover:shadow-md">
            {{-- Icon Trash --}}
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                    Hapus Semua Selesai ({{ $completedCount }})
                </button>
            </form>
            @endif
        </div>
    </div>

    {{-- ── Filter bar ───────────────────────────────────────────────── --}}
    <form method="GET" action="{{ route('tasks.index') }}" class="flex flex-col sm:flex-row items-start sm:items-center gap-3" id="filter-form">

        {{-- Search --}}
        <div class="relative flex-1 max-w-xs">
            <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400 pointer-events-none"
                 viewBox="0 0 24 24" fill="none" stroke="currentColor"
                 stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>
            </svg>
            <input type="text" name="search" placeholder="Cari tugas..." value="{{ request('search') }}"
                   class="w-full pl-9 pr-4 py-2 text-sm bg-white border border-slate-200 rounded-lg
                          focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent
                          placeholder-slate-400 transition"
                   onchange="document.getElementById('filter-form').submit()" />
        </div>

        {{-- Priority filter --}}
        <select name="priority" class="px-3 py-2 text-sm bg-white border border-slate-200 rounded-lg
                       focus:outline-none focus:ring-2 focus:ring-blue-500 text-slate-600"
                onchange="document.getElementById('filter-form').submit()">
            <option value="">Semua Prioritas</option>
            <option value="High" {{ request('priority') === 'High' ? 'selected' : '' }}>Tinggi</option>
            <option value="Medium" {{ request('priority') === 'Medium' ? 'selected' : '' }}>Sedang</option>
            <option value="Low" {{ request('priority') === 'Low' ? 'selected' : '' }}>Rendah</option>
        </select>

        {{-- Status filter --}}
        <select name="status" class="px-3 py-2 text-sm bg-white border border-slate-200 rounded-lg
                       focus:outline-none focus:ring-2 focus:ring-blue-500 text-slate-600"
                onchange="document.getElementById('filter-form').submit()">
            <option value="">Semua Status</option>
            <option value="Todo" {{ request('status') === 'Todo' ? 'selected' : '' }}>Belum Mulai</option>
            <option value="In Progress" {{ request('status') === 'In Progress' ? 'selected' : '' }}>Sedang Berjalan</option>
            <option value="Done" {{ request('status') === 'Done' ? 'selected' : '' }}>Selesai</option>
        </select>

        {{-- Tenggat filter --}}
        <select name="filter" class="px-3 py-2 text-sm bg-white border border-slate-200 rounded-lg
                       focus:outline-none focus:ring-2 focus:ring-blue-500 text-slate-600"
                onchange="document.getElementById('filter-form').submit()">
            <option value="">Semua Tenggat</option>
            <option value="today" {{ request('filter') === 'today' ? 'selected' : '' }}>Hari Ini</option>
            <option value="mendatang" {{ request('filter') === 'mendatang' ? 'selected' : '' }}>Mendatang (H+5)</option>
            <option value="overdue" {{ request('filter') === 'overdue' ? 'selected' : '' }}>Terlambat</option>
        </select>

        {{-- Clear filters --}}
        @if(request()->hasAny(['search', 'priority', 'status', 'filter']))
            <a href="{{ route('tasks.index') }}" 
               class="px-3 py-2 text-sm text-slate-500 hover:text-slate-700 border border-slate-200 
                      rounded-lg hover:bg-slate-50 transition-colors">
                Bersihkan
            </a>
        @endif

        {{-- View toggle --}}
        <div class="flex items-center gap-1 p-1 bg-white border border-slate-200 rounded-lg ml-auto sm:ml-0">
            <button type="button" @click="view = 'list'"
                    :class="view === 'list' ? 'bg-slate-100 text-slate-800' : 'text-slate-400 hover:text-slate-600'"
                    class="p-1.5 rounded-md transition-colors">
                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/>
                    <line x1="8" y1="18" x2="21" y2="18"/>
                    <line x1="3" y1="6" x2="3.01" y2="6"/><line x1="3" y1="12" x2="3.01" y2="12"/>
                    <line x1="3" y1="18" x2="3.01" y2="18"/>
                </svg>
            </button>
            <button type="button" @click="view = 'grid'"
                    :class="view === 'grid' ? 'bg-slate-100 text-slate-800' : 'text-slate-400 hover:text-slate-600'"
                    class="p-1.5 rounded-md transition-colors">
                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/>
                    <rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/>
                </svg>
            </button>
        </div>
        
    </form>

    {{-- ── Stats strip ──────────────────────────────────────────────── --}}
    <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
        @php
            $strips = [
                ['label' => 'Total',          'value' => $tasks->count(), 'color' => 'bg-slate-50  text-slate-700',  'dot' => 'bg-slate-400'],
                ['label' => 'Selesai',        'value' => $tasks->where('status', 'Done')->count(), 'color' => 'bg-green-50 text-green-700', 'dot' => 'bg-green-500'],
                ['label' => 'Sedang Berjalan','value' => $tasks->where('status','In Progress')->count(), 'color' => 'bg-orange-50 text-orange-700', 'dot' => 'bg-orange-400'],
                ['label' => 'Belum Mulai',    'value' => $tasks->where('status','Todo')->count(), 'color' => 'bg-blue-50 text-blue-700', 'dot' => 'bg-blue-500'],
            ];
        @endphp
        @foreach ($strips as $s)
            <div class="flex items-center gap-3 bg-white border border-slate-100 rounded-xl px-4 py-3">
                <span class="w-2 h-2 rounded-full {{ $s['dot'] }} shrink-0"></span>
                <div class="min-w-0">
                    <p class="text-xs text-slate-500">{{ $s['label'] }}</p>
                    <p class="text-lg font-bold text-slate-800 leading-tight">{{ $s['value'] }}</p>
                </div>
            </div>
        @endforeach
    </div>

    {{-- ── Task list view ───────────────────────────────────────────── --}}
    <div x-show="view === 'list'">
        
        @if($groupedTasks && $groupBy)
            {{-- Grouped view with separators --}}
            @foreach($groupedTasks as $groupKey => $groupTasks)
                @php
                    $groupLabel = match($groupBy) {
                        'priority' => match($groupKey) {
                            'High' => 'Prioritas Tinggi',
                            'Medium' => 'Prioritas Sedang', 
                            'Low' => 'Prioritas Rendah',
                            default => $groupKey
                        },
                        'status' => match($groupKey) {
                            'Todo' => 'Belum Mulai',
                            'In Progress' => 'Sedang Berjalan',
                            'Done' => 'Selesai',
                            default => $groupKey
                        },
                        default => $groupKey
                    };
                    
                    $groupColor = match($groupBy) {
                        'priority' => match($groupKey) {
                            'High' => 'bg-red-50 text-red-700 border-red-200',
                            'Medium' => 'bg-yellow-50 text-yellow-700 border-yellow-200',
                            'Low' => 'bg-slate-50 text-slate-700 border-slate-200',
                            default => 'bg-slate-50 text-slate-700 border-slate-200'
                        },
                        'status' => match($groupKey) {
                            'Todo' => 'bg-blue-50 text-blue-700 border-blue-200',
                            'In Progress' => 'bg-orange-50 text-orange-700 border-orange-200',
                            'Done' => 'bg-green-50 text-green-700 border-green-200',
                            default => 'bg-slate-50 text-slate-700 border-slate-200'
                        },
                        default => 'bg-slate-50 text-slate-700 border-slate-200'
                    };
                @endphp
                
                {{-- Group Header --}}
                <div class="mb-4">
                    <div class="flex items-center gap-3 px-4 py-3 {{ $groupColor }} rounded-lg border">
                        <div class="w-2 h-2 rounded-full bg-current opacity-60"></div>
                        <h3 class="font-semibold text-sm">{{ $groupLabel }}</h3>
                        <span class="text-xs opacity-75">({{ $groupTasks->count() }} tugas)</span>
                    </div>
                </div>
                
                {{-- Tasks in Group --}}
                <div class="bg-white border border-slate-100 rounded-xl overflow-hidden mb-6">
                    {{-- Table header --}}
                    <div class="hidden sm:grid grid-cols-12 gap-4 px-5 py-3 bg-slate-50 border-b border-slate-100
                                text-[11px] font-semibold uppercase tracking-wider text-slate-400">
                        <div class="col-span-5">Tugas</div>
                        <div class="col-span-2">Prioritas</div>
                        <div class="col-span-2">Status</div>
                        <div class="col-span-2">Deadline</div>
                        <div class="col-span-1"></div>
                    </div>

                    <ul class="divide-y divide-slate-50">
                        @foreach ($groupTasks as $task)
                            @include('tasks.partials.task-row', ['task' => $task])
                        @endforeach
                    </ul>
                </div>
            @endforeach
        @else
            {{-- Regular ungrouped view --}}
            <div class="bg-white border border-slate-100 rounded-xl overflow-hidden">
                {{-- Table header --}}
                <div class="hidden sm:grid grid-cols-12 gap-4 px-5 py-3 bg-slate-50 border-b border-slate-100
                            text-[11px] font-semibold uppercase tracking-wider text-slate-400">
                    <div class="col-span-5">Tugas</div>
                    <div class="col-span-2">Prioritas</div>
                    <div class="col-span-2">Status</div>
                    <div class="col-span-2">Deadline</div>
                    <div class="col-span-1"></div>
                </div>

                <ul class="divide-y divide-slate-50">
                    @foreach ($tasks as $task)
                        @include('tasks.partials.task-row', ['task' => $task])
                    @endforeach
                </ul>
            </div>
        @endif
        
    </div>

    {{-- ── Task grid view ───────────────────────────────────────────── --}}
    <div x-show="view === 'grid'" x-cloak>
        
        @if($groupedTasks && $groupBy)
            {{-- Grouped grid view --}}
            @foreach($groupedTasks as $groupKey => $groupTasks)
                @php
                    $groupLabel = match($groupBy) {
                        'priority' => match($groupKey) {
                            'High' => 'Prioritas Tinggi',
                            'Medium' => 'Prioritas Sedang', 
                            'Low' => 'Prioritas Rendah',
                            default => $groupKey
                        },
                        'status' => match($groupKey) {
                            'Todo' => 'Belum Mulai',
                            'In Progress' => 'Sedang Berjalan',
                            'Done' => 'Selesai',
                            default => $groupKey
                        },
                        default => $groupKey
                    };
                    
                    $groupColor = match($groupBy) {
                        'priority' => match($groupKey) {
                            'High' => 'bg-red-50 text-red-700 border-red-200',
                            'Medium' => 'bg-yellow-50 text-yellow-700 border-yellow-200',
                            'Low' => 'bg-slate-50 text-slate-700 border-slate-200',
                            default => 'bg-slate-50 text-slate-700 border-slate-200'
                        },
                        'status' => match($groupKey) {
                            'Todo' => 'bg-blue-50 text-blue-700 border-blue-200',
                            'In Progress' => 'bg-orange-50 text-orange-700 border-orange-200',
                            'Done' => 'bg-green-50 text-green-700 border-green-200',
                            default => 'bg-slate-50 text-slate-700 border-slate-200'
                        },
                        default => 'bg-slate-50 text-slate-700 border-slate-200'
                    };
                @endphp
                
                {{-- Group Header --}}
                <div class="col-span-full mb-4">
                    <div class="flex items-center gap-3 px-4 py-3 {{ $groupColor }} rounded-lg border">
                        <div class="w-2 h-2 rounded-full bg-current opacity-60"></div>
                        <h3 class="font-semibold text-sm">{{ $groupLabel }}</h3>
                        <span class="text-xs opacity-75">({{ $groupTasks->count() }} tugas)</span>
                    </div>
                </div>
                
                {{-- Tasks Grid --}}
                <div class="col-span-full grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-8">
                    @foreach ($groupTasks as $task)
                        @include('tasks.partials.task-card', ['task' => $task])
                    @endforeach
                </div>
                
            @endforeach
        @else
            {{-- Regular grid view --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach ($tasks as $task)
                    @include('tasks.partials.task-card', ['task' => $task])
                @endforeach
            </div>
        @endif
        
    </div>
    

</div>

@endsection
