<?php

namespace App\Http\Controllers;

use App\Http\Requests\task as RequestsTask;
use App\Models\Task;
use App\Models\Completed;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //
    public function index(){
        $tasks = Task::all();
        $completedtasks = Task::where("completed","=",1)->get();
        // return dd($tasks);!
        return view("home",compact("tasks","completedtasks"));
    }
    public function store(RequestsTask $request){
        // $task = Task::create($request->all());
        // return dd($request->all());
        $fillables = ["task"=>$request->task];
        $task = Task::create($fillables);
        return redirect()->route("task.index");
    }
    public function update(Task $task,Request $request){
        $task->update(["task"=>$request->updated_task]);
        return redirect()->route("task.index");
    }
    public function completed(Task $task){
        $task->completed = true;
        $task->save();
        return redirect()->route("task.index");
    }
    public function uncompleted(Task $task){
        $task->completed = false;
        $task->save();
        return redirect()->route("task.index");
    }
    public function destroy(Task $task){
        $task->delete();
        return redirect()->route("task.index");
    }

}
