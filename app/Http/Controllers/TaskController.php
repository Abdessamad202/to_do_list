<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Mail\TaskMail;
use App\Models\Completed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\task as RequestsTask;
use App\Jobs\SendMailJob;
use Illuminate\Support\Facades\Concurrency;

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
        $fillables = ["task"=>$request->task];
        $task = Task::create($fillables);
        // $action = "create";
        // $task->save();
        // dd($task->action);
        SendMailJob::dispatch($task,"create");
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
