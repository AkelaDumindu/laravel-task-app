@extends('layouts.app') 

@section('title', 'New Task') >

@section('content') 
<form method="post" action="{{ route('tasks.add') }}">
    @csrf
    <div class="outer" style="margin: 50px 0;">

        <div class="container">
            <h1 class="text- fw-bold fs-2 text-danger">
                Add New Task
            </h1>
            <div class="row">
                <div class="col-12 mb-3">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input class="form-control" type="text" placeholder="Home Work" name="title" id="title"
                            required>
                    </div>
                </div>

                <div class="col-12 mb-3">
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" placeholder="Today I have ..." name="description"
                            id="description" rows="4" required></textarea>
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <input class="btn btn-primary col-12" type="submit" value="Save Task">
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection