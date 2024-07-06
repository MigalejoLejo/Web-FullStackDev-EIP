<div class="container">
    {{-- <p> {{ session('selectedList') }} </p> --}}
    @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @elseif (session()->has('success'))
        <div class = "alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col d-none d-md-block col-md-4">
            <div class="card" style="min-height: 80vh">
                <div class="navbar card-header">
                    {{ __('Mis Listas') }}

                    <livewire:add-list-button />

                </div>

                <div class="card-body">
                    @isset($userLists)
                        @foreach ($userLists as $list)
                            <div class="" wire:click="selectList({{ $list }})" key="{{ '1' . $list->id }}">
                                <livewire:lists-view-component :taskList="$list" key="{{ '2' . $list->id }}" />
                            </div>
                        @endforeach
                    @endisset

                </div>

            </div>
        </div>
        <div class="col col-md-8 ">
            <livewire:tasks-view-component :key="'3' . ($selectedList->id ?? 0)" />
        </div>
    </div>
</div>
</div>
