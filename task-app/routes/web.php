<?php

use App\Http\Controllers\TaskController;

Route::get(
    '/',
    [TaskController::class, 'task']
)->name('home');

Route::get('/tasks', [TaskController::class, 'task'])->name('tasks.index');

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
Route::get(
    '/api/v1/all-tasks',
    [TaskController::class, 'allTask']
)->name('tasks.allTask');

Route::get(
    '/api/v1/tasks/{task}/modify',
    [TaskController::class, 'modify']
)->name('tasks.modify');

Route::put(
    '/api/v1/tasks/{task}/update',
    [TaskController::class, 'update']
)->name('tasks.update');

Route::delete(
    '/api/v1/tasks/{task}/delete',
    [TaskController::class, 'delete']
)->name('tasks.delete');