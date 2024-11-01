<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <style>
        .form-control:focus {
            box-shadow: none;
        }

        .form-control {
            border-radius: 0.375rem 0 0 0.375rem;
        }

        .btn-primary {
            border-radius: 0 0.375rem 0.375rem 0;

        }
    </style>
</head>

<body>
    <div class="container mt-4">
        <h1 class="text-center">To Do List</h1>
        <div class="input-group mb-3 container">
            <form action="{{ route('task.add') }}" class="d-flex w-100" method="POST">
                @csrf
                <input type="text" name="task" class="form-control" placeholder="New Task ..."
                    aria-label="Recipient's username" aria-describedby="button-addon2">
                <button class="btn btn-primary" type="submit" id="button-addon2">Add</button>
            </form>
        </div>
        <div class="table table-border row px-4">
            <div class="col-6 ">
                <h2 class="text-center">Open Task</h2>
                @if (count($tasks) === 0)
                    <p>no open task found</p>
                @else
                    @foreach ($tasks as $task)
                        <div class="row mb-2 ">
                            <div class="col-8">
                                {{ $task->task }}
                            </div>
                            <div class="col-4">
                                <div class="div d-flex gap-1">
                                    <form action="{{ route('completed.task', $task->id) }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-success">Complete</button>

                                    </form>
                                    <form action="{{ route('task.destroy', $task->id) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>

                                </div>
                            </div>

                        </div>
                    @endforeach
                @endif
            </div>
            <div class="col-6">
                <h2 class="text-center">Completed Task</h2>
                @if (count($completedtasks) === 0)
                    <p>no completed task found</p>
                @else
                    @foreach ($completedtasks as $task)
                        <div class="row mb-2">
                            <div class="col-8">
                                {{ $task->task }}
                            </div>
                            <div class="col-4">
                                <form action="{{ route('uncompleted.task', $task->id) }}" method="post">
                                    {{-- @method("DELETE") --}}
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger">Uncompleted</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>
