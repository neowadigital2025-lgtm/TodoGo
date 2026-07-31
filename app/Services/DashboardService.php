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

        // Latest Tasks
        $latestTasks = $user->tasks()
            ->with('workspace')
            ->latest()
            ->take(5)
            ->get();

        // Upcoming Deadlines (Next 5 nearest deadlines, excluding completed)
        $deadlines = $user->tasks()
            ->with('workspace')
            ->where('status', '!=', 'Done')
            ->whereNotNull('due_date')
            ->whereDate('due_date', '>=', $today)
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
            'latestTasks' => $latestTasks,
            'deadlines' => $deadlines,
            'workspaces' => $workspaces,
            'todayNotes' => $todayNotes,
            'greeting' => $greeting,
            'currentDate' => now()->translatedFormat('l, d F Y'),
        ];
    }
}
