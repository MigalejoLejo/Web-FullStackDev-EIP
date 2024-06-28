<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Task;
use App\Utils\Utils;
use App\Models\Tasklist;

class ListsViewComponent extends Component {

    public $name;
    public $color;
    public $tasks;
    public $id;

    public $formAction = 'updateList';


    public function mount(TaskList $taskList) {
        $this->name = $taskList->name;
        $this->color = $taskList->color;
        $this->tasks = Task::getTasksFromList($taskList->id);
        $this->id = $taskList->id;
    }

    public function updateList() {
        Tasklist::updateList($this->id, $this->name, $this->color);
        return redirect()->route('home');
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
