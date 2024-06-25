<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;

class TaskComponent extends Component
{
    public $tasks;

    public function mount($listId, Task $task) {
        $this->tasks = Task::getTasksFromList($listId);
    }

    public function render()
    {
        return view('livewire.task-component', ['tasks' => $this->tasks]);
    }
}
