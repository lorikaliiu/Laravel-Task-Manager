<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $query = auth()->user()->tasks()->orderBy('created_at', 'desc');

        if (isset($request->search)) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }
        
        if (isset($request->priority)) {
            $query->where('priority', $request->priority);
        }
        
        if (isset($request->status)) {
            $query->where('status', $request->status);
        }
        $tasks = $query->get();

        return view('tasks.index', compact('tasks'));
    }


    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'priority' => 'nullable|integer|in:1,2,3',
        ]);

        auth()->user()->tasks()->create($validated + ['status' => false]);
        return redirect()->route('tasks.index')->with('success', 'Task created successfully!');
    }


    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'status' => 'required|boolean',
            'priority' => 'nullable|integer|in:1,2,3',
        ]);

        $task->update($validated);
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!');
    }
}
