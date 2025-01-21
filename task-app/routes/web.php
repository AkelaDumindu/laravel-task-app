<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get(
    '/api/v1/tasks',
    [TaskController::class, 'task']
)->name('tasks.task');

Route::get(
    '/api/v1/new-task-form',
    [TaskController::class, 'new']
)->name('tasks.new');

Route::post(
    '/api/v1/add-task',
    [TaskController::class, 'add']
)->name('tasks.add');

