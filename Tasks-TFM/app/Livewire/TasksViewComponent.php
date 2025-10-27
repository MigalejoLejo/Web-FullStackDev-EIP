<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;

class TasksViewComponent extends Component {
    public $tasks;
    public $list;

    protected $listeners = ['listDeleted' => 'handleListDeleted', 'deleteTask' => 'handelDeleteTask'];


    public function mount() {
        if (session('selectedList') === null) {
            $this->resetTasks();
        } else {
            $this->list = session('selectedList');
            $this->tasks = Task::getTasksFromList($this->list->id);
        }
    }

    public function handleListDeleted() {
        $this->resetTasks();
        return redirect()->route('home');
    }


    public function handelDeleteTask() {
        $taskToBeRemoved = session('taskToBeDeleted');
        $this->tasks =
        Task::where('list_id', $this->list->id)
            ->whereNotIn('id', [$taskToBeRemoved]) // Exclude task with ID 10
            ->get();

        Task::deleteTask($taskToBeRemoved);
        return redirect()->route('home');
    }

    public function resetTasks() {
        $this->tasks = null;
        $this->list = null;
    }

    public function render() {
        return view('livewire.tasks-view-component', ['tasks' => $this->tasks, 'list' => $this->list]);
    }
}
