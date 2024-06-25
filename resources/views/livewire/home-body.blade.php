 <div class="container">
     <div class="row justify-content-center">
         <div class="col d-none d-md-block col-md-4">
             <div class="card" style="min-height: 80vh">
                 <div class="navbar card-header">
                     {{ __('Mis Listas') }}

                     <x-add-list-button />

                 </div>

                 <div class="card-body">
                     @foreach ($userLists as $list)
                         <div class="" wire:click="selectList({{ $list }})" wire:key="{{ $list->id }}">
                             <livewire:list-item-component :taskList="$list"/>
                         </div>
                     @endforeach
                 </div>

             </div>
         </div>
         <div class="col col-md-8 ">
             <div class="card" style="min-height: 80vh">
                 <div class="navbar card-header">
                     {{-- @isset($selectedList)
                         {{ $selectedList->name }}
                         <button type="button" class="btn btn-primary">add task</button>
                     @else
                         Selecciona una lista

                         <button type="button" class="btn btn-outline-secondary disabled">add task</button>
                     @endisset --}}

                 </div>
                 <div class="card-body">
                             <livewire:task-component :listId="$listId" :key="$listId"/>
                 </div>
             </div>
         </div>
     </div>
 </div>
