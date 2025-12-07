<?php

namespace Database\Seeders;

use App\Models\Store;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stores = [
            [
                'user_id' => 8,
                'name' => 'Tech Mart',
                'slug' => 'tech-mart',
                'description' => 'Toko khusus gadget, aksesoris, dan elektronik terbaru.',
                'logo' => 'stores/tech-mart/logo.png',
                'banner' => 'stores/tech-mart/banner.png',
                'phone' => '081234567801',
                'email' => 'techmart@gmail.com',
                'address' => 'Jl. Sudirman No. 21',
                'city' => 'Jakarta',
                'province' => 'DKI Jakarta',
                'postal_code' => '10220',
                'is_active' => true,
                'verified_at' => now(),
            ],
            [
                'user_id' => 9,
                'name' => 'Fashion Street',
                'slug' => 'fashion-street',
                'description' => 'Menjual pakaian pria dan wanita dengan harga terjangkau.',
                'logo' => 'stores/fashion-street/logo.png',
                'banner' => 'stores/fashion-street/banner.png',
                'phone' => '081234567802',
                'email' => 'fashionstreet@gmail.com',
                'address' => 'Jl. Asia Afrika No. 10',
                'city' => 'Bandung',
                'province' => 'Jawa Barat',
                'postal_code' => '40111',
                'is_active' => true,
                'verified_at' => now(),
            ],
            [
                'user_id' => 10,
                'name' => 'Daily Needs Store',
                'slug' => 'daily-needs-store',
                'description' => 'Menjual kebutuhan sehari-hari rumah tangga.',
                'logo' => 'stores/daily-needs/logo.png',
                'banner' => 'stores/daily-needs/banner.png',
                'phone' => '081234567803',
                'email' => 'dailyneeds@gmail.com',
                'address' => 'Jl. Gajah Mada No. 5',
                'city' => 'Surabaya',
                'province' => 'Jawa Timur',
                'postal_code' => '60231',
                'is_active' => true,
                'verified_at' => null,
            ],
            [
                'user_id' => 11,
                'name' => 'Home Living',
                'slug' => 'home-living',
                'description' => 'Perlengkapan rumah tangga modern dan minimalis.',
                'logo' => 'stores/home-living/logo.png',
                'banner' => 'stores/home-living/banner.png',
                'phone' => '081234567804',
                'email' => 'homeliving@gmail.com',
                'address' => 'Jl. Ahmad Yani No. 88',
                'city' => 'Yogyakarta',
                'province' => 'DI Yogyakarta',
                'postal_code' => '55281',
                'is_active' => false,
                'verified_at' => null,
            ],
        ];

        foreach ($stores as $store) {
            Store::create($store);
        }
    }
}
