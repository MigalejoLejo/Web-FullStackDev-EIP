<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Tasklist;

class AddListButton extends Component {
    public $name;
    public $selectedColor = '#0c6dfd';

    protected $rules = [
        'name' => 'required|string|max:255',
        'selectedColor' => 'required|string',
    ];

    public function selectColor($color) {
        $this->selectedColor = $color;
    }

    public function addList() {
        $this->validate();

        Tasklist::createUserList(
            auth()->id(),
            $this->name,
            $this->selectedColor,
        );

        // Reset fields after creating the list
        $this->reset(['name', 'selectedColor']);

        // Optionally, close the modal after submission
        return redirect()->route('home');
    }

    public function render() {
        return view('livewire.add-list-button');
    }
}
