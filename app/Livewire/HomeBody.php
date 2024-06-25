<?php

namespace App\Livewire;


use Livewire\Component;
use App\Models\Tasklist;

class HomeBody extends Component {

    public $userLists;
    public $selectedList;

    public function mount($user) {
        if (session()->has('selectedList')) {
            $this->selectedList = session('selectedList');
            $this->selectList($this->selectedList);
        }
        $this->userLists = Tasklist::getUserLists($user->id);
    }

    public function selectList(Tasklist $list) {
        $this->selectedList = $list;
        session(['selectedList' => $this->selectedList]);
    }

    public function render() {
        return view('livewire.home-body', ['userLists' => $this->userLists, 'selectedList' => $this->selectedList]);
    }
}
