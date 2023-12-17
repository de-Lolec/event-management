<aside class="main-sidebar sidebar-dark-primary elevation-4">

    {{-- <a href="../index3.html" class="brand-link">
        <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a> --}}

    <div class="sidebar">

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-header">EXAMPLES</li>
                @foreach ($allEvents as $event)
                    <livewire:nav-item :event="$event" wire:key="{{ $event->id }}"/>
                @endforeach
                <li class="nav-header">EXAMPLES</li>
                @foreach ($userCreatedEvents as $userCreatedEvent)
                    <livewire:nav-item :event="$userCreatedEvent" wire:key="{{ $userCreatedEvent->id }}"/>
                @endforeach
                {{-- <li class="nav-item">
                    <a href="calendar.html" class="nav-link">
                        <i class="nav-icon far fa-calendar-alt"></i>
                        <p>
                            Calendar
                            <span class="badge badge-info right">2</span>
                        </p>
                    </a>
                </li> --}}

            </ul>
        </nav>

    </div>

</aside>
