<?php

namespace Modules\Task\App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Modules\Task\App\Livewire\Modals\CreateNewList;
use Modules\Task\App\Models\ListManagement as ModelsListManagement;

class ListManagement extends Component
{
    public $editingListName;
    public $editingListId;
    public $lists = [];
    public $name;

    protected $listeners = [
        'refresh_list' => 'fetchLists'
    ];

    public function mount()
    {
        $this->fetchLists();
    }

    public function render()
    {
        return view('task::livewire.list-management');
    }

    // Fetch lists
    public function fetchLists()
    {
        $list = ModelsListManagement::where('user_id', Auth::id())->get();
        $lists_array = [];

        foreach($list as $item){
            $data = [
                'name' => $item->title,
                'count' => $this->tasks_count_for_list($item->id)
            ];

            array_push($lists_array, $data);
        }

        $this->lists = $lists_array;
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

    public function tasks_count_for_list($list)
    {
        $list_count = ModelsListManagement::find($list)->tasks->count();
        return $list_count;
    }

    public function show_create_new_list_modal()
    {
        $this->dispatch("toggle-create-list-modal");
    }

}