<?php

namespace App\Livewire;

use App\Models\Task;
use App\Utils\Utils;
use Livewire\Component;

class TaskSingleComponent extends Component {

    public $id;
    public $title;
    public $description;
    public $due_date;
    public $reminder_date;
    public $checked;

    public $short_description;


    public function mount($task) {
        $this->id = $task->id;
        $this->title = $task->title;
        $this->description = $task->description;
        $this->due_date = $task->due_date;
        $this->reminder_date = $task->reminder_date;
        $this->checked = $task->checked;

        if (strlen($task->description) > 50 ) {
            $this->short_description = substr($task->description, 0, 50) . '...';
        } else {
            $this->short_description = null;
        }
    }


    public function toggle($id) {
        Task::toggle($id);
        return redirect()->route('home');
    }

    public function delete() {
        session(['taskToBeDeleted' => $this->id]);
        $this->dispatch('deleteTask');
    }

    public function update() {
        Task::updateTask($this->id, $this->title, $this->description, $this->due_date, $this->reminder_date, $this->checked);
        return redirect()->route('home');
    }

    public function render() {

        return view('livewire.task-single-component');
    }
}
