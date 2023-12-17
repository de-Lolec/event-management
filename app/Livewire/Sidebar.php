<?php

namespace App\Livewire;

use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Sidebar extends Component
{
    public Collection $allEvents;

    public Collection $userCreatedEvents;

    public function mount()
    {
      $user = Auth::user();

      $this->userCreatedEvents = $user->createdEvents()->get();

      $this->allEvents = Event::where('participant_id', '!=', $user->id)->get();
    }
  
    public function render()
    {
        return view('livewire.sidebar');
    }
}
