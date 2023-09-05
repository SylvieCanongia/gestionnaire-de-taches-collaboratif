<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TaskList;

class TaskListController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the task lists.
     */
    public function index() {
        $user = auth()->user();
        // $taskLists = $user->taskList;
        $taskLists = TaskList::where('user_id', $user->id)->paginate(10);
        // dd($taskLists);
        return response()->json(['taskLists' => $taskLists]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasklist-create');
    }

    /**
     * Store a newly created taskList in storage.
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

            $user = $request->user();
            $taskList = new TaskList([
                'list_name' => $validatedData['list_name'],
                'list_description' => $validatedData['list_description'],
            ]);

            $user->taskLists()->save($taskList);

            return response()->json(['message' => 'La liste de tâches a été créée avec succès !']);
        } catch (\Exception $e) {
            $statusCode = $e->getCode() ?: 500;
            return response()->json(['message' => 'Erreur lors de la création de la liste de tâches'], $statusCode);
        }
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
