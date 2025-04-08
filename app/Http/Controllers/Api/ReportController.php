<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{

    public function index()
    {
        return response()->json(Report::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'project_id' => 'required|exists:projects,id',
        ]);

        $report = Report::create($request->all());

        return response()->json($report, 201);
    }

    public function show(Report $report)
    {
        return response()->json($report);
    }

    public function update(Request $request, Report $report)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'content' => 'nullable|string',
        ]);

        $report->update($request->all());

        return response()->json($report);
    }

    public function destroy(Report $report)
    {
        $report->delete();

        return response()->json(null, 204);
    }
}
