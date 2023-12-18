<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class NavItem extends Component
{
    public $event;

    public $currentEventId = 0;

    public function mount()
    {
        $this->currentEventId = Route::current()->parameter('id');
    }

    public function render()
    {
        return view('livewire.nav-item');
    }

}
