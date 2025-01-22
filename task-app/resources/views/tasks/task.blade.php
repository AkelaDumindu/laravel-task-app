@extends('layouts.app')

@section('title', 'My Tasks')

@section('content')

<div class="container text-center">
    <h1 class="text-danger fw-bold header-title">
        My Task
    </h1>

    <!-- Task Filter -->
    <div class="mb-4">
        <a href="{{ route('tasks.index', ['filter' => 'all']) }}"
            class="btn {{ request('filter') === 'all' || !request('filter') ? 'btn-primary' : 'btn-outline-primary' }}">
            All Tasks
        </a>
        <a href="{{ route('tasks.index', ['filter' => 'completed']) }}"
            class="btn {{ request('filter') === 'completed' ? 'btn-success' : 'btn-outline-success' }}">
            Completed Tasks
        </a>
        <a href="{{ route('tasks.index', ['filter' => 'pending']) }}"
            class="btn {{ request('filter') === 'pending' ? 'btn-secondary' : 'btn-outline-secondary' }}">
            Pending Tasks
        </a>
    </div>

    <!-- Search Bar -->
    <div class="mb-4">
        <form action="{{ route('tasks.index') }}" method="GET" class="d-flex justify-content-center">
            <input type="text" name="search" class="form-control me-2" placeholder="Search by title"
                value="{{ request('search') }}" style="max-width: 300px;">
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>

    <!-- Display Tasks -->
    <div class="row">
        @forelse($tasks as $task)
            <div class="col-sm-4 mb-3">
                <div class="card" style="width: 24rem;">
                    <div class="card-body">
                        <h3 class="card-title">{{ $task->title }}</h3>
                        <p class="card-text">{{ $task->description }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <!-- Left side: Update and Delete Buttons -->
                            <div class="d-flex gap-2">
                                <a href="{{ route('tasks.modify', ['task' => $task->id]) }}"
                                    class="btn btn-warning btn-sm">Update</a>
                                <form action="{{ route('tasks.delete', ['task' => $task->id]) }}" method="POST"
                                    style="display: inline;"
                                    onsubmit="return confirm('Are you sure you want to delete this task?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </div>

                            <!-- Right side: Completion Checkbox -->
                            <form action="{{ route('tasks.toggle', ['task' => $task->id]) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                @method('PATCH')
                                <div class="form-check d-flex align-items-center">
                                    <input class="form-check-input me-2" type="checkbox" id="task-{{ $task->id }}"
                                        onchange="this.form.submit()" {{ $task->is_completed ? 'checked' : '' }}
                                        style="cursor: pointer;">
                                    <label class="form-check-label fw-bold mb-0" for="task-{{ $task->id }}"
                                        style="color: {{ $task->is_completed ? 'green' : 'yellow' }};">
                                        {{ $task->is_completed ? 'Completed' : 'Pending' }}
                                    </label>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-muted">No tasks available.</p>
        @endforelse
    </div>
</div>

@endsection