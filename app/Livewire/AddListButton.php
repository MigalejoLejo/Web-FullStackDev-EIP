<?php

namespace App\Livewire;

use App\Models\User;
use App\Utils\Utils;
use Livewire\Component;
use Nette\Utils\Arrays;
use App\Models\Tasklist;


class AddListButton extends Component {
    public $id;

    public $name;
    public $selectedColor = '#0c6dfd';

    public $listOfUsers = [];
    public $userInput;

    public function mount($id) {
        $this->id = $id;
    }

    public function selectColor($color) {
        $this->selectedColor = $color;
    }


    public function validateList() {
        return isset($this->name);
    }


    public function addList() {

        if ($this->validateList()) {
            $list = Tasklist::createUserList(
                auth()->id(),
                $this->name,
                $this->selectedColor,
            );
            if ($this->listOfUsers) {
                foreach ($this->listOfUsers as $user) {
                    Tasklist::shareList(
                        $list->id,
                        $user->id
                    );
                }
            }
            $this->reset(['name', 'selectedColor']);
            return redirect()->route('home')->with('success', 'La lista ' . $this->name . ' se ha creado correctamente');
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



    public function render() {
        return view('livewire.add-list-button');
    }
}
