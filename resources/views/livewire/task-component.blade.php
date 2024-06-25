<div>
    <div class="card" style="min-height: 80vh">
        <div class="navbar card-header">
            @isset($list)
                {{ $list->name }}
                <livewire:add-task-button :list="$list" :key="$list->id" />
            @else
                Selecciona una lista
                <button type="button" class="btn btn-outline-secondary disabled">Agregar Tarea</button>
            @endisset

        </div>
        <div class="card-body">
            @isset($list)
                @foreach ($tasks as $task)
                    <p>{{ $task->title . ' - ' . $task->checked }}</p>
                @endforeach

        @endisset

    </div>


</div>
