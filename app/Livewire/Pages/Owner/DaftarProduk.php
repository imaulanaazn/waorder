<?php

namespace App\Livewire\Pages\Owner;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

#[Layout('layouts.owner-layout')]
class DaftarProduk extends Component
{

    use WithFileUploads;

    public string $drawerOpen = ''; //sort, category, filter
    public $showModal = false;
    public $formData = [
        'category_id' => '',
        'name' => '',
        'slug' => '',
        'description' => '',
        'condition' => '',
        'min_order' => 1,
        'price' => 0,
        'original_price' => 0,
        'stock' => 0,
        'weight' => 0,
        'width' => 0,
        'height' => 0,
        'length' => 0,
        'images' => [],
        'is_active' => 0,
        'is_featured' => 0,
        'meta_title' => '',
        'meta_description' => '',
    ];

    public $categories;
    public $products;

    public $formStep = 1;

    public function openDrawer($drawer)
    {
        $this->drawerOpen = $drawer;
    }

    public function closeDrawer()
    {
        $this->drawerOpen = '';
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

    public function nextStep()
    {
        $this->formStep++;
    }

    public function prevStep()
    {
        $this->formStep--;
    }

    public function save()
    {

        $productImages = [];

        if (isset($this->formData['images'])) {
            $productImages = array_map(function ($image) {
                return $image->store('products', 'public');
            }, $this->formData['images']);
        }

        $store = User::find(Auth::user()->id)->store;

        // Example action
        $product = Product::create([
            'store_id' => $store->id,
            'category_id' => $this->formData['category_id'],
            'name' => $this->formData['name'],
            'slug' => $this->formData['slug'],
            'description' => $this->formData['description'],
            'condition' => $this->formData['condition'] ? $this->formData['condition'] : 'new',
            'min_order' => $this->formData['min_order'],
            'price' => $this->formData['price'],
            'original_price' => $this->formData['original_price'],
            'stock' => $this->formData['stock'],
            'weight' => $this->formData['weight'],
            'width' => $this->formData['width'],
            'height' => $this->formData['height'],
            'length' => $this->formData['length'],
            'image' => $productImages[0] ?? null,
            'is_active' => $this->formData['is_active'],
            'is_featured' => $this->formData['is_featured'],
            'meta_title' => $this->formData['meta_title'],
            'meta_description' => $this->formData['meta_description'],
        ]);

        foreach ($productImages as $index => $image) {

            ProductImage::create([
                'product_id' => $product->id,
                'image_path' => $image,
                'is_primary' => $index == 0 ? 1 : 0,
                'sort_order' => 0,
            ]);
        }

        $this->dispatch(
            'alert',
            message: 'Produk berhasil ditambahkan!',
            type: 'success'
        );
        $this->closeModal();
    }

    public function render()
    {
        $this->categories = Category::all();
        $this->products = Product::all();
        return view('livewire.pages.owner.daftar-produk');
    }
}
