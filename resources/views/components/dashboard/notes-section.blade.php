@props(['todayNotes' => collect()])

<div class="bg-white border border-slate-100 rounded-2xl shadow-[0_2px_10px_-3px_rgba(6,81,237,0.05)] overflow-hidden flex flex-col min-h-[300px] transition-all duration-300">
    
    {{-- Header --}}
    <div class="flex items-center justify-between px-6 py-5 border-b border-slate-100/60 bg-white/50 backdrop-blur-sm">
        <div class="flex items-center gap-3">
            <h2 class="text-lg font-bold text-slate-800 tracking-tight">Catatan Hari Ini</h2>
            @if(!$todayNotes->isEmpty())
                <span class="px-2 py-0.5 rounded-full bg-slate-100 text-slate-600 text-xs font-semibold">{{ count($todayNotes) }}</span>
            @endif
        </div>
        <a href="{{ route('notes.create') }}" class="p-1.5 text-slate-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-colors" title="Buat Catatan Baru">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
        </a>
    </div>
    
    <div class="p-6 flex-1 flex flex-col bg-slate-50/30">
        @if ($todayNotes->isEmpty())
            <x-ui.empty-state
                title="Belum ada catatan"
                description="Tuliskan ide brilianmu sebelum ia pergi."
                action="Buat Catatan"
                actionHref="{{ route('notes.create') }}"
                icon='<path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />' />
        @else
            <div class="flex flex-col gap-3">
                @foreach ($todayNotes as $note)
                    <x-dashboard.note-card
                        :title="$note->title"
                        :preview="\Illuminate\Support\Str::limit($note->content, 80)"
                        :time="$note->updated_at->diffForHumans()"
                        :color="$note->color ?? 'bg-slate-50'"
                        :href="route('notes.edit', $note)" />
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
