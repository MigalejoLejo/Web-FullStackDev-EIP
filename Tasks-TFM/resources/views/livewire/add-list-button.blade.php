<div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#listModal.{{$id}}">
        +
    </button>

    <!-- Modal -->
    <div class="modal fade" id="listModal.{{$id}}" tabindex="-1" aria-labelledby="listModal.{{$id}}Label" aria-hidden="true"
        wire:ignore.self>
        <form wire:submit.prevent="addList">
            @csrf
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Header -->
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="listModal.{{$id}}Label">Agregar Lista</h1>
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
                            <input wire:model="selectedColor" type="color"
                                class="form-control form-control-color w-25" id="color" value="#0c6dfd"
                                title="Selecciona un color">
                        </div>

                        <div class="mb-3">
                            <label for="userInput" class="form-label">Agregar usuarios a esta lista</label>
                            <input wire:model.live="userInput" type="text" class="form-control" id="userInput">
                            <button wire:click.prevent="addUserToArray" type="button" class="btn btn-secondary mt-3">
                                Agregar a la lista </button>
                            <div class="d-flex w-100 flex-wrap align-items-center">

                                @foreach ($listOfUsers as $index => $user)
                                    <div class="align-items-center m-3 hover-border p-2 rounded">
                                        <span>{{ $user->name }}</span>
                                        <button wire:click.prevent="removeUserFromArray({{ $index }})"
                                            type="button" class="remove-button">
                                            <i class="fa-regular fa-x"></i>
                                        </button>

                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>

                    <!-- Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Crear</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
