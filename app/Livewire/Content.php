<?php

namespace App\Livewire;

use App\Models\Event;
use App\Models\UserEvent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class Content extends Component
{
    public Event $event;

    public function mount()
    {
        session(['eventId' => $this->event->id]);
        $this->dispatch('user-participates');
    }

    public function render()
    {
        session(['eventId' => $this->event->id]);

        return view('livewire.content');
    }

    public function participate(): void
    {
        $user = Auth::user();

        $eventParticipate = UserEvent::create([
            'user_id' => $user->id,
            'event_id' => $this->event->id,
        ]);


        $this->dispatch('set-current-event', eventId: $this->event->id);

        session(['eventId' => $this->event->id]);

        $this->dispatch('user-participates');
    }

    public function cancelParticipate(Event $event): void
    {
        $user = Auth::user();

        UserEvent::where('event_id', $event->id)->delete();

        $this->dispatch('user-participates');
    }
}
