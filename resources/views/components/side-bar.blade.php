@auth()
    <div class="d-flex">
        <div class="sidebar">
            <a href="{{ route('myday.index') }}" class="d-flex align-items-center text-white p-2">
                <i class="fa-regular fa-sun me-2"></i> My Day
            </a>

            <livewire:task::list-management />
        </div>
        <livewire:task::modals.create-new-list />
    </div>
@endauth()