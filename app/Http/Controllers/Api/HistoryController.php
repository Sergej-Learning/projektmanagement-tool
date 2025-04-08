<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\History;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index()
    {
        return response()->json(History::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'action' => 'required|string',
            'description' => 'nullable|string',
            'user_id' => 'required|exists:users,id',
        ]);

        $history = History::create($request->all());

        return response()->json($history, 201);
    }

    public function show(History $history)
    {
        return response()->json($history);
    }

    public function destroy(History $history)
    {
        $history->delete();

        return response()->json(null, 204);
    }
}
