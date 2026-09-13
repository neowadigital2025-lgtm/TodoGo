<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $query = auth()->user()->tasks()->with('workspace');

        // Get completed tasks
        $completedTasks = auth()->user()
            ->tasks()
            ->where('status', 'Done')
            ->get();
            $completedCount = $completedTasks->count();
        
        // Search functionality
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }
        
        // Priority filter
        if ($request->filled('priority')) {
            $query->where('priority', $request->priority);
        }
        
        // Status filter
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Deadline / Filter functionality
        if ($request->filled('filter')) {
            $today = now()->format('Y-m-d');
            if ($request->filter === 'today_overdue') {
                $query->whereNotNull('due_date')
                      ->whereDate('due_date', '<=', $today)
                      ->where('status', '!=', 'Done');
            } elseif ($request->filter === 'today') {
                $query->whereNotNull('due_date')
                      ->whereDate('due_date', '=', $today)
                      ->where('status', '!=', 'Done');
            } elseif ($request->filter === 'overdue') {
                $query->whereNotNull('due_date')
                      ->whereDate('due_date', '<', $today)
                      ->where('status', '!=', 'Done');
            } elseif ($request->filter === 'mendatang') {
                $fiveDaysFromNow = now()->addDays(5)->format('Y-m-d');
                $query->whereNotNull('due_date')
                      ->whereDate('due_date', '>=', $today)
                      ->whereDate('due_date', '<=', $fiveDaysFromNow)
                      ->where('status', '!=', 'Done');
            }
        }
        
        // Get tasks with sorting
        $tasks = $query->latest()->get();
        
        // Group tasks for display if filtering by priority or status
        $groupedTasks = null;
        $groupBy = null;
        
        if ($request->filled('priority')) {
            $groupBy = 'priority';
            $priorityOrder = ['High', 'Medium', 'Low'];
            $grouped = $tasks->groupBy('priority');
            $groupedTasks = collect();
            
            // Sort groups by priority order
            foreach ($priorityOrder as $priority) {
                if ($grouped->has($priority)) {
                    $groupedTasks->put($priority, $grouped->get($priority));
                }
            }
        } elseif ($request->filled('status')) {
            $groupBy = 'status';
            $statusOrder = ['Todo', 'In Progress', 'Done'];
            $grouped = $tasks->groupBy('status');
            $groupedTasks = collect();
            
            // Sort groups by status order
            foreach ($statusOrder as $status) {
                if ($grouped->has($status)) {
                    $groupedTasks->put($status, $grouped->get($status));
                }
            }
        }
        
        return view('tasks.index', compact(
            'tasks',
            'groupedTasks',
            'groupBy',
            'completedTasks',
            'completedCount'
        ));
    }

    public function create()
    {
        $workspaces = auth()->user()->workspaces;
        return view('tasks.create', compact('workspaces'));
    }

    public function store(StoreTaskRequest $request)
    {
        auth()->user()->tasks()->create($request->validated());

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    public function show(Task $task)
    {
        if ($task->user_id !== auth()->id()) {
            abort(403);
        }

        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        if ($task->user_id !== auth()->id()) {
            abort(403);
        }

        $workspaces = auth()->user()->workspaces;
        return view('tasks.edit', compact('task', 'workspaces'));
    }

    public function update(UpdateTaskRequest $request, Task $task)
    {
        if ($task->user_id !== auth()->id()) {
            abort(403);
        }

        $task->update($request->validated());

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    public function destroy(Task $task)
    {
        if ($task->user_id !== auth()->id()) {
            abort(403);
        }

        $task->forceDelete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }

    public function toggleStatus(Task $task)
{
    // Pastikan task milik user yang login
    abort_if($task->user_id !== auth()->id(), 403);

    if ($task->status === 'Done') {
        $task->update([
            'status' => 'Todo',
            'progress' => 0,
        ]);
    } else {
        $task->update([
            'status' => 'Done',
            'progress' => 100,
        ]);
    }

    return back()->with('success', 'Status tugas berhasil diperbarui.');
}

    public function destroyCompleted()
{
    $deleted = auth()->user()
        ->tasks()
        ->where('status', 'Done')
        ->forceDelete();

    if ($deleted === 0) {
        return back()->with('info', 'Tidak ada tugas yang telah selesai untuk dihapus.');
    }

    return back()->with('success', "{$deleted} tugas berhasil dihapus.");
}
}
