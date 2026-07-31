@extends('layouts.app')

@section('title', 'Catatan')

@section('content')

<div class="max-w-screen-xl mx-auto space-y-6">

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg relative" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-xl font-bold text-slate-800">Catatan</h1>
            <p class="mt-0.5 text-sm text-slate-500">Simpan ide dan informasi penting.</p>
        </div>
        <a href="{{ route('notes.create') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 hover:bg-blue-700
                       text-white text-sm font-medium rounded-lg transition-colors shadow-sm shrink-0">
            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                 stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/>
            </svg>
            Buat Catatan
        </a>
    </div>

    {{-- Notes grid --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
        @forelse ($notes as $note)
        <div class="bg-white border border-slate-100 rounded-xl overflow-hidden relative
                    hover:shadow-md transition-shadow duration-200 group flex flex-col h-64">

            {{-- Action Buttons --}}
            <div class="absolute top-4 right-4 hidden group-hover:flex gap-1 z-10">
                <a href="{{ route('notes.edit', $note) }}" class="p-1.5 bg-white border border-slate-200 rounded shadow-sm text-slate-500 hover:text-blue-600 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                </a>
                <form action="{{ route('notes.destroy', $note) }}" method="POST" onsubmit="return confirm('Hapus catatan ini?');">
                    @csrf @method('DELETE')
                    <button type="submit" class="p-1.5 bg-white border border-slate-200 rounded shadow-sm text-slate-500 hover:text-red-600 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                    </button>
                </form>
            </div>

            {{-- Color bar --}}
            <div class="h-2 {{ $note->color ?? 'bg-blue-500' }}"></div>

            <div class="p-5 flex-1 flex flex-col min-h-0">
                <div class="flex items-start justify-between gap-3 mb-2">
                    <h3 class="text-sm font-bold text-slate-800 line-clamp-2 pr-12">{{ $note->title }}</h3>
                    @if($note->pinned)
                        <svg class="w-4 h-4 text-orange-500 shrink-0" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M16 11V5.5C16 3.5 14.5 2 12 2C9.5 2 8 3.5 8 5.5V11L6 14V16H11V22L12 23L13 22V16H18V14L16 11Z" />
                        </svg>
                    @endif
                </div>

                <div class="text-sm text-slate-600 flex-1 overflow-hidden whitespace-pre-wrap line-clamp-5 relative">
                    {{ $note->content }}
                </div>
                
                <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between">
                    <span class="text-[11px] text-slate-400">{{ $note->created_at->format('d M Y') }}</span>
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-full bg-white border border-slate-100 rounded-xl p-8 text-center">
            <div class="w-16 h-16 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-3">
                <svg class="w-8 h-8 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
            </div>
            <p class="text-slate-500 font-medium">Belum ada catatan</p>
            <p class="text-sm text-slate-400 mt-1 mb-4">Buat catatan pertamamu sekarang.</p>
            <a href="{{ route('notes.create') }}" class="inline-block px-4 py-2 bg-blue-600 text-white rounded-lg text-sm hover:bg-blue-700">Buat Catatan</a>
        </div>
        @endforelse
    </div>

</div>
@endsection
