<?php

namespace App\Livewire\Pages;

use App\Models\Category;
use App\Models\Product;
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
        $products = Product::all();
        $popular_categories = Category::where('is_popular', true)->get();
        return view('livewire.pages.home', compact('products', 'popular_categories'));
    }
}
