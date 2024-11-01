<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', [TaskController::class,'index'])->name('task.index');
Route::post('/add', [TaskController::class,"add"])->name("task.add");
Route::post('/completed/{task}', [TaskController::class,"completed"])->name("completed.task");
Route::post('/uncompleted/{task}', [TaskController::class,"uncompleted"])->name("uncompleted.task");
Route::DELETE('/DELETE/{task}', [TaskController::class,"destroy"])->name("task.destroy");
