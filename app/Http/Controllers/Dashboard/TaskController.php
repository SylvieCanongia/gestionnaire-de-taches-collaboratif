<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
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
        $userId = auth()->id();
        $tasks = Task::where('user_id', $userId)->get();

        return response()->json(['tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created task in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response Response
     */
    public function store(Request $request)
    {
        try {
        $validatedData = $request->validate([
            'task_title' => 'required|string',
            'task_description' => 'nullable|string|max:500',
            'due_date' => 'nullable|date',
            'priority_id' => 'nullable|integer|exists:priorities,priority_id',
            'list_id' => 'required|integer|exists:task_lists,list_id',
        ]);

        $task = new Task([
            'task_title' => $validatedData['task_title'],
            'task_description' => $validatedData['task_description'],
            'due_date' => $validatedData['due_date'],
            'priority_id' => $validatedData['priority_id'],
            'list_id' => $validatedData['list_id'],
            'user_id' => auth()->id(),
        ]);

            $task->save();

        } catch (\Exception $e) {

            \Log::error('Erreur lors de la création de la tâche : ' . $e->getMessage());

            $statusCode = $e->getCode() ?: 500;

            return response()->json(['message' => 'Une erreur s\'est produite lors de la création de la tâche.'], $statusCode);

            exit;
        }

        return response()->json(['message' => 'La tâche a été créée avec succès !']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
