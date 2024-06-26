<div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#listModal">
        +
    </button>

    <!-- Modal -->
    <div class="modal fade" id="listModal" tabindex="-1" aria-labelledby="listModalLabel" aria-hidden="true">
        <form wire:submit.prevent="addList">
            @csrf
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Header -->
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="listModalLabel">Agregar Lista</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <!-- Body -->
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre</label>
                            <input wire:model="name" type="text" class="form-control" id="name">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="color" class="form-label">Selecciona un color</label>
                            <input wire:model="selectedColor" type="color" class="form-control form-control-color w-25" id="color"
                                   value="#0c6dfd" title="Selecciona un color">
                        </div>
                    </div>

                    <!-- Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary" >Crear</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
