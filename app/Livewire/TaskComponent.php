<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;

class TaskComponent extends Component
{
    public $tasks;
    public $list;

    public function mount($list, Task $task) {
        $this->list = $list;
        $this->tasks = Task::getTasksFromList($list->id ?? 0);
    }

    public function render()
    {
        return view('livewire.task-component', ['tasks' => $this->tasks, 'list' => $this->list]);
    }
}
