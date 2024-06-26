<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;

class TaskComponent extends Component
{
    public $tasks;
    public $list;

    protected $listeners = ['listDeleted' => 'handleListDeleted'];


    public function mount() {
        if (session('selectedList')===null) {
            $this->resetTasks();
        } else {
            $this->list = session('selectedList');
            $this->tasks = Task::getTasksFromList($this->list->id);
        }
    }

    public function toggle($id){
        Task::toggle($id);
        return redirect()->route('home');

    }

    public function handleListDeleted() {
        $this->resetTasks();
        return redirect()->route('home');


    }

    public function resetTasks() {
        $this->tasks = null;
        $this->list = null;
    }

    public function render()
    {
        return view('livewire.task-component', ['tasks' => $this->tasks, 'list' => $this->list]);
    }
}
