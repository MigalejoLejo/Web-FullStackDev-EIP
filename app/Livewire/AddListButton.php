<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Tasklist;

class AddListButton extends Component {
    public $name;
    public $selectedColor = '#0c6dfd';

    public function selectColor($color) {
        $this->selectedColor = $color;
    }

    public function addList() {

        Tasklist::createUserList(
            auth()->id(),
            $this->name,
            $this->selectedColor,
        );

        $this->reset(['name', 'selectedColor']);
        return redirect()->route('home');
    }

    public function render() {
        return view('livewire.add-list-button');
    }
}
