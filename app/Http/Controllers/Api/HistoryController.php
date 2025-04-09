<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\History;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    use AuthorizesRequests;
    public function index()
    {
        $this->authorize('viewAny', History::class);

        return response()->json(History::all());
    }

    public function store(Request $request)
    {
        $this->authorize('create', History::class);

        $validated = $request->validate([
            'action' => 'required|string',
            'user_id' => 'required|exists:users,id',
        ]);

        $history = History::create($validated);

        return response()->json($history, 201);
    }

    public function show(History $history)
    {
        $this->authorize('view', $history);

        return response()->json($history);
    }

    public function update(Request $request, History $history)
    {
        $this->authorize('update', $history);

        $validated = $request->validate([
            'action' => 'string'
        ]);

        $history->update($validated);

        return response()->json($history);
    }

    public function destroy(History $history)
    {
        $this->authorize('delete', $history);

        $history->delete();

        return response()->json(['message' => 'History deleted']);
    }
}
