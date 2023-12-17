<?php

namespace App\Livewire;

use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Sidebar extends Component
{
    public Collection $events;

    public $userCreatedEvents;

    public function mount()
    {
      $this->userCreatedEvents = Auth::user()->createdEvents()->get();

      $this->events = Event::all();
    }
  
    public function render()
    {
        return view('livewire.sidebar');
    }
}
