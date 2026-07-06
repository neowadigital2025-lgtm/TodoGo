{{-- ════════════════════════════════════════════════════════
     Deadline Card  (single row in the upcoming deadlines list)
     Props:
       $title        — string   task title
       $workspace    — string   workspace name
       $date         — string   e.g. "23 Mei"
       $urgency      — string   e.g. "Besok" or "2 hari lagi"
       $urgencyColor — string   Tailwind text utility e.g. "text-red-500"
       $dotColor     — string   Tailwind bg utility for the dot  e.g. "bg-red-400"

     Usage:
       <x-dashboard.deadline-card
           title="Membuat desain landing page"
           workspace="TodoGo Development"
           date="23 Mei"
           urgency="Besok"
           urgencyColor="text-red-500"
           dotColor="bg-red-400" />
════════════════════════════════════════════════════════ --}}

@props([
    'title'        => '',
    'workspace'    => '',
    'date'         => '',
    'urgency'      => '',
    'urgencyColor' => 'text-slate-400',
    'dotColor'     => 'bg-slate-400',
])

<li class="flex items-center gap-3 px-5 py-3.5 hover:bg-slate-50 transition-colors duration-150">

    {{-- Dot indicator --}}
    <div class="w-8 h-8 rounded-lg bg-slate-50 flex items-center justify-center shrink-0">
        <span class="w-2.5 h-2.5 rounded-full {{ $dotColor }}"></span>
    </div>

    {{-- Task + workspace --}}
    <div class="flex-1 min-w-0">
        <p class="text-xs font-semibold text-slate-800 truncate">{{ $title }}</p>
        <p class="text-[11px] text-slate-400 truncate mt-0.5">{{ $workspace }}</p>
    </div>

    {{-- Date + urgency --}}
    <div class="text-right shrink-0">
        <p class="text-xs font-semibold text-slate-700">{{ $date }}</p>
        <p class="text-[11px] font-medium {{ $urgencyColor }} mt-0.5">{{ $urgency }}</p>
    </div>

</li>
