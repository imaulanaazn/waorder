<?php

namespace App\Livewire\Pages\Owner;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.owner-layout')]
class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.pages.owner.dashboard');
    }
}
