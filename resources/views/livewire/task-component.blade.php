<div>
    @isset($tasks)
        @foreach ($tasks as $task)
            <p>{{ $task->title . $task->checked }}</p>
        @endforeach

    @endisset

</div>
