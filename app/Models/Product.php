<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

use Livewire\WithFileUploads;


class Product extends Model
{
    use HasFactory;
    use WithFileUploads;

    protected $fillable = [
        'store_id',
        'category_id',
        'name',
        'sku',
        'slug',
        'description',
        'condition',
        'min_order',
        'price',
        'original_price',
        'stock',
        'weight',
        'width',
        'height',
        'length',
        'image',
        'is_active',
        'is_featured',
        'is_best_seller',
        'meta_title',
        'meta_description',
        'views_count',
        'sold_count',
        'rating_avg',
        'reviews_count',
    ];

    protected $casts = [
        'price'          => 'decimal:2',
        'original_price' => 'decimal:2',
        'is_active'      => 'boolean',
        'is_featured'    => 'boolean',
        'is_best_seller' => 'boolean',
        'weight'         => 'integer',
        'stock'          => 'integer',
        'rating_avg'     => 'decimal:2',
    ];

    // --- Booted Method untuk Slug ---
    protected static function booted()
    {
        static::creating(function ($product) {
            // Jika slug kosong, buat dari name
            if (!$product->slug) {
                $product->slug = Str::slug($product->name);
            }
        });

        static::updating(function ($product) {
            if ($product->isDirty('name')) {
                $product->slug = Str::slug($product->name);
            }
        });
    }
    // --- Relasi ---

    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class);
    }

    // 1 Product belongs to 1 Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // 1 Product punya banyak OrderItem
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    // Scope untuk produk aktif
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope untuk produk yang ada stok
    public function scopeInStock($query)
    {
        return $query->where('stock', '>', 0)->orWhereNull('stock');
    }

    // app/Models/Product.php
    public function cartItems()
    {
        return $this->hasMany(Cart::class);
    }

    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function getTotalStockAttribute()
    {
        // Jika produk tidak punya varian, ambil kolom stock asli
        if ($this->variants->isEmpty()) {
            return $this->stock;
        }

        // Jika punya varian, jumlahkan semua stok varian tersebut
        return $this->variants->sum('stock');
    }

    /**
     * Relasi ke Galeri Foto Produk.
     */
    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class)->orderBy('sort_order', 'asc');
    }

    /**
     * Helper untuk mengambil foto utama saja.
     */
    public function primaryImage()
    {
        return $this->hasOne(ProductImage::class)->where('is_primary', true);
    }

    public function getThumbnailUrlAttribute(): string
    {
        $primary = $this->primaryImage;

        if ($primary) {
            return $primary->image_url;
        }

        // Kembalikan gambar default jika tidak ada foto
        return asset('images/placeholder-product.png');
    }

    /**
     * Relasi ke Promosi (Many to Many).
     */
    public function promotions(): BelongsToMany
    {
        return $this->belongsToMany(Promotion::class, 'product_promotion')
            ->withPivot('quota', 'used_quota')
            ->withTimestamps();
    }

    /**
     * Accessor untuk mendapatkan info promo yang sedang aktif saat ini.
     */
    public function getActivePromotionAttribute()
    {
        return $this->promotions()
            ->where('is_active', true)
            ->where('start_date', '<=', now())
            ->where('end_date', '>=', now())
            ->first();
    }
}
