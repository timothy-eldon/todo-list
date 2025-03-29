<?php

namespace Modules\Task\App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Modules\Task\App\Models\ListManagement as ModelsListManagement;

class ListManagement extends Component
{
    public $editingListName; 
    public $editingListId;  
    public $lists;           
    public $name;            

    public function render()
    {
        return view('task::livewire.list-management');
    }

    
    public function mount()
    {
        $this->fetchLists();
    }

    // Fetch lists
    public function fetchLists()
    {
        $this->lists = ModelsListManagement::where('user_id', Auth::id())->get();
    }

    // Create list
    public function createList()
    {
        $this->validate([
            'name' => 'required|string|max:255|unique:lists,name,NULL,id,user_id,' . Auth::id(),
        ]);

        ModelsListManagement::create([
            'user_id' => Auth::id(),
            'name' => $this->name,
        ]);

        $this->reset(['name']); 
        $this->fetchLists();    
        session()->flash('success', 'List created successfully.');
    }

    // Rename list
    public function renameList()
    {
        $this->validate([
            'editingListName' => 'required|string|max:255|unique:lists,name,NULL,id,user_id,' . Auth::id(),
        ]);

        $list = ModelsListManagement::where('id', $this->editingListId)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $list->update(['name' => $this->editingListName]);

        $this->reset(['editingListId', 'editingListName']); 
        $this->fetchLists();    // Refresh the list
        session()->flash('success', 'List renamed successfully.');
    }

    // Delete a list
    public function deleteList($id)
    {
        $list = ModelsListManagement::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $list->delete();

        $this->fetchLists();    
        session()->flash('success', 'List deleted successfully.');
    }

    // Show all tasks for a list
    public function allTasks($list_id)
    {
        $list = ModelsListManagement::find($list_id);

        return $list->tasks();
    }


}