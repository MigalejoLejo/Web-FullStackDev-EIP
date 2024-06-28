 {{-- <div :key="{{ '1' . $id }}"> --}}

 <div class=" btn align-items-center w-100 text-start hover-border">

     <div class="w-100 d-flex align-items-start">
         {{-- left side --}}
         <div class="mb-1">
             @if ($checked === 1)
                 <input wire:click="toggle({{ $id }})" class="form-check-input" type="checkbox"
                     id="flexCheckDefault" checked>
             @else
                 <input wire:click="toggle({{ $id }})" class="form-check-input" type="checkbox"
                     id="flexCheckDefault">
             @endif

         </div>
         <div class="mx-2 flex-grow-1 d-flex align-items-start" data-bs-toggle="collapse"
             data-bs-target="#task{{ $id }}" aria-expanded="false" aria-controls="task{{ $id }}">
             <div class="mx-2 flex-grow-1 d-flex align-items-start" data-bs-toggle="collapse"
                 data-bs-target="#task{{ $id }}" aria-expanded="false"
                 aria-controls="task{{ $id }}">
                 <div class="d-flex flex-column">
                     <label style="{{ $checked ? 'text-decoration: line-through' : '' }}">
                         {{ $title }}
                     </label>

                     @isset($short_description)
                         <small id="smallText{{ $id }}" class="form-text text-muted"
                             style="{{ $checked ? 'text-decoration: line-through' : '' }}">{{ $short_description }}
                         </small>
                         {{-- Collapsable --}}
                         <div class="collapse w-100" id="task{{ $id }}">
                             <small class="form-text text-muted"
                                 style="{{ $checked ? 'text-decoration: line-through' : '' }}"> {{ $description }}
                             </small>
                         </div>
                     @else
                         <small id="smallText{{ $id }}" class="form-text text-muted"
                             style="{{ $checked ? 'text-decoration: line-through' : '' }}">{{ $description }}</small>
                     @endisset

                     <div class="d-flex align-items-center">
                         @isset($due_date)
                             <div>
                                 <i class="fa-regular fa-flag "
                                     style="font-size: 12px; margin-right:5px; margin-top:2px; color: orange"></i>
                                 <small class="form-text text-muted ml-3">{{ $due_date }} </small>
                             </div>
                         @endisset
                         @isset($reminder_date)
                             <div class="mx-3">
                                 <i class="fa-regular fa-clock "
                                     style="font-size: 12px; margin-right:5px; margin-top:2px; color: #08ab31"></i>
                                 <small class="form-text text-muted ml-3">{{ $reminder_date }} </small>
                             </div>
                         @endisset
                     </div>
                 </div>
             </div>

         </div>

         <!-- Button trigger modal -->
         <button type="button" class="editButton" data-bs-toggle="modal"
             data-bs-target="#taskModal-{{ $id }}">
             <i class="fa-regular fa-edit"></i>
         </button>
     </div>

     <!-- Modal -->
     <div class="modal fade" id="taskModal-{{ $id }}" tabindex="-1" role="dialog"
         aria-labelledby="taskModal-{{ $id }}Label" aria-hidden="true">

         <form wire:submit="update">
             @csrf
             <div class="modal-dialog" role="document">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h5 class="modal-title" id="taskModal-{{ $id }}Label">Actualizar Tarea</h5>
                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                     </div>
                     <div class="modal-body">

                         {{-- Title --}}
                         <div class="form-group mb-3">
                             <label for="title-{{ $id }}" class="form-label">Titulo</label>
                             <input wire:model="title" type="text" class="form-control"
                                 id="title-{{ $id }}">
                         </div>

                         {{-- Description --}}
                         <div class="form-group mb-3">
                             <label for="description-{{ $id }}" class="form-label">Descripción</label>
                             <textarea wire:model="description" class="form-control" id="description-{{ $id }}" rows="6">{{ $description }}</textarea>
                         </div>

                         {{-- Due Date --}}
                         <div class="form-group mb-3">
                             <i class="fa-regular fa-flag" style="color: orange"></i>

                             <label for="due_date-{{ $id }}" class="form-label">Fecha a
                                 Cumplir</label>
                             <input wire:model="due_date" type="datetime-local" class="form-control"
                                 id="due_date-{{ $id }}" value="{{ $due_date }}">
                         </div>

                         {{-- Due Date --}}
                         <div class="form-group mb-3">
                             <i class="fa-regular fa-clock" style="color: #08ab31"></i>
                             <label for="reminder_date-{{ $id }}" class="form-label">Recordatorio</label>
                             <input wire:model="reminder_date" type="datetime-local" class="form-control"
                                 id="reminder_date-{{ $id }}" value="{{ $reminder_date }}">
                         </div>

                     </div>
                     <div class="modal-footer">
                         <div class="navbar w-100">
                             <button wire:click="delete" type="button" class="btn btn-outline-danger"
                                 data-bs-dismiss="modal">Eliminar</button>
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
 </div>
 {{-- </div> --}}



 <script>
     document.addEventListener('DOMContentLoaded', function() {
         var collapseElement = document.getElementById('task{{ $id }}');
         var smallTextElement = document.getElementById('smallText{{ $id }}');

         collapseElement.addEventListener('show.bs.collapse', function() {
             smallTextElement.style.display = 'none';
         });

         collapseElement.addEventListener('hide.bs.collapse', function() {
             smallTextElement.style.display = 'block';
         });
     });
 </script>
