{{-- ════════════════════════════════════════════════════════
     Workspace Card  (single cell in the workspace grid)
     Props:
       $name        — string   workspace name
       $taskCount   — int      number of tasks
       $color       — string   Tailwind bg utility for the folder icon e.g. "bg-blue-500"
       $memberCount — int      number of members shown as avatars (max 3 shown + overflow)

     Usage:
       <x-dashboard.workspace-card
           name="TodoGo Development"
           :taskCount="12"
           color="bg-blue-500"
           :memberCount="3" />
════════════════════════════════════════════════════════ --}}

@props([
    'name'        => '',
    'taskCount'   => 0,
    'color'       => 'bg-slate-400',
    'memberCount' => 1,
])

@php $shown = min($memberCount, 3); @endphp

<div class="bg-white p-4 hover:bg-slate-50 transition-colors duration-150 cursor-pointer">

    {{-- Folder icon + name --}}
    <div class="flex items-center gap-2 mb-2">
        <div class="w-7 h-7 rounded-lg {{ $color }} flex items-center justify-center shrink-0">
            <svg class="w-3.5 h-3.5 text-white" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/>
            </svg>
        </div>
        <p class="text-xs font-semibold text-slate-700 truncate leading-tight">{{ $name }}</p>
    </div>

    {{-- Task count --}}
    <p class="text-xs text-slate-400 mb-2">{{ $taskCount }} tugas</p>

    {{-- Mini avatars --}}
    <div class="flex -space-x-1.5">
        @for ($i = 0; $i < $shown; $i++)
            <div class="w-5 h-5 rounded-full border-2 border-white overflow-hidden bg-slate-200 shrink-0">
                <img src="https://ui-avatars.com/api/?name=M{{ $i + 1 }}&background=94a3b8&color=fff&size=20&bold=true"
                     alt="member" class="w-full h-full object-cover" />
            </div>
        @endfor

        @if ($memberCount > 3)
            <div class="w-5 h-5 rounded-full border-2 border-white bg-slate-100
                        flex items-center justify-center shrink-0">
                <span class="text-[9px] font-semibold text-slate-500">
                    +{{ $memberCount - 3 }}
                </span>
            </div>
        @endif
    </div>

</div>
