<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index(){
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    public function single(int $id){
        $project = Project::find($id);
        return view('projects.single',compact('project'));
    }

    public function task(int $id){
        $projectId=Project::find($id)->id;
        $tasks=Task::where('project_id','=',$projectId)->get();
        return view('projects.task',compact('tasks'));
    }

    public function create(Request $request){
       
        
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'start_date'=>'required|date',
            'end_date'=>'required|date',
            'status'=>'required|in:pending,in_progress,completed',

        ]);

        Project::create([
            'name' => $request->name,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status' => 'pending',
            'user_id' => Auth::user()->id,         
        ]);
        return redirect()->route('projects.index')->with('success', 'Projet ajoutée avec succès.');
    }

    public function delete(int $id){
        $project = Project::find($id);
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Projet supprimée avec succès.');
    }



}
