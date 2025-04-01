

<div class="w-100 bg-teal py-5 px-5 d-flex flex-column justify-content-between">
    <div>
    <livewire:task::task-search />

        @foreach ($tasks as $task)
            <div class="d-flex justify-content-between bg-light-transparent p-3 my-2">
                <div class="w-100 container d-flex gap-2">
                    <div>
                        <div class="avatar"></div>
                    </div>


                    <div class="text-white">
                        <div class="d-flex gap-2 mb-2">
                            <i class="fa-solid fa-lock"></i>
                            <h4>my list>personal</h4>
                        </div>
                        <h3 class="fw-bold fs-4">{{ $task->title }}</h3>
                    </div>


                </div>
                <div class="d-flex gap-2">
                    <button wire:click="$dispatch('loadTask', {taskId: {{ $task->id }}})"  class="text-white">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                    <button wire:click="deleteTask({{ $task->id }})" class="text-white">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </div>
            </div>
        @endforeach
    </div>

    <div>
        @if (session()->has('message'))
        <div style="color: green;">{{ session('message') }}</div>
    @endif

    @if (session()->has('error'))
        <div style="color: red;">{{ session('error') }}</div>
    @endif
        <div class="bg-light-transparent px-1 py-1 mt-3 text-white">
            <form wire:submit.prevent="createTask" class="d-flex">
                <button class="btn p-0 fs-4">
                    <i class="fa-solid fa-square-plus text-white"></i>
                </button>
                <input wire:model="title" type="text" placeholder="Add task" class="create-task-form bg-transparent w-100 ">
            </form>
        </div>
    </div>

</div>
