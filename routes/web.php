<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::post('/completed/{task}', [TaskController::class,"completed"])->name("completed.task");
Route::post('/uncompleted/{task}', [TaskController::class,"uncompleted"])->name("uncompleted.task");
Route::resource('task', TaskController::class);