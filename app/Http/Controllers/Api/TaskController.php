<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function index()
    {
        return response()->json(Task::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'project_id' => 'required|exists:projects,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|string',
            'due_date' => 'nullable|date',
            'progress' => 'required|integer|between:0,100',
        ]);

        $task = Task::create($request->all());

        return response()->json($task, 201);
    }

    public function show(Task $task)
    {
        return response()->json($task);
    }


    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'status' => 'nullable|string',
            'due_date' => 'nullable|date',
            'progress' => 'nullable|integer|between:0,100',
        ]);

        $task->update($request->all());

        return response()->json($task);
    }


    public function destroy(Task $task)
    {
        $task->delete();

        return response()->json(null, 204);
    }
}
