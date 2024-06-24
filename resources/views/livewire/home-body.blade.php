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
                         <button wire:click="getTasks({{ $list }})">
                             @livewire('list-item-component', ['taskList' => $list])
                         </button>
                     @endforeach
                 </div>

             </div>
         </div>
         <div class="col col-md-8 ">
             <div class="card" style="min-height: 80vh">
                 <div class="card-body">
                     @isset($tasks)

                         @foreach ($tasks as $task)
                             <p>{{ $task->title }}</p>
                         @endforeach
                     @endisset


                 </div>
             </div>
         </div>
     </div>
 </div>
