<?php

use App\Http\Controllers\Dashboard\TaskController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('dashboard')->name('dashboard.')->group(function () {
    Route::resource('task', App\Http\Controllers\Dashboard\TaskController::class);
    Route::resource('task-list', App\Http\Controllers\Dashboard\TaskListController::class);
});

// Routes for task lists
// Route::get('/task-lists', [App\Http\Controllers\TaskListController::class, 'index'])->name('task-lists.index');
// Route::post('/task-lists', [App\Http\Controllers\TaskListController::class, 'store'])->name('task-lists.store');


// Routes for tasks
// Route::get('/tasks', [App\Http\Controllers\TaskController::class, 'index'])->name('tasks.index');
// Route::post('/tasks', [App\Http\Controllers\TaskController::class, 'store'])->name('tasks.store');
// Route::put('/tasks/{task}', [App\Http\Controllers\TaskController::class, 'update'])->name('tasks.update');
// Route::delete('/tasks/{task}', [App\Http\Controllers\TaskController::class, 'destroy'])->name('tasks.destroy');
