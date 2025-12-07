<?php

namespace App\Livewire\Pages\Admin;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin-layout')]
class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.pages.admin.dashboard');
    }
}
