<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    @vite(["resources/sass/app.scss","resources/css/app.css"])
    <!-- Bootstrap CSS v5.2.1 -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" /> --}}
    <style>
        .form-control:focus {
            box-shadow: none;
        }

        .form-control {
            border-radius: 0.375rem 0 0 0.375rem;
        }

        .b {
            border-radius: 0 0.375rem 0.375rem 0;

        }
    </style>
</head>

<body>
    <div class="container mt-4">
        <h1 class="text-center">To Do List</h1>
        <div class="input-group mb-3 container">
            <form action="{{route('task.store')}}" class="d-flex w-100" method="POST">
                @csrf
                <input type="text" name="task" class="form-control" placeholder="New Task ..."
                    aria-label="Recipient's username" aria-describedby="button-addon2">
                <button class="btn btn-primary b" type="submit" id="button-addon2">Add</button>
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
                            <div class="col-6 ">
                                <div class="w-100">
                                    {{ $task->task }}
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="div d-flex gap-1">
                                    <form action="{{ route('task.update', $task->id) }}" method="post">
                                        @csrf
                                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal" data-bs-whatever="{{ $task->task }}"
                                            data-bs-id="{{ $task->id }}">Update</button>
                                    </form>
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
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Update Task</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('task.update', 'x') }}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Task:</label>
                            <input type="text" class="form-control" name="updated_task" id="recipient-name">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
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
<script>
    const exampleModal = document.getElementById('exampleModal')
    let url = "http://127.0.0.1:8000/task/"
    if (exampleModal) {
        // let urlStatic
        exampleModal.addEventListener('show.bs.modal', event => {
            // Button that triggered the modal
            const button = event.relatedTarget
            // Extract info from data-bs-* attributes
            const recipient = button.getAttribute('data-bs-whatever')
            // If necessary, you could initiate an Ajax request here
            let id = button.getAttribute('data-bs-id')
            // and then do the updating in a callback.

            // Update the modal's content.
            // const modalTitle = exampleModal.querySelector('.modal-title')
            const form = exampleModal.querySelector('form')
            const modalBodyInput = exampleModal.querySelector('#recipient-name')
            // let url = form.getAttribute("action");
            // url[url.length - 1] = id;
            // if(url[url.length-1]==="k"){
                // }
            form.setAttribute("action",url+id)
            // form.setAttribute("action",urlStatic+id)
            // modalTitle.textContent = `New message to ${recipient}`;
            modalBodyInput.value = recipient;
        })
    }
</script>

</html>
