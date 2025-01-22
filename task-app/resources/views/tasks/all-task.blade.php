@extends('layouts.app') <!-- Extend the master layout -->

@section('title', 'All Tasks') <!-- Set the page title -->

@section('content') <!-- Define the main content for this page -->
<div class="container">
    <h1 class="text-primary">All Tasks</h1>
    <hr>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Date</th>
                <th>Title</th>
                <th>Description</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
                <tr>
                    <td>{{ $task->created_at->format('Y-m-d') }}</td>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->description }}</td>
                    <td>{{ $task->is_completed ? 'Completed' : 'Pending' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection