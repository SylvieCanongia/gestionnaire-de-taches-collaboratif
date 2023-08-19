<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaskList;
use App\Models\Task;

class TaskListController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Get all the taskLists data
    public function index() {
        // Get all task lists for the authenticated user
        $taskLists = TaskList::where('user_id', auth()->id())->get();

        return response()->json(['taskLists' => $taskLists]);
    }

    /**
     * Register a new taskList.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'list_name' => 'required|string|max:255',
            'list_description' => 'nullable|string|max:500',
        ]);

        TaskList::create([
            'list_name' => $validatedData['list_name'],
            'list_description' => $validatedData['list_description'],
            'user_id' => auth()->id(),
        ]);

        return response()->json(['message' => 'La liste de tâches a été créée avec succès !']);
    }
}
