<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cart extends Model
{
    protected $fillable = [
        'session_id',
        'user_id',
        'qty',
    ];

    protected $casts = [
        'qty' => 'integer',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // === Scope ===
    public function scopeForSession($query, $sessionId)
    {
        return $query->where('session_id', $sessionId)->whereNull('user_id');
    }

    public function scopeForUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }

    // === Accessor ===
    public function getSubtotalAttribute()
    {
        return $this->qty * $this->product->price;
    }

    public function getFormattedSubtotalAttribute()
    {
        return 'Rp' . number_format($this->subtotal, 0, ',', '.');
    }
}
