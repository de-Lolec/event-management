<?php

namespace App\Livewire;

use Livewire\Component;

class NavItem extends Component
{
    public $event;

    public function render()
    {
        return view('livewire.nav-item');
    }
}
