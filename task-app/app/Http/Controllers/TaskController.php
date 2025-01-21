<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function task()
    {
        return view('tasks.task');
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
}
