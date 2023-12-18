<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="{{ route('admin') }}" class="d-block">
                    {{ auth()->user()->name }}
                    {{ auth()->user()->surname }}
                </a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-header">All events:</li>
                @foreach ($allEvents as $event)
                <livewire:nav-item 
                :event="$event" 
                wire:key="{{ $event->id}}"

                />
                @endforeach
                <li class="nav-header">Your events:</li>
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
