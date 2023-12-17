<?php

namespace App\Livewire;

use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class Sidebar extends Component
{
    public Collection $allEvents;

    public Collection $userCreatedEvents;

    public function mount()
    {
      $user = Auth::user();

      $this->userCreatedEvents = $user->participatedEvents()->get();

      $this->allEvents = Event::where('participant_id', '!=', $user->id)->get();
    }
  
    public function render()
    {
        return view('livewire.sidebar');
    }

    #[On('user-participates')] 
    public function participatedEvents(): void
    {
        $this->dispatch('$refresh');
    }
}
