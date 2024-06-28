<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;

class AddTaskButton extends Component {

    public $list;
    public $title;
    public $description;
    public $due_date;
    public $reminder_date;

    protected $rules = [
        'title' => 'required|string|max:255'
    ];

    public function mount($list) {
        $this->list = $list;
    }

    public function addTask() {

        Task::addTask(
            $this->list->id,
            $this->title,
            $this->description,
            $this->due_date,
            $this->reminder_date,
        );

        // Reset fields after creating the list
        $this->reset(['title', 'description', 'due_date', 'reminder_date']);

        // Optionally, close the modal after submission
        return redirect()->route('home');
    }

    public function render() {
        return view('livewire.add-task-button');
    }
}
