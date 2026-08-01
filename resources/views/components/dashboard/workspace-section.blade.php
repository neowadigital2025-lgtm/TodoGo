@props(['workspaces' => collect()])

<div class="bg-white border border-slate-100 rounded-2xl shadow-[0_2px_10px_-3px_rgba(6,81,237,0.05)] overflow-hidden flex flex-col min-h-[250px] transition-all duration-300">

    {{-- Header --}}
    <div class="flex items-center justify-between px-6 py-5 border-b border-slate-100/60 bg-white/50 backdrop-blur-sm">
        <h2 class="text-lg font-bold text-slate-800 tracking-tight">Ikhtisar Ruang Kerja</h2>
        <a href="{{ route('workspaces.index') }}" class="group flex items-center gap-1 text-sm font-semibold text-blue-600 hover:text-blue-700 transition-colors">
            <span>Lihat Semua</span>
            <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </a>
    </div>

    <div class="p-6 flex-1 flex flex-col bg-slate-50/30">
        @if ($workspaces->isEmpty())
            <x-ui.empty-state
                title="Belum ada ruang kerja"
                description="Buat ruang kerja baru untuk mengorganisasikan tugas-tugas Anda."
                action="Buat Ruang Kerja"
                actionHref="{{ route('workspaces.create') }}"
                icon='<rect x="2" y="7" width="20" height="14" rx="2" ry="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/>' />
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                @foreach ($workspaces as $ws)
                    <x-dashboard.workspace-card
                        :name="$ws->name"
                        :taskCount="$ws->tasks_count"
                        :color="$ws->color ?? 'bg-slate-400'"
                        :href="route('workspaces.edit', $ws)" />
                @endforeach
            </div>
            <a href="{{ route('workspaces.create') }}">
                <button class="mt-6 w-full py-3 rounded-xl border border-dashed border-slate-300 text-slate-500 text-sm font-semibold hover:border-blue-500 hover:text-blue-600 hover:bg-blue-50 transition-all flex items-center justify-center gap-2 group">
                    <svg class="w-4 h-4 text-slate-400 group-hover:text-blue-600 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4" />
                    </svg>
                    Buat Ruang Kerja Baru
                </button>
            </a>
        @endif
    </div>

</div>
