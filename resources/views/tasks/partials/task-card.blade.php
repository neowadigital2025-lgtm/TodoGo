@php
    $isDone = $task->status === 'Done';
    $priorityColor = match($task->priority) {
        'High' => 'red',
        'Medium' => 'yellow',
        'Low' => 'slate',
        default => 'slate',
    };
    $statusColor = match($task->status) {
        'Done' => 'green',
        'In Progress' => 'orange',
        'Todo' => 'slate',
        default => 'slate',
    };
@endphp

<div class="bg-white border border-slate-100 rounded-xl p-4 hover:shadow-sm
            transition-shadow duration-150 group relative">

    <div class="mb-3 flex items-center justify-between gap-2">
        <div class="flex items-center gap-2">
            @if ($isDone)
                <div class="w-5 h-5 rounded-full bg-blue-600 flex items-center justify-center shrink-0">
                    <svg class="w-3 h-3 text-white" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="3"
                         stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="20 6 9 17 4 12"/>
                    </svg>
                </div>
            @else
                <div class="w-5 h-5 rounded-full border-2 border-slate-200
                            group-hover:border-blue-400 transition-colors shrink-0"></div>
            @endif
        </div>
        <div class="flex min-w-0 items-center gap-2">
            <x-ui.badge :color="$priorityColor">{{ $task->priority }}</x-ui.badge>
            <div class="flex shrink-0 items-center gap-1">
        <a href="{{ route('tasks.edit', $task) }}" class="inline-flex min-h-8 min-w-8 items-center justify-center rounded border border-slate-100 bg-white text-slate-400 shadow-sm hover:text-blue-600 transition-colors" aria-label="Edit task">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
        </a>
        <form action="{{ route('tasks.destroy', $task) }}" method="POST" onsubmit="return confirm('Yakin hapus?');">
            @csrf @method('DELETE')
            <button type="submit" class="inline-flex min-h-8 min-w-8 items-center justify-center rounded border border-slate-100 bg-white text-slate-400 shadow-sm hover:text-red-600 transition-colors" aria-label="Hapus task">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
            </button>
        </form>
            </div>
        </div>
    </div>

    {{-- Title --}}
    <p class="break-words text-sm font-semibold text-slate-800 leading-snug mb-1
              {{ $isDone ? 'line-through text-slate-400' : '' }}">
        {{ $task->title }}
    </p>

    {{-- Workspace --}}
    <div class="flex items-center gap-1 mb-3">
        <svg class="w-3 h-3 text-slate-400 shrink-0" viewBox="0 0 24 24" fill="none"
             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/>
        </svg>
        <span class="text-xs text-blue-500 truncate">{{ $task->workspace?->name ?? 'No Workspace' }}</span>
    </div>

    {{-- Footer --}}
    <div class="flex items-center justify-between">
        <x-ui.badge :color="$statusColor" :dot="true">{{ $task->status }}</x-ui.badge>
        <span class="text-xs text-slate-400">{{ $task->due_date ? $task->due_date->format('d M Y') : '-' }}</span>
    </div>
</div>