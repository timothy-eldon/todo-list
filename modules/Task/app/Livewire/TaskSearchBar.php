<?php

namespace Modules\Task\App\Livewire;

use Livewire\Component;

class TaskSearchBar extends Component
{
    public $search = '';
    public $display_search = false;

    public function getUpdatedSearch()
    {
        $this->dispatch('searchUpdated', searchTerm: $this->search);
        $this->dispatch('toggleSearch', display_search: !empty(trim($this->search)));
    }

    public function render()
    {
        return view('task::livewire.task-search-bar');
    }
}
