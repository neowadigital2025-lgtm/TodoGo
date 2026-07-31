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
        <a href="{{ route('tasks.create') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 hover:bg-blue-700
                       text-white text-sm font-medium rounded-lg transition-colors shadow-sm shrink-0">
            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                 stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/>
            </svg>
            Buat Tugas
        </a>
    </div>

    {{-- ── Filter bar ───────────────────────────────────────────────── --}}
    <div class="flex flex-col sm:flex-row items-start sm:items-center gap-3">

        {{-- Search --}}
        <div class="relative flex-1 max-w-xs">
            <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400 pointer-events-none"
                 viewBox="0 0 24 24" fill="none" stroke="currentColor"
                 stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>
            </svg>
            <input type="text" placeholder="Cari tugas..."
                   class="w-full pl-9 pr-4 py-2 text-sm bg-white border border-slate-200 rounded-lg
                          focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent
                          placeholder-slate-400 transition" />
        </div>

        {{-- Priority filter --}}
        <select class="px-3 py-2 text-sm bg-white border border-slate-200 rounded-lg
                       focus:outline-none focus:ring-2 focus:ring-blue-500 text-slate-600">
            <option value="">Semua Prioritas</option>
            <option value="High">Tinggi</option>
            <option value="Medium">Sedang</option>
            <option value="Low">Rendah</option>
        </select>

        {{-- Status filter --}}
        <select class="px-3 py-2 text-sm bg-white border border-slate-200 rounded-lg
                       focus:outline-none focus:ring-2 focus:ring-blue-500 text-slate-600">
            <option value="">Semua Status</option>
            <option value="Todo">Belum Mulai</option>
            <option value="In Progress">Sedang Berjalan</option>
            <option value="Done">Selesai</option>
        </select>

        {{-- View toggle --}}
        <div class="flex items-center gap-1 p-1 bg-white border border-slate-200 rounded-lg ml-auto sm:ml-0">
            <button @click="view = 'list'"
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
            <button @click="view = 'grid'"
                    :class="view === 'grid' ? 'bg-slate-100 text-slate-800' : 'text-slate-400 hover:text-slate-600'"
                    class="p-1.5 rounded-md transition-colors">
                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/>
                    <rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/>
                </svg>
            </button>
        </div>
    </div>

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
    <div x-show="view === 'list'" class="bg-white border border-slate-100 rounded-xl overflow-hidden">

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
            @php
                $isDone = $task->status === 'Done';
                
                $priorityColor = match($task->priority) {
                    'High' => 'red',
                    'Medium' => 'yellow',
                    'Low' => 'slate',
                    default => 'slate',
                };
                
                $statusColor = match($task->status) {
                    'Done' => 'green',
                    'In Progress' => 'orange',
                    'Todo' => 'slate',
                    default => 'slate',
                };
            @endphp
            <li class="group grid grid-cols-12 gap-4 items-center px-5 py-3.5
                       hover:bg-slate-50 transition-colors duration-150">

                {{-- Checkbox + title --}}
                <div class="col-span-12 sm:col-span-5 flex items-center gap-3 min-w-0">
                    <div class="shrink-0">
                        @if ($isDone)
                            <div class="w-5 h-5 rounded-full bg-blue-600 flex items-center justify-center">
                                <svg class="w-3 h-3 text-white" viewBox="0 0 24 24" fill="none"
                                     stroke="currentColor" stroke-width="3"
                                     stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="20 6 9 17 4 12"/>
                                </svg>
                            </div>
                        @else
                            <div class="w-5 h-5 rounded-full border-2 border-slate-200
                                        group-hover:border-blue-400 transition-colors"></div>
                        @endif
                    </div>
                    <div class="min-w-0">
                        <p class="text-sm font-medium truncate
                                  {{ $isDone ? 'line-through text-slate-400' : 'text-slate-800' }}">
                            {{ $task->title }}
                        </p>
                        <div class="flex items-center gap-1 mt-0.5">
                            <svg class="w-3 h-3 text-slate-400 shrink-0" viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="2"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/>
                            </svg>
                            <span class="text-xs text-blue-500 truncate">{{ $task->workspace?->name ?? 'No Workspace' }}</span>
                        </div>
                    </div>
                </div>

                {{-- Priority --}}
                <div class="hidden sm:flex col-span-2">
                    <x-ui.badge :color="$priorityColor">{{ $task->priority }}</x-ui.badge>
                </div>

                {{-- Status --}}
                <div class="hidden sm:flex col-span-2">
                    <x-ui.badge :color="$statusColor" :dot="true">{{ $task->status }}</x-ui.badge>
                </div>

                {{-- Date --}}
                <div class="hidden sm:block col-span-2">
                    <span class="text-xs text-slate-500">{{ $task->due_date ? $task->due_date->format('d M Y') : '-' }}</span>
                </div>

                {{-- Actions --}}
                <div class="hidden sm:flex col-span-1 justify-end gap-1 opacity-0 group-hover:opacity-100 transition-opacity">
                    <a href="{{ route('tasks.edit', $task) }}" class="p-1.5 rounded-md text-slate-400 hover:text-blue-600 hover:bg-blue-50 transition-colors" title="Edit">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                        </svg>
                    </a>
                    <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus tugas ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="p-1.5 rounded-md text-slate-400 hover:text-red-600 hover:bg-red-50 transition-colors" title="Hapus">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                        </button>
                    </form>
                </div>
            </li>
            @endforeach
        </ul>

    </div>

    {{-- ── Task grid view ───────────────────────────────────────────── --}}
    <div x-show="view === 'grid'" x-cloak
         class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($tasks as $task)
        @php
            $isDone = $task->status === 'Done';
            $priorityColor = match($task->priority) {
                'High' => 'red',
                'Medium' => 'yellow',
                'Low' => 'slate',
                default => 'slate',
            };
            $statusColor = match($task->status) {
                'Done' => 'green',
                'In Progress' => 'orange',
                'Todo' => 'slate',
                default => 'slate',
            };
        @endphp
        <div class="bg-white border border-slate-100 rounded-xl p-4 hover:shadow-sm
                    transition-shadow duration-150 group relative">

            <div class="absolute top-4 right-4 hidden group-hover:flex gap-1">
                <a href="{{ route('tasks.edit', $task) }}" class="p-1 bg-white border border-slate-100 rounded shadow-sm text-slate-400 hover:text-blue-600 transition-colors">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                </a>
                <form action="{{ route('tasks.destroy', $task) }}" method="POST" onsubmit="return confirm('Yakin hapus?');">
                    @csrf @method('DELETE')
                    <button type="submit" class="p-1 bg-white border border-slate-100 rounded shadow-sm text-slate-400 hover:text-red-600 transition-colors">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                    </button>
                </form>
            </div>

            {{-- Header --}}
            <div class="flex items-start justify-between gap-2 mb-3">
                <div class="flex items-center gap-2">
                    @if ($isDone)
                        <div class="w-5 h-5 rounded-full bg-blue-600 flex items-center justify-center shrink-0">
                            <svg class="w-3 h-3 text-white" viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="3"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="20 6 9 17 4 12"/>
                            </svg>
                        </div>
                    @else
                        <div class="w-5 h-5 rounded-full border-2 border-slate-200
                                    group-hover:border-blue-400 transition-colors shrink-0"></div>
                    @endif
                </div>
                <x-ui.badge :color="$priorityColor">{{ $task->priority }}</x-ui.badge>
            </div>

            {{-- Title --}}
            <p class="text-sm font-semibold text-slate-800 leading-snug mb-1
                      {{ $isDone ? 'line-through text-slate-400' : '' }}">
                {{ $task->title }}
            </p>

            {{-- Workspace --}}
            <div class="flex items-center gap-1 mb-3">
                <svg class="w-3 h-3 text-slate-400 shrink-0" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/>
                </svg>
                <span class="text-xs text-blue-500 truncate">{{ $task->workspace?->name ?? 'No Workspace' }}</span>
            </div>

            {{-- Footer --}}
            <div class="flex items-center justify-between">
                <x-ui.badge :color="$statusColor" :dot="true">{{ $task->status }}</x-ui.badge>
                <span class="text-xs text-slate-400">{{ $task->due_date ? $task->due_date->format('d M Y') : '-' }}</span>
            </div>
        </div>
        @endforeach
    </div>

</div>

@endsection
