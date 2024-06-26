<div wire:ignore.self>
    @isset($list)
        <div class="card" style="min-height: 80vh ">
            <div class="navbar card-header" style="border-color:{{ $list->color ?? 'red' }}; border-width:3px">
                {{ $list->name }}
                <livewire:add-task-button :list="$list" wirex:key="$list->id" />
            </div>
            <div class="card-body">
                @foreach ($tasks as $task)
                <div :key="{{ '1' . $task->id }}">
                    <form wire:submit.prevent="toggle">
                        @csrf
                        <div class="form-check">
                            @if ($task->checked === 1)
                                <input wire:click="toggle({{ $task->id }})" class="form-check-input" type="checkbox"
                                    id="flexCheckDefault" checked>
                            @else
                                <input wire:click="toggle({{ $task->id }})" class="form-check-input" type="checkbox"
                                    id="flexCheckDefault">
                            @endif

                            <label class="form-check-label"
                                style="{{ $task->checked ? 'text-decoration: line-through' : '' }}"
                                data-bs-toggle="collapse" data-bs-target="#task{{ $task->id }}" aria-expanded="false"
                                aria-controls="task{{ $task->id }}">
                                {{ $task->title }}
                            </label>

                            <div class="collapse" id="task{{ $task->id }}">
                                <div class="card card-body">
                                    Some placeholder content for the collapse component. This panel is hidden by default but
                                    revealed when the user activates the relevant trigger.
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
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
