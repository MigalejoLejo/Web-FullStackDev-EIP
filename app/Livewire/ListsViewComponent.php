<?php

namespace App\Livewire;

use App\Models\Task;

use App\Models\User;
use App\Utils\Utils;
use Livewire\Component;
use App\Models\Tasklist;
use Illuminate\Validation\ValidationException;

class ListsViewComponent extends Component {

    public $inputName;
    public $name;
    public $color;
    public $tasks;
    public $id;

    public $listOfUsers = [];
    public $userInput;

    public $formAction = 'updateList';

    protected $rules = [
        'inputName' => 'required|string|max:50',  // name must be a string, not empty, and not exceed 255 characters
    ];


    public function mount(TaskList $taskList) {
        $this->name = $taskList->name;
        $this->inputName = $taskList->name;
        $this->color = $taskList->color;
        $this->tasks = Task::getTasksFromList($taskList->id);
        $this->id = $taskList->id;
        $this->listOfUsers = Tasklist::getListUsers($taskList->id);
    }

    public function updateList() {
        $actualListUsers = Tasklist::getListUsers($this->id);
        $updatedListUsers = $this->listOfUsers;
        try {
            // Validate the input data
            $this->validate();

            // Perform the update operation
            $list = Tasklist::updateList($this->id, $this->inputName, $this->color);

            foreach ($actualListUsers as $user) {
                if (!in_array($user, $updatedListUsers)) {
                    Tasklist::removeUserFromList($this->id, $user->id);
                }
            }

            foreach ($updatedListUsers as $user) {
                if (!in_array($user, $actualListUsers)) {
                    Tasklist::shareList($this->id, $user->id);
                }
            }

            // Redirect to the 'home' route after successful update
            return redirect()->route('home');
        } catch (ValidationException $e) {
            $this->addError('name', "Error al actualizar la lista, comprueba que el titulo no este vacio ni exceda los 50 caracteres");
            $this->inputName = $this->name;
        }
    }


    public function addUserToArray() {
        if ($this->userInput !== '') {
            $user = collect(User::where('email', $this->userInput)->get());
            if ($user->first() !== null) {
                $this->listOfUsers[] = $user->first();
            }
        }
        $this->userInput = '';
    }

    public function removeUserFromArray($index) {
        unset($this->listOfUsers[$index]);
    }

    public function deleteList() {
        session()->forget('selectedList');
        $this->dispatch('deleteList'); // This will call the deleteList method in HomeBody.php

        /* NOTE: This is neccessary because homeBody is responsible for displaying the lists, and
        it needs to rerender the component and reset the information */
    }

    public function render() {
        return view('livewire.lists-view-component');
    }
}
