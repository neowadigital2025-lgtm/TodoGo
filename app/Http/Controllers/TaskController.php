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
        
        // Search functionality
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
        }
        
        // Priority filter
        if ($request->filled('priority')) {
            $query->where('priority', $request->priority);
        }
        
        // Status filter
        if ($request->filled('status')) {
            $query->where('status', $request->status);
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
        
        return view('tasks.index', compact('tasks', 'groupedTasks', 'groupBy'));
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

        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}
