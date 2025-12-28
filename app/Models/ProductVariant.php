<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductVariant extends Model
{
    protected $fillable = [
        'product_id',
        'variant_name',
        'variant_value',
        'price',
        'stock',
        'sku',
        'image',
    ];

    /**
     * Relasi Balik ke Produk Utama.
     * Setiap varian pasti dimiliki oleh satu produk.
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Accessor: Mendapatkan Harga Final.
     * Jika harga varian kosong (null), maka ambil harga dari produk utama.
     */
    public function getFinalPriceAttribute()
    {
        return $this->price ?? $this->product->price;
    }

    /**
     * Helper: Mengecek apakah stok tersedia.
     */
    public function isAvailable(): bool
    {
        return $this->stock > 0;
    }
}
