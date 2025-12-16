<?php

namespace App\Livewire\Pages;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class Home extends Component
{

    public string $path = '';

    public function mount()
    {
        $this->path = request()->path();
    }

    public function render()
    {
        return view('livewire.pages.home');
    }
}
