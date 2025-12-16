<?php

namespace App\Livewire\Components;

use Livewire\Component;

class MobileNavbar extends Component
{

    public string $path = '';

    public function mount($path)
    {
        $this->path = $path;
    }

    public function render()
    {
        return view('livewire.components.mobile-navbar');
    }
}
