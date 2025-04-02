<?php

namespace Modules\Task\App\Livewire;

use Illuminate\Support\Facades\Auth;
use League\Flysystem\MountManager;
use Livewire\Component;
use Modules\Task\App\Models\Task;
use Modules\User\App\Models\User;

class TaskList extends Component
{
    public $tasks;
    public $title;
    public $description;
    public $display_search;


    // livewire events
    protected $listeners = [
        'toggleSearch' => 'updateSearchDisplay',
        'taskUpdated' => 'refresh',
    ];

    public function updateSearchDisplay($display_search)
    {
        $this->display_search = $display_search;
    }

    public function mount(){
        $this->tasks = Auth::user()->tasks ?? [];
    }

    public function createTask(){

        if(!Auth::check()){
            session()->flash('error', 'You must be logged in to create a task');
            return;
        }

        $this->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // dd($this->description, $this->title);
        $user = User::find(Auth::user()->id);
        $task = $user->tasks()->create([
            'title' => $this->title,
            'description' => $this->description,
        ]);

        $this->tasks->push($task);
        $this->reset(['title', 'description']);

        session()->flash('message', 'Task created successfully');

    }

    public function deleteTask($task_id){
        $task = Task::findOrFail($task_id);
        $task->delete();

        $this->tasks = Auth::user()->tasks;
        session()->flash('message', 'Task deleted successfully!');

    }

    public function refresh(){
        $this->tasks = Auth::user()->tasks()->get();
    }

    public function render()
    {
        return view('task::livewire.task-list');
    }
}
