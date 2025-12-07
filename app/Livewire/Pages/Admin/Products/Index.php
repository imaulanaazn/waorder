<?php

namespace App\Livewire\Pages\Admin\Products;

use App\Models\Category;
use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('layouts.admin-layout')]
class Index extends Component
{
    use WithFileUploads;

    public $showModal = false;
    public $name;
    public $slug;
    public $price;
    public $stock;
    public $description;
    public $image;
    public $category_id;
    public $categories;
    public $products;

    public function render()
    {
        $this->categories = Category::all();
        $this->products = Product::all();
        return view('livewire.pages.admin.products.index');
    }

    public function openModal()
    {
        $this->resetValidation();
        $this->reset();
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|min:3',
            'slug' => 'required|min:3',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = $this->image->store('products', 'public');

        // Example action
        Product::create([
            'name' => $this->name,
            'slug' => $this->slug,
            'price' => $this->price,
            'stock' => $this->stock,
            'description' => $this->description,
            'image' => $imagePath,
            'category_id' => $this->category_id,
        ]);

        session()->flash('success', 'Saved successfully!');
        $this->closeModal();
    }
}
