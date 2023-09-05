<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View as View;
use App\Models\TaskList;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(): View
    {
        $user = Auth::user();
        // $taskLists = $user->taskList;
        $taskLists = TaskList::where('user_id', $user->id)->paginate(5);
        // dd($user, $taskLists);

        return view('home', ['taskLists' => $taskLists]);
    }
}
