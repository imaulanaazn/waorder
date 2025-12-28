<?php

namespace App\Livewire\Pages\Owner;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.owner-layout')]
class DaftarPesanan extends Component
{

    public string $drawerOpen = ''; //sort, category, filter

    public function openDrawer($drawer)
    {
        $this->drawerOpen = $drawer;
    }

    public function closeDrawer()
    {
        $this->drawerOpen = '';
    }

    public function render()
    {
        return view('livewire.pages.owner.daftar-pesanan');
    }
}
