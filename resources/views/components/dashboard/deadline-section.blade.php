@props(['deadlines' => collect()])

<div class="bg-white border border-slate-100 rounded-2xl shadow-[0_2px_10px_-3px_rgba(6,81,237,0.05)] overflow-hidden flex flex-col min-h-[300px] transition-all duration-300">

    {{-- Header --}}
    <div class="flex items-center justify-between px-6 py-5 border-b border-slate-100/60 bg-white/50 backdrop-blur-sm">
        <div class="flex items-center gap-3">
            <h2 class="text-lg font-bold text-slate-800 tracking-tight">Deadline 5 Hari Ini</h2>
            @if(!$deadlines->isEmpty())
                <span class="px-2 py-0.5 rounded-full bg-red-50 text-red-600 text-xs font-semibold">{{ count($deadlines) }}</span>
            @endif
        </div>
        <a href="{{ route('calendar') }}" class="group flex items-center gap-1 text-sm font-semibold text-blue-600 hover:text-blue-700 transition-colors">
            <span>Kalender</span>
            <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </a>
    </div>

    {{-- Deadline list --}}
    <div class="p-6 flex-1 flex flex-col bg-slate-50/30">
        @if ($deadlines->isEmpty())
            <x-ui.empty-state
                title="Tidak ada deadline 5 hari ini"
                description="Semua tugas Anda aman untuk 5 hari ke depan."
                icon='<circle cx="12" cy="12" r="10"/><path d="M12 8v4l3 3"/>' />
        @else
            <ul class="flex flex-col gap-3">
                @foreach ($deadlines as $dl)
                    @php
                        $daysRemaining = now()->startOfDay()->diffInDays($dl->due_date->startOfDay(), false);
                        if ($daysRemaining < 0) {
                            $urgency = 'Terlambat';
                            $urgencyColor = 'text-red-700 bg-red-50';
                        } elseif ($daysRemaining === 0) {
                            $urgency = 'Hari Ini';
                            $urgencyColor = 'text-red-600 bg-red-50';
                        } elseif ($daysRemaining === 1) {
                            $urgency = 'Besok';
                            $urgencyColor = 'text-red-500 bg-red-50';
                        } else {
                            $urgency = "Dalam $daysRemaining Hari";
                            $urgencyColor = $daysRemaining <= 3 ? 'text-amber-600 bg-amber-50' : 'text-emerald-600 bg-emerald-50';
                        }

                        $priorityColor = match($dl->priority) {
                            'High' => 'text-red-700 bg-red-100/50',
                            'Medium' => 'text-amber-700 bg-amber-100/50',
                            'Low' => 'text-emerald-700 bg-emerald-100/50',
                            default => 'text-slate-700 bg-slate-100/50',
                        };
                        $priorityLabel = match($dl->priority) {
                            'High' => 'Tinggi',
                            'Medium' => 'Sedang',
                            'Low' => 'Rendah',
                            default => $dl->priority,
                        };
                    @endphp
                    <x-dashboard.deadline-card
                        :title="$dl->title"
                        :workspace="$dl->workspace?->name ?? 'No Workspace'"
                        :date="$dl->due_date ? $dl->due_date->format('d M Y') : '-'"
                        :urgency="$urgency"
                        :urgencyColor="$urgencyColor"
                        :priority="$priorityLabel"
                        :priorityColor="$priorityColor"
                        :href="route('tasks.edit', $dl)" />
                @endforeach
            </ul>
        @endif
    </div>

</div>
