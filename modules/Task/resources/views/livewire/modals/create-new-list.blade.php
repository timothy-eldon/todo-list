<div class="">
    @if($show_modal)
    <div class="h-screen w-screen bg-black/40 fixed top-0 left-0 backdrop-blur-sm flex justify-center items-center ">
        <div class="w-full lg:w-1/3 bg-[#1d1616] rounded-lg px-3 py-3 text-white">
            <div class="justify-end flex">
                <button wire:click='toggle_create_list_modal'>
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="mt-2">
                <form wire:submit.prevent='create_list'>
                    <input
                        type="text"
                        wire:model='name'
                        class="w-full bg-transparent border-0 ring-0 focus-within:ring-0 text-lg text-white placeholder:text-gray-200 font-bold"
                        placeholder="Add a list title"
                        wire:model='title'
                    />
                    <div class="flex justify-end">
                        <button
                            type="submit"
                            class="text-xs bg-teal px-4 py-2 rounded-full hover:bg-teal-light/50 transition"
                        >
                            Continue
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif
</div>