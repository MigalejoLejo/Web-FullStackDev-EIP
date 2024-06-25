<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Task;
use App\Utils\Utils;
use App\Models\Tasklist;

class ListItemComponent extends Component {

    public $name;
    public $color;
    public $tasks;
    public $id;


    public function mount(TaskList $taskList) {
        $this->name = $taskList->name;
        $this->color = $taskList->color;
        $this->tasks = Task::getTasksFromList($taskList->id);
        $this->id = $taskList->id;
    }

    public function render() {
        return view('livewire.list-item-component');
    }
}
