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
        $search = $request->query('search', '');

        $query = Task::query();

        if ($filter === 'completed') {
            $query->where('is_completed', true);
        } elseif ($filter === 'pending') {
            $query->where('is_completed', false);
        }

        if ($search) {
            $query->where('title', 'like', '%' . $search . '%');
        }

        $tasks = $query->get();

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


    public function toggleCompletion(Task $task)
    {
        $task->is_completed = !$task->is_completed;
        $task->save();

        return redirect()->route('tasks.task')->with('success', 'Task status updated successfully.');
    }



}
