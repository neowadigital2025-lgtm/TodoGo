<?php

namespace App\Http\Controllers;

use App\Models\Workspace;
use App\Http\Requests\StoreWorkspaceRequest;
use App\Http\Requests\UpdateWorkspaceRequest;
use Illuminate\Http\Request;

class WorkspaceController extends Controller
{
    public function index()
    {
        $workspaces = auth()->user()->workspaces()->withCount('tasks')->latest()->get();
        return view('workspaces.index', compact('workspaces'));
    }

    public function create()
    {
        return view('workspaces.create');
    }

    public function store(StoreWorkspaceRequest $request)
    {
        auth()->user()->workspaces()->create($request->validated());
        return redirect()->route('workspaces.index')->with('success', 'Workspace created successfully.');
    }

    public function show(Workspace $workspace)
    {
        if ($workspace->user_id !== auth()->id()) {
            abort(403);
        }
        return view('workspaces.show', compact('workspace'));
    }

    public function edit(Workspace $workspace)
    {
        if ($workspace->user_id !== auth()->id()) {
            abort(403);
        }
        return view('workspaces.edit', compact('workspace'));
    }

    public function update(UpdateWorkspaceRequest $request, Workspace $workspace)
    {
        if ($workspace->user_id !== auth()->id()) {
            abort(403);
        }
        $workspace->update($request->validated());
        return redirect()->route('workspaces.index')->with('success', 'Workspace updated successfully.');
    }

    public function destroy(Workspace $workspace)
    {
        if ($workspace->user_id !== auth()->id()) {
            abort(403);
        }
        $workspace->delete(); // Database cascade deletes related tasks
        return redirect()->route('workspaces.index')->with('success', 'Workspace deleted successfully.');
    }
}
