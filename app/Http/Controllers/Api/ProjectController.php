<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the projects.
     */
    public function index()
    {
        $this->authorize('viewAny', Project::class);

        return response()->json(Project::all());
    }


    public function store(Request $request)
    {
        $this->authorize('create', Project::class);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $project = Project::create($validated);

        return response()->json($project, 201);
    }


    public function show(Project $project)
    {
        $this->authorize('view', $project);

        return response()->json($project);
    }


    public function update(Request $request, Project $project)
    {
        $this->authorize('update', $project);

        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $project->update($validated);

        return response()->json($project);
    }

    public function destroy(Project $project)
    {
        $this->authorize('delete', $project);

        $project->delete();

        return response()->json(['message' => 'Project deleted']);
    }
}
