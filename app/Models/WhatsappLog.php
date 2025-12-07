<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class WhatsappLog extends Model
{
    protected $fillable = [
        'direction',
        'phone',
        'message',
        'status',
        'raw_response',
    ];

    protected $casts = [
        'raw_response' => 'array', // otomatis json_decode saat diakses
    ];

    // === Scopes ===
    public function scopeSend(Builder $query)
    {
        return $query->where('direction', 'send');
    }

    public function scopeReceive(Builder $query)
    {
        return $query->where('direction', 'receive');
    }

    public function scopeSuccess(Builder $query)
    {
        return $query->where('status', 'success');
    }

    public function scopeFailed(Builder $query)
    {
        return $query->where('status', 'failed');
    }

    public function scopeToday(Builder $query)
    {
        return $query->whereDate('created_at', today());
    }

    // === Accessor ===
    public function getDirectionBadgeAttribute()
    {
        return $this->direction === 'send' ? 'primary' : 'info';
    }

    public function getStatusBadgeAttribute()
    {
        return $this->status === 'success' ? 'success' : 'danger';
    }

    public function getShortMessageAttribute()
    {
        return Str::limit(strip_tags($this->message), 50);
    }
}
