<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('viewAny', Task::class);

        return response()->json(Task::all());
    }

    public function store(Request $request)
    {
        $this->authorize('create', Task::class);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'project_id' => 'required|exists:projects,id',
        ]);

        $task = Task::create($validated);

        return response()->json($task, 201);
    }

    public function show(Task $task)
    {
        $this->authorize('view', $task);

        return response()->json($task);
    }


    public function update(Request $request, Task $task)
    {
        $this->authorize('update', $task);

        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $task->update($validated);

        return response()->json($task);
    }


    public function destroy(Task $task)
    {
        $this->authorize('delete', $task);

        $task->delete();

        return response()->json(['message' => 'Task deleted']);
    }
}
