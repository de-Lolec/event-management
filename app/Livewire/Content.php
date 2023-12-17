<?php

namespace App\Livewire;

use App\Models\Event;
use Illuminate\Support\Facades\Auth;
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

        $eventParticipate = Event::create([
            'title' => $this->event->title,
            'text' => $this->event->text,
            'creator_id' => $this->event->id,
            'participant_id' => $user->id,
        ]);

        $this->dispatch('refresh');

        $this->dispatch('user-participates');

        redirect(route('event', $eventParticipate->id));
    }
}
