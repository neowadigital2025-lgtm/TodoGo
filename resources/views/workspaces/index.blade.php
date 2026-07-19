@extends('layouts.app')

@section('title', 'Ruang Kerja')

@section('content')
@php
$workspaces = [
    ['name' => 'TodoGo Development', 'description' => 'Pengembangan produk utama TodoGo SaaS platform.', 'tasks' => 12, 'members' => 5, 'color' => 'bg-blue-500',   'progress' => 68],
    ['name' => 'Skripsi',            'description' => 'Penelitian dan penulisan tugas akhir semester.', 'tasks' => 8,  'members' => 2, 'color' => 'bg-green-500',  'progress' => 45],
    ['name' => 'Organisasi Kampus',  'description' => 'Kegiatan dan proyek organisasi mahasiswa.',     'tasks' => 5,  'members' => 8, 'color' => 'bg-purple-500', 'progress' => 30],
    ['name' => 'Pribadi',            'description' => 'Tugas dan tujuan personal sehari-hari.',        'tasks' => 3,  'members' => 1, 'color' => 'bg-orange-400', 'progress' => 80],
];
@endphp

<div class="max-w-screen-xl mx-auto space-y-6">

    {{-- Header --}}
    <x-ui.section-header
        title="Ruang Kerja"
        description="Kelola workspace dan kolaborasi tim kamu."
        action="Buat Workspace" />

    {{-- Stats --}}
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
        @php $strips = [
            ['label'=>'Total Workspace','value'=>count($workspaces),'icon_bg'=>'bg-blue-50','icon_color'=>'text-blue-500'],
            ['label'=>'Total Tugas',    'value'=>collect($workspaces)->sum('tasks'),'icon_bg'=>'bg-green-50','icon_color'=>'text-green-500'],
            ['label'=>'Total Anggota', 'value'=>collect($workspaces)->sum('members'),'icon_bg'=>'bg-purple-50','icon_color'=>'text-purple-500'],
            ['label'=>'Aktif Hari Ini','value'=>3,'icon_bg'=>'bg-orange-50','icon_color'=>'text-orange-400'],
        ]; @endphp
        @foreach ($strips as $s)
        <div class="bg-white border border-slate-100 rounded-xl px-4 py-4 flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl {{ $s['icon_bg'] }} flex items-center justify-center shrink-0">
                <svg class="w-5 h-5 {{ $s['icon_color'] }}" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="2" y="7" width="20" height="14" rx="2"/>
                    <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/>
                </svg>
            </div>
            <div>
                <p class="text-xs text-slate-500">{{ $s['label'] }}</p>
                <p class="text-xl font-bold text-slate-800">{{ $s['value'] }}</p>
            </div>
        </div>
        @endforeach
    </div>

    {{-- Workspace grid --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 xl:grid-cols-4 gap-4">
        @foreach ($workspaces as $ws)
        <div class="bg-white border border-slate-100 rounded-xl overflow-hidden
                    hover:shadow-md transition-shadow duration-200 cursor-pointer group">

            {{-- Color bar --}}
            <div class="h-1.5 {{ $ws['color'] }}"></div>

            <div class="p-5">
                {{-- Icon + name --}}
                <div class="flex items-center gap-3 mb-3">
                    <div class="w-10 h-10 rounded-xl {{ $ws['color'] }} flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5 text-white" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/>
                        </svg>
                    </div>
                    <div class="min-w-0">
                        <p class="text-sm font-bold text-slate-800 truncate group-hover:text-blue-600
                                  transition-colors">{{ $ws['name'] }}</p>
                        <p class="text-xs text-slate-400">{{ $ws['members'] }} anggota</p>
                    </div>
                </div>

                {{-- Description --}}
                <p class="text-xs text-slate-500 leading-relaxed mb-4 line-clamp-2">{{ $ws['description'] }}</p>

                {{-- Progress --}}
                <div class="mb-4">
                    <div class="flex items-center justify-between mb-1.5">
                        <span class="text-[11px] text-slate-400">Progress</span>
                        <span class="text-[11px] font-semibold text-slate-600">{{ $ws['progress'] }}%</span>
                    </div>
                    <div class="w-full h-1.5 bg-slate-100 rounded-full overflow-hidden">
                        <div class="h-full {{ $ws['color'] }} rounded-full transition-all"
                             style="width: {{ $ws['progress'] }}%"></div>
                    </div>
                </div>

                {{-- Footer --}}
                <div class="flex items-center justify-between">
                    <div class="flex -space-x-1.5">
                        @for ($i = 0; $i < min($ws['members'], 3); $i++)
                        <div class="w-6 h-6 rounded-full border-2 border-white overflow-hidden bg-slate-200">
                            <img src="https://ui-avatars.com/api/?name=M{{ $i+1 }}&background=94a3b8&color=fff&size=24&bold=true"
                                 class="w-full h-full object-cover" alt="member" />
                        </div>
                        @endfor
                        @if ($ws['members'] > 3)
                        <div class="w-6 h-6 rounded-full border-2 border-white bg-slate-100
                                    flex items-center justify-center">
                            <span class="text-[9px] font-bold text-slate-500">+{{ $ws['members']-3 }}</span>
                        </div>
                        @endif
                    </div>
                    <span class="text-[11px] text-slate-400">{{ $ws['tasks'] }} tugas</span>
                </div>
            </div>
        </div>
        @endforeach

        {{-- Create new workspace card --}}
        <div class="bg-white border-2 border-dashed border-slate-200 rounded-xl p-5
                    flex flex-col items-center justify-center gap-2 cursor-pointer
                    hover:border-blue-300 hover:bg-blue-50/30 transition-all duration-200 min-h-[200px]">
            <div class="w-10 h-10 rounded-xl bg-slate-100 flex items-center justify-center">
                <svg class="w-5 h-5 text-slate-400" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/>
                </svg>
            </div>
            <p class="text-sm font-medium text-slate-500">Buat Workspace Baru</p>
        </div>
    </div>

</div>
@endsection
