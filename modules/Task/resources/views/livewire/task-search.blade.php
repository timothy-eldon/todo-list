<div>    
    @if(count($tasks) > 0)
    <div class="d-flex justfity-content-start align-items-center">
        <h2 class="fw-bold fs-1 text-light">Search Result:</h2>
    </div>
        @foreach ($tasks as $task)
            <div class="d-flex justify-between bg-light-transparent p-3 my-2">
                <div class="w-100 container d-flex gap-2">
                    <div>
                        <div class="avatar"></div>
                    </div>
                    <div class="text-white">
                        <div class="d-flex gap-2 mb-2">
                            <i class="fa-solid fa-lock"></i>
                            <h4>My List > Personal</h4>
                        </div>
                        <h3 class="fw-bold fs-4">{{ $task->title }}</h3>    
                    </div>
                </div>
                <div class="d-flex gap-2">
                    <button wire:click="$dispatch('loadTask', {taskId: {{ $task->id }}})" class="text-white">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                    <button wire:click="deleteTask({{ $task->id }})" class="text-white">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </div>
            </div>
            
        @endforeach
        <hr class="mb-5">
    @else
        <div>No tasks found.</div>
    @endif
</div>
