<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductPromotion extends Model
{
    protected $table = 'product_promotion';

    /**
     * Helper untuk cek apakah kuota promo masih tersedia.
     */
    public function hasAvailableQuota(): bool
    {
        if (is_null($this->quota)) return true; // Unlimited jika null
        return $this->used_quota < $this->quota;
    }
}
