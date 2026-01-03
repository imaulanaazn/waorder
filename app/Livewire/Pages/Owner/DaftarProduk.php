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
use Livewire\Attributes\Url;
use Livewire\WithPagination;

#[Layout('layouts.owner-layout')]
class DaftarProduk extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $categories;
    public $drawerOpen = false; //sort, category, filter
    public $showModal = false;
    public $formStep = 1;
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

    #[Url(except: '')]
    public $search = '';

    #[Url(except: '')]
    public $category_id = '';

    #[Url(except: 'name')]
    public $orderBy = 'name';

    #[Url(except: 'asc')]
    public $order = 'asc';

    #[Url(except: '')]
    public $status = '';

    #[Url(except: '')]
    public $outstock = '';

    public function openDrawer($drawer)
    {
        $this->drawerOpen = $drawer;
    }

    public function closeDrawer()
    {
        $this->drawerOpen = false;
    }

    public function openModal()
    {
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
        $this->formStep = 1;
    }

    public function getProductsQuery()
    {
        return Product::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
                // ->orWhere('sku', 'like', '%' . $this->search . '%')
                // ->orWhere('code', 'like', '%' . $this->search . '%');
            })
            ->when(
                $this->category_id,
                fn($q) =>
                $q->where('category_id', $this->category_id)
            )
            ->when($this->status !== '', function ($query) {
                $query->where('is_active', (bool) $this->status);
            })
            ->when($this->outstock !== '', function ($query) {
                $query->where('stock', '<', 1);
            })
            ->orderBy($this->orderBy, $this->order)
            ->latest()
            ->paginate(8);
    }

    // For Filter When Changing Tab | For Both
    public function tabFilter($tab)
    {
        $this->closeDrawer();
        if ($tab === 'all') {
            $this->status = '';
            $this->outstock = '';
        } else if ($tab === 'active') {
            $this->status = 1;
            $this->outstock = '';
        } else if ($tab === 'outstock') {
            $this->status = '';
            $this->outstock = 1;
        } else if ($tab === 'nonaktif') {
            $this->status = 0;
            $this->outstock = '';
        }
        $this->resetPage();
    }

    // For Sorting | Desktop only
    public function sortFilter($sort)
    {
        $this->orderBy = explode('-', $sort)[0];
        $this->order = explode('-', $sort)[1];
        $this->resetPage();
    }

    // For Category Filter | Desktop only
    public function categoryFilter($category_id)
    {
        $this->category_id = $category_id;
        $this->resetPage();
    }

    // For Apply Filter | Mobile only
    public function applyFilter()
    {
        $this->closeDrawer();
        $this->resetPage();
    }

    //For toggling product status from the table
    public function toggleStatus($productId)
    {
        $product = Product::find($productId);
        $product->is_active = !$product->is_active;
        $product->save();

        $this->dispatch(
            'alert',
            message: 'Status produk berhasil diubah!',
            type: 'success'
        );
    }

    // This runs whenever ANY property is updated
    public function updated($propertyName)
    {
        // If the updated property is part of the filters, reset the page
        if (in_array($propertyName, ['search', 'category_id', 'orderBy', 'order', 'status', 'outstock'])) {
            $this->resetPage();
        }
    }

    public function mount()
    {
        $this->categories = Category::orderBy('name')->get();
    }

    public function render()
    {
        return view('livewire.pages.owner.daftar-produk', [
            'products' => $this->getProductsQuery()
        ]);
    }
}
