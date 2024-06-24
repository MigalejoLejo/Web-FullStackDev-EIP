<?php

namespace App\Livewire;

use Livewire\Component;

use App\Utils\Utils;
use App\Models\Task;
use App\Models\Tasklist;

class HomeBody extends Component {

    public $userLists;
    public $tasks ;

    public $counter = 0;

    public function mount($user) {
        $this->userLists = Tasklist::getUserLists($user->id);
    }


    public function getTasks(Tasklist $list) {
        $this->counter++;
        $this->tasks = Task::getTasksFromList($list->id);

    }


public function increment() {
}

    public function render() {
        return view('livewire.home-body', ['userLists' => $this->userLists, 'tasks' => $this->tasks]);
    }
}
