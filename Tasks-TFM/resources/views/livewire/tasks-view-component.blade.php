<div wire:ignore.self>
    @isset($list)
        <div class="card" style="min-height: 80vh ">
            <div class="navbar card-header" style="border-color:{{ $list->color ?? 'red' }}; border-width:3px">
                {{ $list->name }}
                <livewire:add-task-button :list="$list" wirex:key="$list->id" />
            </div>
            <div class="card-body">
                @foreach ($tasks as $task)
                    <livewire:task-single-component :task="$task" :key="$task->id" />
                @endforeach
            </div>
        </div>
    @else
        <div class="card" style="min-height: 80vh ">
            <div class="navbar card-header">
                Selecciona una lista
                <button type="button" class="btn btn-outline-secondary disabled">Agregar Tarea</button>
            </div>
            <div class="card-body"></div>
        </div>
    @endisset
    {{-- @endif --}}
</div>
