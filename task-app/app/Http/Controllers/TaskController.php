<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // public function task()
    // {
    //     return view('tasks.task');
    // }

    public function task(Request $request)
    {
        $filter = $request->query('filter', 'all');

        if ($filter === 'completed') {
            $tasks = Task::where('is_completed', true)->get();
        } elseif ($filter === 'pending') {
            $tasks = Task::where('is_completed', false)->get();
        } else {
            $tasks = Task::all();
        }

        return view('tasks.task', [
            'tasks' => $tasks,
        ]);
    }



    public function allTask()
    {
        $taskList = Task::all();
        return view('tasks.all-task', ['tasks' => $taskList]);
    }



    public function new()
    {
        return view('tasks.new-task');
    }

    public function add(Request $request)
    {
        $task = $request->validate([
            'title' => 'required',
            'description' => 'required',


        ]);

        $savedData = Task::create($task);
        return redirect(route('tasks.task'));

    }

    public function modify(Task $task)
    {
        return view('tasks.modify', ['task' => $task]);
    }

    public function update(Task $task, Request $request)
    {
        $createdTask = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $task->update($createdTask);
        return redirect(route('tasks.task'));

    }

    public function delete(Task $task)
    {
        $task->delete();
        return redirect(route('tasks.task'))->with('success', 'Customer deleted successfully.');
    }
}
