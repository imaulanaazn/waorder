<?php

namespace App\Livewire\Pages;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Number;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class Home extends Component
{

    public string $path = '';
    public $bestSellerLimit = 6;
    public $recommendedLimit = 6;

    public function mount()
    {
        $this->path = request()->path();
    }

    public function loadMoreBestSeller()
    {
        $this->bestSellerLimit += 18;
    }

    public function loadMoreRecommended()
    {
        $this->recommendedLimit += 18;
    }

    public function render()
    {
        $recommendedProds = Product::where('is_featured', true)->where('is_active', true)
            ->with(['promotions' => function ($query) {
                $query->where('is_active', true)
                    ->where('start_date', '<=', now())
                    ->where('end_date', '>=', now());
            }])
            ->limit($this->recommendedLimit)
            ->get();
        $bestSellerProds = Product::where('is_best_seller', true)->where('is_active', true)
            ->with(['promotions' => function ($query) {
                $query->where('is_active', true)
                    ->where('start_date', '<=', now())
                    ->where('end_date', '>=', now());
            }])
            ->limit($this->bestSellerLimit)
            ->get();
        $products = Product::all();
        $popular_categories = Category::where('is_popular', true)->get();

        // dd($bestSellerProds);

        return view('livewire.pages.home', compact('products', 'popular_categories', 'bestSellerProds', 'recommendedProds'));
    }
}
