@extends('layouts.app')

@section('title', 'Ruang Kerja')

@section('content')

<div class="max-w-screen-xl mx-auto space-y-6">

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg relative" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    {{-- Header --}}
    <x-ui.section-header
        title="Ruang Kerja"
        description="Kelola workspace dan kolaborasi tim kamu."
        action="Buat Workspace"
        actionHref="{{ route('workspaces.create') }}" />


    {{-- Stats --}}
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
        @php $strips = [
            ['label'=>'Total Workspace','value'=>$workspaces->count(),'icon_bg'=>'bg-blue-50','icon_color'=>'text-blue-500'],
            ['label'=>'Total Tugas',    'value'=>$workspaces->sum('tasks_count'),'icon_bg'=>'bg-green-50','icon_color'=>'text-green-500'],
            ['label'=>'Total Anggota', 'value'=>$workspaces->count(),'icon_bg'=>'bg-purple-50','icon_color'=>'text-purple-500'],
            ['label'=>'Aktif Hari Ini','value'=>$workspaces->count() > 0 ? 1 : 0,'icon_bg'=>'bg-orange-50','icon_color'=>'text-orange-400'],
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
        <div class="bg-white border border-slate-100 rounded-xl overflow-hidden relative
                    hover:shadow-md transition-shadow duration-200 group">

            {{-- Action Buttons --}}
            <div class="absolute top-4 right-4 hidden group-hover:flex gap-1 z-10">
                <a href="{{ route('workspaces.edit', $ws) }}" class="p-1.5 bg-white border border-slate-200 rounded shadow-sm text-slate-500 hover:text-blue-600 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                </a>
                <form action="{{ route('workspaces.destroy', $ws) }}" method="POST" onsubmit="return confirm('Menghapus workspace akan menghapus semua tugas di dalamnya. Lanjutkan?');">
                    @csrf @method('DELETE')
                    <button type="submit" class="p-1.5 bg-white border border-slate-200 rounded shadow-sm text-slate-500 hover:text-red-600 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                    </button>
                </form>
            </div>

            {{-- Color bar --}}
            <div class="h-1.5 {{ $ws->color ?? 'bg-blue-500' }}"></div>

            <div class="p-5 block cursor-pointer">
                {{-- Icon + name --}}
                <div class="flex items-center gap-3 mb-3">
                    <div class="w-10 h-10 rounded-xl {{ $ws->color ?? 'bg-blue-500' }} flex items-center justify-center shrink-0">
                        @if($ws->icon)
                            <span class="text-xl">{{ $ws->icon }}</span>
                        @else
                            <svg class="w-5 h-5 text-white" viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/>
                            </svg>
                        @endif
                    </div>
                    <div class="min-w-0 pr-12">
                        <p class="text-sm font-bold text-slate-800 truncate group-hover:text-blue-600
                                  transition-colors">{{ $ws->name }}</p>
                        <p class="text-xs text-slate-400">1 anggota</p>
                    </div>
                </div>

                {{-- Description --}}
                <p class="text-xs text-slate-500 leading-relaxed mb-4 line-clamp-2 h-8">{{ $ws->description ?: 'Tidak ada deskripsi.' }}</p>

                {{-- Progress --}}
                <div class="mb-4">
                    <div class="flex items-center justify-between mb-1.5">
                        <span class="text-[11px] text-slate-400">Progress</span>
                        <span class="text-[11px] font-semibold text-slate-600">0%</span>
                    </div>
                    <div class="w-full h-1.5 bg-slate-100 rounded-full overflow-hidden">
                        <div class="h-full {{ $ws->color ?? 'bg-blue-500' }} rounded-full transition-all"
                             style="width: 0%"></div>
                    </div>
                </div>

                {{-- Footer --}}
                <div class="flex items-center justify-between">
                    <div class="flex -space-x-1.5">
                        <div class="w-6 h-6 rounded-full border-2 border-white overflow-hidden bg-slate-200">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=94a3b8&color=fff&size=24&bold=true"
                                 class="w-full h-full object-cover" alt="member" />
                        </div>
                    </div>
                    <span class="text-[11px] text-slate-400">{{ $ws->tasks_count }} tugas</span>
                </div>
            </div>
        </div>
        @endforeach

        {{-- Create new workspace card --}}
        <a href="{{ route('workspaces.create') }}" class="bg-white border-2 border-dashed border-slate-200 rounded-xl p-5
                    flex flex-col items-center justify-center gap-2 cursor-pointer
                    hover:border-blue-300 hover:bg-blue-50/30 transition-all duration-200 min-h-[200px]">
            <div class="w-10 h-10 rounded-xl bg-slate-100 flex items-center justify-center">
                <svg class="w-5 h-5 text-slate-400" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/>
                </svg>
            </div>
            <p class="text-sm font-medium text-slate-500">Buat Workspace Baru</p>
        </a>
    </div>

</div>
@endsection
