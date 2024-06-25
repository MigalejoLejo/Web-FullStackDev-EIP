<div>
    <div class="navbar btn d-flex align-items-center w-100 text-start p-10 hover-border" style="height: 50px;">
        <p class="mb-0 mx-2">{{ $name }}</p>

        <!-- Button trigger modal -->
        <button type="button" class="mx-2 test" data-bs-toggle="modal" data-bs-target="#modal-{{ $id }}">
            edit
        </button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modal-{{ $id }}" tabindex="-1" aria-labelledby="modal-{{ $id }}Label"
        aria-hidden="true">
        <form wire:submit.prevent="submitForm">
            @csrf
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Header -->
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="modal-{{ $id }}Label">Editar Lista</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <!-- Body -->
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name-{{ $id }}" class="form-label">Nombre</label>
                            <input wire:model="name" type="text" class="form-control" id="name-{{ $id }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="color-{{ $id }}" class="form-label">Selecciona un color</label>
                            <input wire:model="selectedColor" type="color"
                                class="form-control form-control-color w-25" id="color-{{ $id }}"
                                value="#0c6dfd" title="Selecciona un color">
                        </div>
                    </div>

                    <!-- Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
