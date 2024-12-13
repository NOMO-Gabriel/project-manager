<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Models\Project;
use Illuminate\Support\Facades\Route;



Route::get('/home', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('home');



// routes for tasks
Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index'); 
Route::get('/tasks/{id}', [TaskController::class, 'single'])->name('tasks.single'); 
Route::get('/tasks/{id}/user', [TaskController::class, 'user'])->name('tasks.user'); 
Route::get('/tasks/project', [TaskController::class, 'project'])->name('tasks.project'); 
Route::post('/tasks/create', [TaskController::class, 'create'])->name('tasks.create'); 
Route::put('/tasks/{id}/update', [TaskController::class, 'update'])->name('tasks.update'); 
Route::delete('/tasks/{id}/delete', [TaskController::class, 'delete'])->name('tasks.delete'); 



// routes for projects
Route::get('/projects', [ProjectController::class, 'projects'])->name('projects.index'); 
Route::get('/projects/{id}', [ProjectController::class, 'projects'])->name('projects.single');
Route::get('/projects/tasks', [ProjectController::class, 'projectsTasks'])->name('projects.tasks');
Route::post('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
Route::put('/projects/{id}/update', [ProjectController::class, 'update'])->name('projects.update');
Route::delete('/projects/{id}/delete', [ProjectController::class, 'delete'])->name('projects.delete');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});





require __DIR__.'/auth.php';
