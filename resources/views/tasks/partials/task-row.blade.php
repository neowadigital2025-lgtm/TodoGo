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

<li class="group flex flex-col gap-3 px-4 py-4
           sm:grid sm:grid-cols-12 sm:items-center sm:gap-4 sm:px-5 sm:py-3.5
           hover:bg-slate-50 transition-colors duration-150">

    {{-- Checkbox + title --}}
    <div class="flex min-w-0 items-center gap-3 sm:col-span-5">
        <div class="shrink-0">
            <form action="{{ route('tasks.toggleStatus', $task) }}" method="POST">
                @csrf
                @method('PATCH')

                <button type="submit">
                    @if ($isDone)
                        <div class="w-5 h-5 rounded-full bg-blue-600 flex items-center justify-center">
                            <svg class="w-3 h-3 text-white" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="3">
                                <polyline points="20 6 9 17 4 12"/>
                            </svg>
                        </div>
                    @else
                        <div class="w-5 h-5 rounded-full border-2 border-slate-300 hover:border-blue-500 transition-colors"></div>
                    @endif
                </button>
            </form>
        </div>
        <div class="min-w-0">
            <p class="break-words text-sm font-medium
                      {{ $isDone ? 'line-through text-slate-400' : 'text-slate-800' }}">
                {{ $task->title }}
            </p>
            <div class="flex items-center gap-1 mt-0.5">
                <svg class="w-3 h-3 text-slate-400 shrink-0" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2"
                     stroke-linecap="round" stroke-linejoin="round">
                    <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/>
                </svg>
                <span class="text-xs text-blue-500 truncate">{{ $task->workspace?->name ?? 'No Workspace' }}</span>
            </div>
        </div>
    </div>

    {{-- Mobile metadata and actions --}}
    <div class="flex items-center gap-2 pl-8 sm:hidden">
        <x-ui.badge :color="$priorityColor">{{ $task->priority }}</x-ui.badge>
        <x-ui.badge :color="$statusColor" :dot="true">{{ $task->status }}</x-ui.badge>
        <span class="ml-auto shrink-0 text-xs text-slate-500">{{ $task->due_date ? $task->due_date->format('d M Y') : '-' }}</span>
    </div>

    <div class="flex items-center justify-end gap-1 pl-8 sm:hidden">
        <a href="{{ route('tasks.edit', $task) }}" class="inline-flex min-h-10 items-center gap-2 rounded-md px-3 text-xs font-medium text-blue-600 hover:bg-blue-50 transition-colors">
            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
            </svg>
            Edit
        </a>
        <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus tugas ini?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="inline-flex min-h-10 items-center gap-2 rounded-md px-3 text-xs font-medium text-red-600 hover:bg-red-50 transition-colors">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                </svg>
                Hapus
            </button>
        </form>
    </div>

    {{-- Priority --}}
    <div class="hidden sm:flex col-span-2">
        <x-ui.badge :color="$priorityColor">{{ $task->priority }}</x-ui.badge>
    </div>

    {{-- Status --}}
    <div class="hidden sm:flex col-span-2">
        <x-ui.badge :color="$statusColor" :dot="true">{{ $task->status }}</x-ui.badge>
    </div>

    {{-- Date --}}
    <div class="hidden sm:block col-span-2">
        <span class="text-xs text-slate-500">{{ $task->due_date ? $task->due_date->format('d M Y') : '-' }}</span>
    </div>

    {{-- Actions --}}
    <div class="hidden sm:flex col-span-1 justify-end gap-1 opacity-0 group-hover:opacity-100 transition-opacity">
        <a href="{{ route('tasks.edit', $task) }}" class="p-1.5 rounded-md text-slate-400 hover:text-blue-600 hover:bg-blue-50 transition-colors" title="Edit">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
            </svg>
        </a>
        <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus tugas ini?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="p-1.5 rounded-md text-slate-400 hover:text-red-600 hover:bg-red-50 transition-colors" title="Hapus">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                </svg>
            </button>
        </form>
    </div>
</li>