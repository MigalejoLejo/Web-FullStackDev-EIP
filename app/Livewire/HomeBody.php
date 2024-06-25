<?php

namespace App\Livewire;

use Livewire\Component;

use App\Utils\Utils;
use App\Models\Task;
use App\Models\Tasklist;

class HomeBody extends Component {

    public $userLists;
    public $listId;

    public $counter = 0;

    public function mount($user) {
        $this->userLists = Tasklist::getUserLists($user->id);
    }

    public function selectList(Tasklist $list) {
        echo $list;
        $this->counter++;
        $this->listId = $list->id;
        echo $this->listId;
    }



public function increment() {
}

    public function render() {
        return view('livewire.home-body', ['userLists' => $this->userLists, 'listId' => $this->listId, 'counter' => $this->counter]);
    }
}
