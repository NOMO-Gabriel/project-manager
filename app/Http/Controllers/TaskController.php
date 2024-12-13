<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(){
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function single(int $id){
        $task = Task::find($id);
        return view('tasks.single', compact('task'));
    }

    public function user(int $id){
        $userId = Task::find($id)->id;
        $user = User::find($userId);
        return view('tasks.single',compact('user'));
    }
}
