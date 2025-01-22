@extends('layouts.app')

@section('title', 'My Tasks')

@section('content')

<form method="post" action="{{route('tasks.update', ['task' => $task])}}">
    @csrf
    @method('put')
    <div class="outer" style="margin: 50px 0;">
        <div class="container">

            <h1 class="text- fw-bold fs-2 text-danger">
                Update Task
            </h1>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="name">Title</label>
                        <input class="form-control" type="text" name="name" id="name" value="{{$task->title}}">
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label for="name">Description</label>
                        <input class="form-control" type="text" placeholder="Galle" name="address" id="address"
                            value="{{$task->description}}">
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <br>
                        <input class="btn btn-success col-12" type="submit" value="Update Task">
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

</div>



</div>

@endsection