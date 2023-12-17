<li class="nav-item" wire:poll.30s>
  <a href="{{ route('event', ['id' => $event->id]) }}" class="nav-link">
      <i class="nav-icon far fa-image"></i>
      <p>
          {{ $event->title }}
      </p>
  </a>
</li>