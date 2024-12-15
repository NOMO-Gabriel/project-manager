<?php

namespace App\Http\Controllers;

use App\Models\Project;
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


    public function project (int $id){
        $projectId=Task::find($id)->project_id;
        $project=Project::find($projectId);
        return view('tasks.project',compact('project'));
    }


    public function create(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'start_date'=>'required|date',
            'end_date'=>'required|date',
            'status'=>'required|in:pending,in_progress,completed',

        ]);

        Task::create([
            'name' => $request->name,
            'status' => "pending",
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            
        ]);
        return redirect()->route('task.index')->with('success', 'Tâche ajoutée avec succès.');
    }


    public function put(Request $request,int $id){

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'end_date'=>'required|date',
            'status'=>'required|in:pending,in_progress,completed',
        ]);

        $task = Task::find($id);
        $task->name = $request->name;
        $task->description = $request->description;
        $task->end_date = $request->end_date;
        $task->start_date = $request->start_date;
        $task->status = $request->status;
        $task->save();
        return redirect()->route('task.index')->with('success', 'Tâche modifiée avec succès.');
    } 

    public function delete(int $id){
        $task = Task::find($id);
        $task->delete();
        return redirect()->route('task.index')->with('success', 'Tâche supprimée avec succès.');
    }
}
