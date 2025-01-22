<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Update Task</title>
</head>

<body>

    <form method="post" action="{{route('tasks.update', ['task' => $task])}}">
        @csrf
        @method('put')
        <div class="outer" style="margin: 50px 0;">
            <div class="container">
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
</body>

</html>