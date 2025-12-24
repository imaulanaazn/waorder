<?php

namespace App\Livewire\Pages\Cart;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class Cart extends Component
{
    public function render()
    {
        return view('livewire.pages.cart.cart');
    }
}
