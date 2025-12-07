<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'store_id',
        'invoice',
        'customer_name',
        'customer_phone',
        'customer_address',
        'customer_note',
        'total_price',
        'status',
    ];

    protected $casts = [
        'total_price' => 'decimal:2',
        'status'      => 'string',
    ];

    // === Relasi ===
    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_items')
            ->withPivot('quantity', 'price_at_purchase', 'subtotal');
    }

    // === Scope ===
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeConfirmed($query)
    {
        return $query->where('status', 'confirmed');
    }

    // === Accessor ===
    public function getStatusBadgeAttribute()
    {
        return match ($this->status) {
            'pending'    => 'warning',
            'confirmed'  => 'info',
            'processing' => 'primary',
            'shipped'    => 'success',
            'done'       => 'success',
            'cancelled'  => 'danger',
            default      => 'secondary',
        };
    }
}
