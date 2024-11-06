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
        $action = "create";
        // $task->save();
        // dd($task->action);
        SendMailJob::dispatch($task,$action);
        return redirect()->route("task.index");
    }
    public function update(Task $task,Request $request){
        $action = "update";
        // dd($lastTask);
        $task->update(["last_task"=>$task->task,"task"=>$request->updated_task]);
        SendMailJob::dispatch($task,$action);
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
        $taskDeleted = $task;
        $task->delete();
        $action="delete";
        SendMailJob::dispatch($taskDeleted,$action);
        return redirect()->route("task.index");
    }

}
