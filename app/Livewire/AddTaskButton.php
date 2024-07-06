<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;
use Illuminate\Validation\ValidationException;

class AddTaskButton extends Component {

    public $list;
    public $title;
    public $description;
    public $due_date;
    public $reminder_date;

    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'nullable|string|max:60000'
    ];

    public function mount($list) {
        $this->list = $list;
    }

    public function addTask() {
        try {
            $this->validate();
            Task::addTask(
                $this->list->id,
                $this->title,
                $this->description,
                $this->due_date,
                $this->reminder_date,
            );
            $this->reset(['title', 'description', 'due_date', 'reminder_date']);
            return redirect()->route('home');
        } catch (ValidationException $e) {
            $this->addError('title', 'Error al crear la tarea: El título es obligatorio y no puede superar los 255 caracteres');
        }
    }

    public function render() {
        return view('livewire.add-task-button');
    }
}
