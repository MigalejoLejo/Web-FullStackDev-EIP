<?php

namespace App\Livewire;

use App\Models\Task;
use App\Utils\Utils;
use Livewire\Component;
use Illuminate\Validation\ValidationException;

class TaskSingleComponent extends Component {

    public $id;
    public $title;
    public $description;
    public $due_date;
    public $reminder_date;
    public $checked;

    public $short_description;

    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'nullable|string|max:60000'
    ];


    public function mount($task) {
        $this->id = $task->id;
        $this->title = $task->title;
        $this->description = $task->description;
        $this->due_date = $task->due_date;
        $this->reminder_date = $task->reminder_date;
        $this->checked = $task->checked;

        if (strlen($task->description) > 50) {
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
        try {
            $this->validate();
            Task::updateTask($this->id, $this->title, $this->description, $this->due_date, $this->reminder_date, $this->checked);
            return redirect()->route('home');
        } catch (ValidationException $e) {
            $validator = $e->validator;
            if ($validator->errors()->has('title')) {
                $this->addError('title', "Error al actualizar la tarea: El título no puede estar vacío ni puede tener mas de 255 caracteres");
            } else {
              $this->addError('error', "Error al actualizar la tarea: Comprueba los campos de la tarea");
            }
        }
    }

    public function render() {

        return view('livewire.task-single-component');
    }
}
