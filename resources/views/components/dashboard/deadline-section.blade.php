@php
    $deadlines = [
        [
            'title' => 'Submit Proposal UI/UX',
            'workspace' => 'Design Team',
            'date' => 'Besok',
            'urgency' => 'Hampir Habis',
            'urgencyColor' => 'text-red-600 bg-red-50',
            'priority' => 'Tinggi',
            'priorityColor' => 'text-red-700 bg-red-100/50'
        ],
        [
            'title' => 'Review PR Auth Module',
            'workspace' => 'Engineering',
            'date' => '24 Jul',
            'urgency' => 'Dalam 2 Hari',
            'urgencyColor' => 'text-amber-600 bg-amber-50',
            'priority' => 'Sedang',
            'priorityColor' => 'text-amber-700 bg-amber-100/50'
        ],
        [
            'title' => 'Finalisasi Laporan Keuangan',
            'workspace' => 'Finance',
            'date' => '25 Jul',
            'urgency' => 'Dalam 3 Hari',
            'urgencyColor' => 'text-emerald-600 bg-emerald-50',
            'priority' => 'Rendah',
            'priorityColor' => 'text-emerald-700 bg-emerald-100/50'
        ]
    ];

    // Simulate empty state
    // $deadlines = [];
@endphp

<div class="bg-white border border-slate-100 rounded-2xl shadow-[0_2px_10px_-3px_rgba(6,81,237,0.05)] overflow-hidden flex flex-col min-h-[300px] transition-all duration-300">

    {{-- Header --}}
    <div class="flex items-center justify-between px-6 py-5 border-b border-slate-100/60 bg-white/50 backdrop-blur-sm">
        <div class="flex items-center gap-3">
            <h2 class="text-lg font-bold text-slate-800 tracking-tight">Deadline Mendatang</h2>
            @if(!empty($deadlines))
                <span class="px-2 py-0.5 rounded-full bg-red-50 text-red-600 text-xs font-semibold">{{ count($deadlines) }}</span>
            @endif
        </div>
        <a href="#" class="group flex items-center gap-1 text-sm font-semibold text-blue-600 hover:text-blue-700 transition-colors">
            <span>Kalender</span>
            <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </a>
    </div>

    {{-- Deadline list --}}
    <div class="p-6 flex-1 flex flex-col bg-slate-50/30">
        @if (empty($deadlines))
            <x-dashboard.empty-deadline />
        @else
            <ul class="flex flex-col gap-3">
                @foreach ($deadlines as $dl)
                    <x-dashboard.deadline-card
                        :title="$dl['title']"
                        :workspace="$dl['workspace']"
                        :date="$dl['date']"
                        :urgency="$dl['urgency']"
                        :urgencyColor="$dl['urgencyColor']"
                        :priority="$dl['priority']"
                        :priorityColor="$dl['priorityColor']" />
                @endforeach
            </ul>
        @endif
    </div>

</div>
