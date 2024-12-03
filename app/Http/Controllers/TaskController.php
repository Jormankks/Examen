<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Category;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    
    public function index()
    {
       
        $tasks = Task::with('category')->get();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('tasks.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        Task::create($validated);

        return redirect()->route('tasks.index')->with('success', 'Tarea creada con éxito.');
    }

    public function edit(Task $task)
    {
        $categories = Category::all();
        return view('tasks.edit', compact('task', 'categories'));
    }

    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        $task->update($validated);

        return redirect()->route('tasks.index')->with('success', 'Tarea actualizada con éxito.');
    }


    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Tarea eliminada con éxito.');
    }

    public function create()
{
    $categories = Category::all();
    return view('tasks.create', compact('categories'));
}

    public function markAsCompleted(Task $task)
    {
        $task->completed = true;
        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Tarea marcada como completada.');
    }
}
