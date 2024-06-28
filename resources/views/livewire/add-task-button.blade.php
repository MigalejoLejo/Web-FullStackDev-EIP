<!-- Button trigger modal -->
<div>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#taskModal">
        Agregar Tarea
    </button>

    <!-- Modal -->
    <div class="modal fade" id="taskModal" tabindex="-1" role="dialog" aria-labelledby="taskModalLabel" aria-hidden="true">
        <form wire:submit="addTask">
            @csrf
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="taskModalLabel">Agregar Tarea en {{ $list->name }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">

                        {{-- Title --}}
                        <div class="form-group mb-3">
                            <label for="title" class="form-label">Titulo</label>
                            <input wire:model="title" type="text" class="form-control" id="title">
                        </div>

                        {{-- Description --}}
                        <div class="form-group mb-3">
                            <label for="description" class="form-label">Descripción</label>
                            <textarea wire:model="description" class="form-control" id="description" rows="6">{{ $description }}</textarea>
                        </div>

                        {{-- Due Date --}}
                        <div class="form-group mb-3">
                            <i class="fa-regular fa-flag" style="color: orange"></i>

                            <label for="due_date" class="form-label">Fecha a
                                Cumplir</label>
                            <input wire:model="due_date" type="datetime-local" class="form-control" id="due_date"
                                value="{{ $due_date }}">
                        </div>

                        {{-- Due Date --}}
                        <div class="form-group mb-3">
                            <i class="fa-regular fa-clock" style="color: #08ab31"></i>
                            <label for="reminder_date" class="form-label">Recordatorio</label>
                            <input wire:model="reminder_date" type="datetime-local" class="form-control"
                                id="reminder_date" value="{{ $reminder_date }}">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary"
                            data-bs-dismiss="modal">Agregar Tarea</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
