{{-- ════════════════════════════════════════════════════════
     Workspace Card
     Props:
       $name        — string   workspace name
       $taskCount   — int      number of tasks
       $color       — string   Tailwind bg utility for the folder icon e.g. "bg-blue-500"
       $memberCount — int      number of members shown as avatars
════════════════════════════════════════════════════════ --}}

@props([
    'name'        => '',
    'taskCount'   => 0,
    'color'       => 'bg-slate-400',
    'memberCount' => 1,
])

@php 
    $shown = min($memberCount, 3); 
    // Mocking a random progress percentage for demo purposes since it's not in the array
    $progress = rand(30, 90);
@endphp

<div class="bg-white p-5 border border-slate-100 rounded-2xl hover:border-blue-100 hover:shadow-md transition-all duration-300 hover:-translate-y-0.5 cursor-pointer flex flex-col h-full group">

    {{-- Top section --}}
    <div class="flex items-start justify-between mb-4">
        <div class="w-10 h-10 rounded-xl {{ $color }} flex items-center justify-center shrink-0 shadow-sm transition-transform duration-300 group-hover:scale-110">
            <svg class="w-5 h-5 text-white" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/>
            </svg>
        </div>
        
        {{-- Mini avatars --}}
        <div class="flex -space-x-2">
            @for ($i = 0; $i < $shown; $i++)
                <div class="w-7 h-7 rounded-full border-2 border-white overflow-hidden bg-slate-200 shrink-0">
                    <img src="https://ui-avatars.com/api/?name=M{{ $i + 1 }}&background=94a3b8&color=fff&size=28&bold=true"
                         alt="member" class="w-full h-full object-cover" />
                </div>
            @endfor
    
            @if ($memberCount > 3)
                <div class="w-7 h-7 rounded-full border-2 border-white bg-slate-100 flex items-center justify-center shrink-0">
                    <span class="text-[10px] font-bold text-slate-500">
                        +{{ $memberCount - 3 }}
                    </span>
                </div>
            @endif
        </div>
    </div>

    {{-- Info --}}
    <div class="mb-4 flex-1">
        <p class="text-sm font-bold text-slate-800 truncate leading-tight group-hover:text-blue-700 transition-colors">{{ $name }}</p>
        <p class="text-xs font-medium text-slate-400 mt-1">{{ $taskCount }} tugas aktif</p>
    </div>

    {{-- Progress bar --}}
    <div>
        <div class="flex justify-between text-xs font-semibold mb-1.5">
            <span class="text-slate-500">Progress</span>
            <span class="text-slate-700">{{ $progress }}%</span>
        </div>
        <div class="w-full h-1.5 bg-slate-100 rounded-full overflow-hidden">
            <div class="h-full {{ $color }} rounded-full" style="width: {{ $progress }}%"></div>
        </div>
    </div>

</div>
