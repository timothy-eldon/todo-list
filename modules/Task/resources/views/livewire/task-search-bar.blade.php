<div class="flex justify-end items-center w-full">
    <div class="relative">
        <input wire:model.debounce.500ms="search" wire:keyup="getUpdatedSearch"  type="text"
               class="pl-10 pr-4 py-2 border rounded-lg bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-400"
               placeholder="Search tasks...">
        <button class="absolute left-2 top-2 text-teal-500 hover:text-teal-700 dark:text-teal-400">
            <i class="bi bi-search"></i>
        </button>
    </div>
</div>
