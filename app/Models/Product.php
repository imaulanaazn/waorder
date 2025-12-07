<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'store_id',
        'category_id',
        'name',
        'slug',
        'price',
        'stock',
        'description',
        'image',
        'is_active',
    ];

    protected $casts = [
        'price'     => 'decimal:2',
        'is_active' => 'boolean',
    ];

    // Auto generate slug dari name
    protected static function booted()
    {
        static::creating(function ($product) {
            $product->slug = Str::slug($product->name);
        });

        static::updating(function ($product) {
            if ($product->isDirty('name')) {
                $product->slug = Str::slug($product->name);
            }
        });
    }

    // === Relasi ===

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
}
