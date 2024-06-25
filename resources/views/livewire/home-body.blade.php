 <div class="container">
     <div class="row justify-content-center">
         <div class="col d-none d-md-block col-md-4">
             <div class="card" style="min-height: 80vh">
                 <div class="navbar card-header">
                     {{ __('Mis Listas') }}

                     <livewire:add-list-button />

                 </div>

                 <div class="card-body">
                     @foreach ($userLists as $list)
                         <div class="" wire:click="selectList({{ $list }})" key="{{ '1' . $list->id }}">
                             <livewire:list-item-component :taskList="$list" key="{{ '2' . $list->id }}" />
                         </div>
                     @endforeach
                 </div>

             </div>
         </div>
         <div class="col col-md-8 ">
                 <livewire:task-component :list="$selectedList ?? null" :key="'3'.$selectedList->id ?? 0" />
         </div>
     </div>
 </div>
 </div>
