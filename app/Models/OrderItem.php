<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id',
        'product_id',
        'qty',
        'price',
        'subtotal',
    ];

    protected $casts = [
        'price'    => 'decimal:2',
        'subtotal' => 'decimal:2',
        'qty'      => 'integer',
    ];

    // Otomatis hitung subtotal saat save
    protected static function booted()
    {
        static::saving(function ($item) {
            $item->subtotal = $item->qty * $item->price;
        });
    }

    // === Relasi ===
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
