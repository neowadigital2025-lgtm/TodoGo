<div class="bg-white border border-slate-100 rounded-2xl shadow-[0_2px_10px_-3px_rgba(6,81,237,0.05)] overflow-hidden flex flex-col min-h-[300px] transition-all duration-300">

    {{-- Header --}}
    <div class="flex items-center justify-between px-6 py-5 border-b border-slate-100/60 bg-white/50 backdrop-blur-sm">
        <div class="flex items-center gap-3">
            <h2 class="text-lg font-bold text-slate-800 tracking-tight">Tugas Terbaru</h2>
            @if(!empty($tasks))
                <span class="px-2 py-0.5 rounded-full bg-blue-50 text-blue-600 text-xs font-semibold">{{ count($tasks) }}</span>
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
        @if (empty($tasks))
            <x-dashboard.empty-task />
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-4">
                @foreach ($tasks as $task)
                    <x-dashboard.task-card
                        :title="$task['title']"
                        :workspace="$task['workspace']"
                        :priority="$task['priority']"
                        :priorityColor="$task['priorityColor']"
                        :date="$task['date']"
                        :progress="$task['progress']"
                        :done="$task['done']" />
                @endforeach
            </div>
        @endif
    </div>

</div>
