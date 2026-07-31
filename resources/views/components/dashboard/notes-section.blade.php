<div class="bg-white border border-slate-100 rounded-2xl shadow-[0_2px_10px_-3px_rgba(6,81,237,0.05)] overflow-hidden flex flex-col min-h-[300px] transition-all duration-300">
    
    {{-- Header --}}
    <div class="flex items-center justify-between px-6 py-5 border-b border-slate-100/60 bg-white/50 backdrop-blur-sm">
        <div class="flex items-center gap-3">
            <h2 class="text-lg font-bold text-slate-800 tracking-tight">Catatan Hari Ini</h2>
            @if(!empty($todayNotes))
                <span class="px-2 py-0.5 rounded-full bg-slate-100 text-slate-600 text-xs font-semibold">{{ count($todayNotes) }}</span>
            @endif
        </div>
        <button class="p-1.5 text-slate-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-colors" title="Buat Catatan Baru">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
        </button>
    </div>
    
    <div class="p-6 flex-1 flex flex-col bg-slate-50/30">
        @if (empty($todayNotes))
            <x-dashboard.empty-note />
        @else
            <div class="flex flex-col gap-3">
                @foreach ($todayNotes as $note)
                    <x-dashboard.note-card
                        :title="$note['title']"
                        :preview="$note['preview']"
                        :time="$note['time']"
                        :color="$note['color']" />
                @endforeach
            </div>
            <a href="{{ route('notes.create') }}" class="mt-4 w-full py-2.5 rounded-xl border border-dashed border-slate-300 text-slate-500 text-sm font-semibold hover:border-blue-500 hover:text-blue-600 hover:bg-blue-50 transition-all flex items-center justify-center gap-2">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Buat Catatan
            </a>
        @endif
    </div>

</div>
