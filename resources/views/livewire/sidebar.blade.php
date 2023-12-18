<aside class="main-sidebar sidebar-dark-primary elevation-4" wire:poll.30s="updateSidebar">
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info d-flex justify-content-end">
                <a href="{{ route('admin') }}" class="d-block mt-2">
                    {{ auth()->user()->name }}
                    {{ auth()->user()->surname }}
                </a>
            
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-dark float-right ml-4">Выйти</button>
                </form>

            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-header"><h5>Все события:</h5></li>
                @foreach ($allEvents as $event)
                    <livewire:nav-item 
                    :event="$event" 
                    wire:key="{{ $event->id }}"
                    />
                @endforeach
                <li class="nav-header"><h5>Мои события:</h5></li>
                @foreach ($userCreatedEvents as $userCreatedEvent)
                    <livewire:nav-item 
                    :event="$userCreatedEvent" 
                    wire:key="{{ $userCreatedEvent->id . $userCreatedEvent->created_at}}"
                    />
                @endforeach
            </ul>
        </nav>
    </div>
</aside>
