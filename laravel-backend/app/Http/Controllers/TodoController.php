<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        return Todo::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|min:3|max:255',
            'description' => 'nullable|string|max:500',
        ]);

        $todo = Todo::create($validated);

        return response()->json([
            'message' => 'Todo created successfully.',
            'data' => $todo,
        ], 201);
    }

    public function show(Todo $todo)
    {
        return $todo;
    }

    public function update(Request $request, Todo $todo)
    {
        $validated = $request->validate([
            'title' => 'required|string|min:3|max:255',
            'description' => 'nullable|string|max:500',
        ]);

        $todo->update($validated);

        return response()->json([
            'message' => 'Todo updated successfully.',
            'data' => $todo,
        ], 200);
    }


    public function destroy(Todo $todo)
    {
        $todo->delete();

        return response()->json(null, 204);
    }
}
