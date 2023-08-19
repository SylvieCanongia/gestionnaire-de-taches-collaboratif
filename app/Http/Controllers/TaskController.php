<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

     /**
        * Get the tasks of a user.
        *
        * @return Response
        */
    public function index()
    {
        $tasks = Task::where('user_id', auth()->id())->get();

        return response()->json(['tasks' => $tasks]);
    }

    /**
     * Store a newly created task in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'task_title' => 'required|string|max:255',
            'task_description' => 'nullable|string|max:500',
            'due_date' => 'nullable|date',
            'priority_id' => 'nullable|integer|exists:priorities,priority_id',
            'list_id' => 'required|integer|exists:task_lists,list_id',
        ]);

        $task = new Task([
            'task_title' => $validatedData['task-title'],
            'task_description' => $validatedData['task-description'],
            'due_date' => $validatedData['due-date'],
            'priority_id' => $validatedData['priority_id'],
            'list_id' => $validatedData['list_id'],
            'user_id' => auth()->id(),
        ]);

        $task-> save();

        return response()->json(['message' => 'La tâche a été créée avec succès !']);
    }
}
