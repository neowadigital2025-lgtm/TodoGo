@props(['latestTasks' => collect()])

<div class="bg-white border border-slate-100 rounded-2xl shadow-[0_2px_10px_-3px_rgba(6,81,237,0.05)] overflow-hidden flex flex-col min-h-[300px] transition-all duration-300">

    {{-- Header --}}
    <div class="flex items-center justify-between px-6 py-5 border-b border-slate-100/60 bg-white/50 backdrop-blur-sm">
        <div class="flex items-center gap-3">
            <h2 class="text-lg font-bold text-slate-800 tracking-tight">Tugas Terbaru</h2>
            @if(!$latestTasks->isEmpty())
                <span class="px-2 py-0.5 rounded-full bg-blue-50 text-blue-600 text-xs font-semibold">{{ count($latestTasks) }}</span>
            @endif
        </div>
        <a href="{{ route('tasks.index') }}" class="group flex items-center gap-1 text-sm font-semibold text-blue-600 hover:text-blue-700 transition-colors">
            <span>Lihat Semua</span>
            <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </a>
    </div>

    {{-- Task list --}}
    <div class="p-6 flex-1 flex flex-col bg-slate-50/30">
        @if ($latestTasks->isEmpty())
            <x-ui.empty-state
                title="Belum ada tugas"
                description="Mulailah membuat tugas pertama agar pekerjaan lebih terorganisir."
                action="Tambah Tugas Baru"
                actionHref="{{ route('tasks.create') }}"
                icon='<path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2" />' />
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-4">
                @foreach ($latestTasks as $task)
                    @php
                        $priorityColor = match($task->priority) {
                            'High' => 'text-red-700 bg-red-50 ring-red-600/20',
                            'Medium' => 'text-amber-700 bg-amber-50 ring-amber-600/20',
                            'Low' => 'text-slate-700 bg-slate-50 ring-slate-600/20',
                            default => 'text-slate-700 bg-slate-50 ring-slate-600/20',
                        };
                        $priorityLabel = match($task->priority) {
                            'High' => 'Tinggi',
                            'Medium' => 'Sedang',
                            'Low' => 'Rendah',
                            default => $task->priority,
                        };
                    @endphp
                    <x-dashboard.task-card
                        :title="$task->title"
                        :workspace="$task->workspace?->name ?? null"
                        :priority="$priorityLabel"
                        :priorityColor="$priorityColor"
                        :date="$task->due_date ? $task->due_date->format('d M Y') : '-'"
                        :progress="$task->progress ?? 0"
                        :done="$task->status === 'Done'"
                        :href="route('tasks.edit', $task)" />
                    {{-- Debug info --}}
                    @if($task->user_id !== auth()->id())
                        <small class="text-xs text-red-500">Task dari user: {{ $task->user?->name ?? 'Unknown' }} (ID: {{ $task->user_id }})</small>
                    @endif
                @endforeach
            </div>
        @endif
    </div>

</div>
