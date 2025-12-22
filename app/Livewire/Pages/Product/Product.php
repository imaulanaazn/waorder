<?php

namespace App\Livewire\Pages\Product;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class Product extends Component
{
    public function render()
    {
        return view('livewire.pages.product.product');
    }
}
