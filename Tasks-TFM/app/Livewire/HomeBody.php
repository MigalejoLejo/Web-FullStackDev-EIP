<?php

namespace App\Livewire;


use Livewire\Component;
use App\Models\Tasklist;
use Illuminate\Support\Facades\Auth;

class HomeBody extends Component {

    public $userLists;
    public $selectedList;
    protected $listeners = ['deleteList' => 'handelDeleteList'];



    public function mount($user) {
        if (session()->has('selectedList')) {
            $this->selectedList = Tasklist::getListById(session('selectedList')->id);
            session(['selectedList' => $this->selectedList]);
        }
        $this->userLists = Tasklist::getUserLists($user->id);
    }

    public function selectList(Tasklist $list) {
        $this->selectedList = $list;
        session(['selectedList' => $this->selectedList]);
    }

    public function handelDeleteList() {
        $listToRemoveId = $this->selectedList->id;
        $this->userLists = array_filter($this->userLists, function ($list) use ($listToRemoveId) {
                return $list['id'] !== $listToRemoveId;
            });
        $this->selectedList = $this->userLists[0];
        session(['selectedList' => $this->selectedList]);
        Tasklist::deleteListById($listToRemoveId);
        return redirect()->route('home');

    }

    public function render() {
        return view('livewire.home-body', ['userLists' => $this->userLists, 'selectedList' => $this->selectedList]);
    }
}
