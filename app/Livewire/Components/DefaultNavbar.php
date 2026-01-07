<?php

namespace App\Livewire\Components;

use App\Models\Keyword;
use App\Models\Product;
use App\Models\Store;
use Livewire\Component;

class DefaultNavbar extends Component
{
    public $search;

    public function render()
    {
        $productResult = [];
        $storeResult = [];

        if ($this->search) {
            $productResult = Keyword::where('name', 'like', '%' . $this->search . '%')->limit(5)->get();
            $storeResult = Store::where('name', 'like', '%' . $this->search . '%')->limit(5)->get();
        }

        return view('livewire.components.default-navbar', ['productResult' => $productResult, 'storeResult' => $storeResult]);
    }
}
