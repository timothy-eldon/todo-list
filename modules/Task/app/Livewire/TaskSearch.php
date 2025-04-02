<?php

namespace Modules\Task\App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Modules\Task\App\Models\Task;

class TaskSearch extends Component
{


    public $search = '';
    public $tasks = [];

    public $display_search;

    protected $listeners = [
        'toggleSearch' => 'updateSearchDisplay',
        'searchUpdated' => 'fetchAuthTasks'
    ];

    public function fetchAuthTasks($searchTerm){
        $this->search = $searchTerm; // Update search term


        if (Auth::check()) {
            $this->tasks = Task::where('user_id', Auth::id())
                ->where(function ($query) {
                    $query->where('title', 'like', "%{$this->search}%")
                          ->orWhere('description', 'like', "%{$this->search}%");
                })
                ->get();
        } else {
            $this->tasks = [];
        }
    }

    public function updateSearchDisplay($display_search)
    {
        $this->display_search = $display_search;
    }

    public function render()
    {
        return view('task::livewire.task-search', ['tasks' => $this->tasks]);
    }
}
