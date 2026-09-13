{{-- ============================================================
     Stats Section
     Props:
       $totalTasks          — int   total tasks for the user
       $completedTasks      — int   tasks with status = Done
       $inProgressTasks     — int   tasks with status = In Progress
       $todoTasks           — int   tasks with status = Todo
       $deadlineToday       — int   tasks due today (not Done)
       $overdueTasks        — int   tasks past due (not Done)
       $completionPercentage — int  0-100

     Usage: <x-dashboard.stats-section :totalTasks="$totalTasks" ... />
============================================================ --}}

@props([
    'totalTasks'           => 0,
    'completedTasks'       => 0,
    'inProgressTasks'      => 0,
    'todoTasks'            => 0,
    'deadlineToday'        => 0,
    'overdueTasks'         => 0,
    'completionPercentage' => 0,
])

<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5">

    {{-- Total Tasks --}}
    <x-dashboard.stats-card
        title="Total Tugas"
        :value="$totalTasks"
        description="Semua tugas aktif"
        color="blue"
        :href="route('tasks.index')"
    >
        <x-slot:icon>
            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                 stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                <line x1="16" y1="2" x2="16" y2="6"/>
                <line x1="8"  y1="2" x2="8"  y2="6"/>
                <line x1="3"  y1="10" x2="21" y2="10"/>
            </svg>
        </x-slot:icon>
    </x-dashboard.stats-card>

    {{-- Completed --}}
    <x-dashboard.stats-card
        title="Selesai"
        :value="$completedTasks"
        :description="$completionPercentage . '% dari total tugas'"
        color="green"
        :href="route('tasks.index', ['status' => 'Done'])"
    >
        <x-slot:icon>
            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                 stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="9 11 12 14 22 4"/>
                <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/>
            </svg>
        </x-slot:icon>
    </x-dashboard.stats-card>

    {{-- In Progress --}}
    <x-dashboard.stats-card
        title="Dalam Proses"
        :value="$inProgressTasks"
        description="Sedang dikerjakan"
        color="yellow"
        :href="route('tasks.index', ['status' => 'In Progress'])"
    >
        <x-slot:icon>
            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                 stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10"/>
                <polyline points="12 6 12 12 16 14"/>
            </svg>
        </x-slot:icon>
    </x-dashboard.stats-card>

    {{-- Deadline Today --}}
    <x-dashboard.stats-card
        title="Deadline Hari Ini"
        :value="$deadlineToday"
        :description="$overdueTasks > 0 ? $overdueTasks . ' tugas terlambat' : 'Tidak ada yang terlambat'"
        color="red"
        :href="route('tasks.index', ['filter' => 'today_overdue'])"
    >
        <x-slot:icon>
            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                 stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/>
                <line x1="12" y1="9" x2="12" y2="13"/>
                <line x1="12" y1="17" x2="12.01" y2="17"/>
            </svg>
        </x-slot:icon>
    </x-dashboard.stats-card>

</div>
