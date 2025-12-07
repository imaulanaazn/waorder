<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SettingSeeder extends Model
{
    public function run(): void
    {
        $defaultSettings = [
            // Informasi Toko
            'store_name'        => 'TokoKu Premium',
            'store_tagline'     => 'Belanja Mudah, Harga Hemat',
            'store_phone'       => '0812-3456-7890',
            'store_email'       => 'halo@tokoku.com',
            'store_address'     => 'Jl. Ahmad Yani No. 123, Surabaya, Jawa Timur',
            'store_description' => 'Toko online terlengkap dan terpercaya sejak 2020.',

            // Media
            'store_logo'        => 'logo.png',           // simpan di storage/app/public
            'store_favicon'     => 'favicon.ico',

            // Pengiriman & Pembayaran
            'shipping_cost'     => '15000',              // flat ongkir
            'free_shipping_min' => '300000',             // gratis ongkir jika belanja >= 300rb
            'currency'          => 'IDR',
            'tax_percentage'    => '11',                 // PPN 11%

            // Sosial Media
            'instagram_url'     => 'https://instagram.com/tokoku',
            'facebook_url'      => 'https://facebook.com/tokoku',
            'whatsapp_number'   => '6281234567890',

            // Status Toko
            'maintenance_mode'  => '0',                  // 0 = normal, 1 = maintenance
            'maintenance_message' => 'Sistem sedang dalam perbaikan. Kembali sebentar lagi!',

            // SEO
            'meta_title'        => 'TokoKu - Belanja Online Terpercaya',
            'meta_description'  => 'Belanja berbagai produk berkualitas dengan harga terbaik di TokoKu.',
        ];

        foreach ($defaultSettings as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }
    }
}
