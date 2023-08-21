<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaskList;
use App\Models\User;

class TaskListController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Get all task lists for the authenticated user
    public function index() {
        $user = auth()->user();
        $taskLists = $user->taskLists;

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
        try {
            $validatedData = $request->validate([
                'list_name' => 'required|string',
                'list_description' => 'nullable|string|max:500',
            ]);

            $user = auth()->user();
            $taskList = new TaskList([
                'list_name' => $validatedData['list_name'],
                'list_description' => $validatedData['list_description'],
            ]);

            $user->taskLists()->save($taskList);

            return response()->json(['message' => 'La liste de tâches a été créée avec succès !']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erreur lors de la création de la liste de tâches'], 500);
        }
    }
}
