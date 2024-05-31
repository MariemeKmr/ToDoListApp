<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;


class TaskController extends Controller
{
    public function index()
    {
        $tasks = auth()->user()->tasks;
        return view('userDashboard', compact('tasks'));
    }

    public function create()
    {
        $task = new Task();
        return view('createTask',['task' => $task]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|string',
        ]);

        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => auth()->id(),
            'status' => $request->status,
        ]);

        return redirect()->route('user.dashboard');
    }

    public function show(Task $task)
    {
        $status = $task->status;

        return view('showTask', compact('task', 'status'));
    }

    public function edit(Task $task)
    {
        return view('editTask', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        if (auth()->id() !== $task->user_id) {
            abort(403, 'Action Non autorisé.');
        }
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|string',
        ]);

        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return redirect()->route('user.dashboard')->with('Tache modifier avec succées.');
    }

    public function destroy(Task $task)
    {

        if (auth()->id() != $task->user_id) {
            abort(403, 'Unauthorized action.');
        }

        $task->delete();
        return redirect()->route('user.dashboard');
    }


    public function filterByStatus($status)
    {
        $tasks = Task::where('user_id', auth()->id())
                      ->where('status', $status)
                      ->get();

        // return view('taskFilter')->with(['tasks'=>$tasks, 'status'=>$status]);
        // return view('taskFilter',['tasks' => $tasks, 'status' => $status]);
        return view('taskFilter', compact('tasks', 'status'));
    }
}

