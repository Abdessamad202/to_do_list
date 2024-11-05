<x-mail>
    <p>we are here to tell you that you are updated a task called 
        <span style="font-weight: bold">
            {{$task->lastTask}}
        </span> to
        <span style="font-weight: bold;color:greenyellow">
            {{$task->task}}
        </span> at {{$task->updated_at}}</p>
</x-mail>