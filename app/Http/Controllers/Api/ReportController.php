<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('viewAny', Report::class);

        return response()->json(Report::all());
    }

    public function store(Request $request)
    {
        $this->authorize('create', Report::class);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $report = Report::create($validated);

        return response()->json($report, 201);
    }

    public function show(Report $report)
    {
        $this->authorize('view', $report);

        return response()->json($report);
    }

    public function update(Request $request, Report $report)
    {
        $this->authorize('update', $report);

        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'content' => 'nullable|string',
        ]);

        $report->update($validated);

        return response()->json($report);
    }

    public function destroy(Report $report)
    {
        $this->authorize('delete', $report);

        $report->delete();

        return response()->json(['message' => 'Report deleted']);
    }
}
