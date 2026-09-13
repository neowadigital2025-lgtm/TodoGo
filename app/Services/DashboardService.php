<?php

namespace App\Services;

class DashboardService
{
    public function getDashboardData()
    {
        $user = auth()->user();

        // Tasks Statistics
        $totalTasks = $user->tasks()->count();
        $completedTasks = $user->tasks()->where('status', 'Done')->count();
        $inProgressTasks = $user->tasks()->where('status', 'In Progress')->count();
        $todoTasks = $user->tasks()->where('status', 'Todo')->count();
        
        $today = now()->format('Y-m-d');
        $deadlineToday = $user->tasks()->whereDate('due_date', $today)->where('status', '!=', 'Done')->count();
        $overdueTasks = $user->tasks()->whereDate('due_date', '<', $today)->where('status', '!=', 'Done')->count();

        $completionPercentage = $totalTasks > 0 ? round(($completedTasks / $totalTasks) * 100) : 0;

        // Latest Active Tasks (show recent tasks, prioritizing today's due dates)
        // Force show all tasks for debugging
        $todaysTasks = $user->tasks()
        ->with('workspace')
        ->latest()
        ->take(5)
        ->get();
        
        // Add debug info to Laravel log
        \Log::info('Dashboard Debug', [
            'user_id' => $user->id ?? 'no-user',
            'user_tasks_count' => $user ? $user->tasks()->count() : 0,
            'all_tasks_count' => \App\Models\Task::count(),
            'todays_tasks_count' => $todaysTasks->count(),
            'todays_tasks' => $todaysTasks->pluck('title')->toArray()
        ]);

        // Upcoming Deadlines (Next 5 days only, excluding completed)
        $fiveDaysFromNow = now()->addDays(5)->format('Y-m-d');
        $deadlines = $user->tasks()
            ->with('workspace')
            ->where('status', '!=', 'Done')
            ->whereNotNull('due_date')
            ->whereDate('due_date', '>=', $today)
            ->whereDate('due_date', '<=', $fiveDaysFromNow)
            ->orderBy('due_date', 'asc')
            ->take(5)
            ->get();

        // Workspaces
        $workspaces = $user->workspaces()
            ->withCount('tasks')
            ->latest()
            ->get();

        // Notes
        $todayNotes = $user->notes()
            ->orderByDesc('pinned')
            ->latest()
            ->take(3)
            ->get();

        // Greeting
        $hour = now()->hour;
        if ($hour < 12) {
            $greeting = 'Good Morning';
        } elseif ($hour < 18) {
            $greeting = 'Good Afternoon';
        } else {
            $greeting = 'Good Evening';
        }

        return [
            'totalTasks' => $totalTasks,
            'completedTasks' => $completedTasks,
            'inProgressTasks' => $inProgressTasks,
            'todoTasks' => $todoTasks,
            'deadlineToday' => $deadlineToday,
            'overdueTasks' => $overdueTasks,
            'completionPercentage' => $completionPercentage,
            'todaysTasks' => $todaysTasks,
            'deadlines' => $deadlines,
            'workspaces' => $workspaces,
            'todayNotes' => $todayNotes,
            'greeting' => $greeting,
            'currentDate' => now()->translatedFormat('l, d F Y'),
        ];
    }
}
