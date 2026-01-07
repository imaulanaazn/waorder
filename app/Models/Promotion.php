<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class Promotion extends Model
{

    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'type',
        'discount_value',
        'start_date',
        'end_date',
        'is_active',
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date'   => 'datetime',
        'is_active'  => 'boolean',
        'discount_value' => 'decimal:2',
    ];

    // Auto-generate slug
    protected static function booted()
    {
        static::creating(fn($promotion) => $promotion->slug = Str::slug($promotion->name));
    }

    /**
     * Relasi ke produk (Many to Many).
     */
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'product_promotion')
            ->withPivot('quota', 'used_quota')
            ->withTimestamps();
    }

    /**
     * Scope untuk memfilter promo yang sedang berjalan saat ini.
     */
    public function scopeActiveNow($query)
    {
        $now = now();
        return $query->where('is_active', true)
            ->where('start_date', '<=', $now)
            ->where('end_date', '>=', $now);
    }
}
