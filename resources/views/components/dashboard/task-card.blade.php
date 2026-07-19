{{-- ════════════════════════════════════════════════════════
     Task Card  (single row in the "Tugas Terbaru" list)
     Props:
       $title          — string   task title
       $workspace      — string   workspace name
       $priority       — string   e.g. "Tinggi"
       $priorityColor  — string   Tailwind classes e.g. "text-red-500 bg-red-50"
       $date           — string   e.g. "23 Mei 2025"
       $done           — bool     whether task is completed (default false)

     Usage:
       <x-dashboard.task-card
           title="Membuat desain landing page"
           workspace="TodoGo Development"
           priority="Tinggi"
           priorityColor="text-red-500 bg-red-50"
           date="23 Mei 2025"
           :done="false" />
════════════════════════════════════════════════════════ --}}

@props([
    'title'         => '',
    'workspace'     => '',
    'priority'      => '',
    'priorityColor' => 'text-slate-500 bg-slate-100',
    'date'          => '',
    'done'          => false,
])

<li class="group flex items-center gap-4 p-4 mb-3 last:mb-0 bg-white border border-slate-100 rounded-2xl hover:border-blue-100 hover:shadow-md transition-all duration-300 hover:-translate-y-0.5 cursor-pointer">

    {{-- Checkbox indicator --}}
    <div class="shrink-0 relative">
        @if ($done)
            <div class="w-6 h-6 rounded-full bg-blue-600 flex items-center justify-center shadow-sm shadow-blue-200">
                <svg class="w-3.5 h-3.5 text-white" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="20 6 9 17 4 12"/>
                </svg>
            </div>
        @else
            <div class="w-6 h-6 rounded-full border-2 border-slate-200
                        group-hover:border-blue-400 group-hover:bg-blue-50 transition-colors duration-200"></div>
        @endif
    </div>

    {{-- Title + workspace --}}
    <div class="flex-1 min-w-0">
        <p class="text-sm font-semibold truncate transition-colors duration-200
                  {{ $done ? 'line-through text-slate-400' : 'text-slate-800 group-hover:text-blue-700' }}">
            {{ $title }}
        </p>
        <div class="flex items-center gap-1.5 mt-1">
            <div class="w-4 h-4 rounded bg-slate-100 flex items-center justify-center shrink-0">
                <svg class="w-2.5 h-2.5 text-slate-500" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/>
                </svg>
            </div>
            <span class="text-xs font-medium text-slate-500 truncate">{{ $workspace }}</span>
        </div>
    </div>

    {{-- Right section --}}
    <div class="flex flex-col sm:flex-row items-end sm:items-center gap-2 sm:gap-4 shrink-0">
        {{-- Priority badge --}}
        <span class="inline-flex items-center justify-center px-2.5 py-1 text-[10px] font-bold uppercase tracking-wider rounded-md {{ $priorityColor }}">
            {{ $priority }}
        </span>

        {{-- Date --}}
        <div class="flex items-center gap-1.5 text-xs font-medium text-slate-400 group-hover:text-slate-500 transition-colors duration-200">
            <svg class="w-3.5 h-3.5 hidden sm:block" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                <line x1="16" y1="2" x2="16" y2="6"/>
                <line x1="8" y1="2" x2="8" y2="6"/>
                <line x1="3" y1="10" x2="21" y2="10"/>
            </svg>
            <span class="hidden sm:block">{{ $date }}</span>
        </div>
    </div>

</li>
