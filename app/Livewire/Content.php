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

    public function render()
    {
        return view('livewire.content');
    }

    public function participate(): void
    {
        $user = Auth::user();

        $eventParticipate = UserEvent::create([
            'user_id' => $user->id,
            'event_id' => $this->event->id,
        ]);

        $this->dispatch('user-participates');
    }

    public function cancelParticipate(): void
    {
        UserEvent::where('event_id', $this->event->id)
        ->where('user_id', Auth::user()->id)
        ->delete();

        $this->dispatch('user-participates');
    }
}
