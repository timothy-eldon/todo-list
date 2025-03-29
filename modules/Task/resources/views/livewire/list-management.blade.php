<div class="max-w-4xl mx-auto p-4 bg-white shadow-md rounded-lg">
    <h1 class="text-2xl font-bold mb-4">Manage Your Lists</h1>

    <!-- Success Message -->
    @if (session()->has('success'))
        <div class="p-2 mb-4 text-green-700 bg-green-100 border border-green-200 rounded">
            {{ session('success') }}
        </div>
    @endif

    <!-- Create New List -->
    <div class="mb-4">
        <input type="text" wire:model="name" placeholder="New List Name"
            class="border-gray-300 rounded shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
        <button wire:click="createList"
            class="ml-2 px-4 py-2 bg-indigo-600 text-white rounded shadow hover:bg-indigo-500">
            Create
        </button>
        @error('name') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
    </div>

    <!-- List Display -->
    <ul class="space-y-2">
        @foreach ($lists as $list)
            <li class="flex justify-between items-center p-2 border rounded">
                <!-- List Name -->
                @if ($editingListId === $list->id)
                    <input type="text" wire:model="editingListName"
                        class="border-gray-300 rounded shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    <button wire:click="renameList"
                        class="ml-2 px-4 py-2 bg-green-600 text-white rounded shadow hover:bg-green-500">
                        Save
                    </button>
                @else
                    <span>{{ $list->name }}</span>
                @endif

                <!-- Actions -->
                <div>
                    @if ($editingListId !== $list->id)
                        <button wire:click="$set('editingListId', {{ $list->id }})"
                            wire:click="$set('editingListName', '{{ $list->name }}')"
                            class="px-2 text-blue-500 hover:underline">
                            Rename
                        </button>
                    @endif
                    <button wire:click="deleteList({{ $list->id }})"
                        class="px-2 text-red-500 hover:underline">
                        Delete
                    </button>
                </div>
            </li>
        @endforeach
    </ul>
</div>