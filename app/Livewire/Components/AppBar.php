<?php

namespace App\Livewire\Components;

use Livewire\Component;

class AppBar extends Component
{

    public $page;

    public function mount(string $page = '')
    {
        $this->page = $page;
    }

    public function render()
    {
        return view('livewire.components.app-bar');
    }
}
