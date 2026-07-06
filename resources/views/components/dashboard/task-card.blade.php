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

<li class="group flex items-center gap-4 px-5 py-3.5 hover:bg-slate-50 transition-colors duration-150">

    {{-- Checkbox indicator --}}
    <div class="shrink-0">
        @if ($done)
            <div class="w-5 h-5 rounded-full bg-blue-600 flex items-center justify-center">
                <svg class="w-3 h-3 text-white" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="20 6 9 17 4 12"/>
                </svg>
            </div>
        @else
            <div class="w-5 h-5 rounded-full border-2 border-slate-200
                        group-hover:border-blue-400 transition-colors duration-150"></div>
        @endif
    </div>

    {{-- Title + workspace --}}
    <div class="flex-1 min-w-0">
        <p class="text-sm font-medium truncate
                  {{ $done ? 'line-through text-slate-400' : 'text-slate-800' }}">
            {{ $title }}
        </p>
        <div class="flex items-center gap-1 mt-0.5">
            <svg class="w-3 h-3 text-slate-400 shrink-0" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/>
            </svg>
            <span class="text-xs text-blue-500 truncate">{{ $workspace }}</span>
        </div>
    </div>

    {{-- Priority badge --}}
    <span class="shrink-0 text-xs font-medium px-2.5 py-1 rounded-full {{ $priorityColor }}">
        {{ $priority }}
    </span>

    {{-- Date --}}
    <span class="shrink-0 text-xs text-slate-400 hidden sm:block">{{ $date }}</span>

</li>
