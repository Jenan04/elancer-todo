<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Enums\TaskStatus;
use Illuminate\Validation\Rule;
class TaskController extends Controller
{

    public function index() {
        $tasks = Task::latest()->get();
        $remainingTasksCount = $tasks->where('status', TaskStatus::ACTIVE->value)->count();

    $categoryCounts = [
        'work' => $tasks->where('client_or_project', '!=', null)->count(),
        'personal' => $tasks->where('client_or_project', null)->count(),
        'health' => 0 
    ];

      return view('tasks.index', compact('tasks', 'remainingTasksCount', 'categoryCounts'));

    }


    public function create() {
    return view('tasks.create'); 
   }
   
    public function store(Request $request) {
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
    ]);

    $task = Task::create($validated);

    return redirect()->route('tasks.index')->with('sucess', 'created task successfully');

    }

    public function edit(Task $task) {
    return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task) {
    $validated = $request->validate([
        'title' => 'sometimes|required|string|max:255',
        'description' => 'nullable|string',
        'status' => ['sometimes', 'required', Rule::enum(TaskStatus::class)],
    ]);

    if (isset($validated['status']) && $validated['status'] === TaskStatus::COMPLETED->value) {
        $task->completed_at = now();
    } elseif (isset($validated['status']) && $validated['status'] === TaskStatus::ACTIVE->value) {
        $task->completed_at = null;
    }

    $task->update($validated);

    return redirect()->route('tasks.index')->with('success', 'updated successfully!');
}

public function destroy(Task $task)
{
    $task->delete();

    return redirect()->route('tasks.index')->with('success', 'updated successfully!');
}

}
