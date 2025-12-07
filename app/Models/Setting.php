<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Setting extends Model
{
    protected $fillable = ['key', 'value'];

    public $timestamps = true;

    // Cache selama 24 jam (atau sesuai kebutuhan)
    protected const CACHE_TTL = 60 * 60 * 24;

    // Boot: hapus cache saat ada perubahan
    protected static function booted()
    {
        static::saved(function () {
            Cache::forget('settings.all');
        });

        static::deleted(function () {
            Cache::forget('settings.all');
        });
    }

    // === Helper Static Methods ===

    // Ambil semua settings (dengan cache)
    public static function allCached()
    {
        return Cache::remember('settings.all', self::CACHE_TTL, function () {
            return self::pluck('value', 'key')->toArray();
        });
    }

    // Get single setting
    public static function get($key, $default = null)
    {
        $settings = self::allCached();
        return $settings[$key] ?? $default;
    }

    // Set / update setting
    public static function set($key, $value)
    {
        $setting = self::updateOrCreate(
            ['key' => $key],
            ['value' => $value]
        );

        Cache::forget('settings.all');
        return $setting;
    }
}
