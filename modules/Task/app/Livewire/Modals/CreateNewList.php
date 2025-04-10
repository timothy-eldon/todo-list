<?php

namespace Modules\Task\App\Livewire\Modals;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;
use Modules\Task\App\Models\ListManagement as ModelsListManagement;

class CreateNewList extends Component
{
    public $title;
    public $show_modal;
    public $name;

    public function mount()
    {
        $this->show_modal = false;
    }

    public function render()
    {
        return view('task::livewire.modals.create-new-list');
    }


    #[On('toggle-create-list-modal')]
    public function toggle_create_list_modal(){
        $this->show_modal = !$this->show_modal;
    }

    // Create list
    public function create_list()
    {
        $this->validate([
            'name' => 'required|string|max:255|',
        ]);


        ModelsListManagement::create([
            'user_id' => Auth::id(),
            'title' => $this->name
        ]);

        // dd($this->name);

        $this->reset(['name']);
        $this->dispatch("refresh_list");

        $this->toggle_create_list_modal();
    }
}
 