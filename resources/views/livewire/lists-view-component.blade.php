<div>
    @isset($id)
        <div class="navbar btn d-flex align-items-center w-100 text-start p-10 hover-border" style="height: 50px;">
            <p class="mb-0 mx-2">{{ $name }}</p>
            <!-- Button trigger modal -->
            <button type="button" class="mx-2 editButton rounded" data-bs-toggle="modal"
                data-bs-target="#modal-{{ $id }}">
                <i class="fa-regular fa-edit"></i>
            </button>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modal-{{ $id }}" tabindex="-1" aria-labelledby="modal-{{ $id }}Label"
            aria-hidden="true" wire:ignore.self>
            <form wire:submit.prevent="updateList">
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
                                @if ($name === 'Inbox')
                                    <input wire:model="inputName" type="text" class="form-control"
                                        id="name-{{ $id }}" disabled>
                                @else
                                    <input wire:model="inputName" value="{{ $name }}" type="text"
                                        class="form-control" id="name-{{ $id }}">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                @endif
                            </div>

                            <div class="mb-3">
                                <label for="color-{{ $id }}" class="form-label">Selecciona un color</label>
                                <input wire:model="color" type="color" class="form-control form-control-color w-25"
                                    id="color-{{ $id }}" value="{{ $color }}"
                                    title="Selecciona un color">
                            </div>

                            <div class="mb-3">
                                <label for="userInput" class="form-label">Agregar usuarios a esta lista</label>
                                <input wire:model.live="userInput" type="text" class="form-control" id="userInput">
                                <button wire:click.prevent="addUserToArray" type="button" class="btn btn-secondary mt-3">
                                    Agregar a la lista </button>
                            </div>

                            <div>
                                <label>Usuarios de esta lista:</label>
                                <div class="d-flex w-100 flex-wrap align-items-center">
                                    @foreach ($listOfUsers as $index => $user)
                                        <div class="align-items-center m-3 hover-border p-2 rounded">
                                            <span>{{ $user->name }}</span>
                                            @if ($user->id !== auth()->user()->id)
                                                <button wire:click.prevent="removeUserFromArray({{ $index }})"
                                                    type="button" class="remove-button">
                                                    <i class="fa-regular fa-x"></i>
                                                </button>
                                            @endif

                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>


                        <!-- Footer -->
                        <div class="modal-footer">
                            <div class="navbar w-100">
                                @if ($name !== 'Inbox')
                                    <button wire:click="deleteList" type="button" class="btn btn-outline-danger"
                                        data-bs-dismiss="modal">Eliminar</button>
                                @else
                                    <div></div>
                                @endif
                                <div>
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    @endisset
</div>
