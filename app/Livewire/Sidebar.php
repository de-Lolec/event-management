<?php

namespace App\Livewire;

use App\Models\Event;
use App\Models\User;
use App\Models\UserEvent;
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
        $this->updateSidebar();
    }
  
    public function render()
    {
        return view('livewire.sidebar');
    }

    #[On('user-participates')] 
    public function updateSidebar(): void
    {
        $user = Auth::user();

        $this->userCreatedEvents = $user->participatedEvents()->get();
  
        $this->allEvents = Event::whereDoesntHave('participant')->get();
    }
}
