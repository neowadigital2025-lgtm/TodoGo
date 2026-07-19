{{-- ════════════════════════════════════════════════════════
     Deadline Card  (single row in the upcoming deadlines list)
     Props:
       $title        — string   task title
       $workspace    — string   workspace name
       $date         — string   e.g. "23 Mei"
       $urgency      — string   e.g. "Besok" or "2 hari lagi"
       $urgencyColor — string   Tailwind text utility e.g. "text-red-500"
       $priority     — string   e.g. "Tinggi"
       $priorityColor— string   Tailwind text utility e.g. "text-red-500 bg-red-50"
════════════════════════════════════════════════════════ --}}

@props([
    'title'        => '',
    'workspace'    => '',
    'date'         => '',
    'urgency'      => '',
    'urgencyColor' => 'text-slate-400 bg-slate-50',
    'priority'     => 'Sedang',
    'priorityColor'=> 'text-slate-500 bg-slate-100',
])

<li class="group flex flex-col sm:flex-row sm:items-center gap-3 p-4 bg-slate-50/50 border border-slate-100 rounded-xl hover:bg-white hover:border-blue-100 hover:shadow-sm transition-all duration-300 cursor-pointer">

    {{-- Task + workspace --}}
    <div class="flex-1 min-w-0">
        <div class="flex items-center gap-2 mb-1.5">
            <span class="inline-flex items-center justify-center px-2 py-0.5 text-[10px] font-bold uppercase tracking-wider rounded-md {{ $priorityColor }} shrink-0">
                {{ $priority }}
            </span>
            <p class="text-sm font-bold text-slate-800 truncate group-hover:text-blue-700 transition-colors">{{ $title }}</p>
        </div>
        <div class="flex items-center gap-1.5 text-xs text-slate-500">
            <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/>
            </svg>
            <span class="truncate">{{ $workspace }}</span>
        </div>
    </div>

    {{-- Date + urgency --}}
    <div class="flex sm:flex-col items-center sm:items-end justify-between sm:justify-center shrink-0 mt-2 sm:mt-0 pt-2 sm:pt-0 border-t sm:border-t-0 border-slate-100">
        <p class="text-xs font-bold text-slate-700">{{ $date }}</p>
        <span class="inline-flex items-center gap-1.5 px-2 py-0.5 rounded-md text-[11px] font-bold mt-1 {{ $urgencyColor }}">
            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10"/>
                <polyline points="12 6 12 12 16 14"/>
            </svg>
            {{ $urgency }}
        </span>
    </div>

</li>
