<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PromotionSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        // 1. Buat 10 Data Promosi
        $promotions = [
            ['name' => 'Flash Sale Merdeka', 'type' => 'percentage', 'value' => 17],
            ['name' => 'Promo Gajian', 'type' => 'fixed', 'value' => 50000],
            ['name' => 'Diskon Akhir Tahun', 'type' => 'percentage', 'value' => 50],
            ['name' => 'Mantap Monday', 'type' => 'fixed', 'value' => 10000],
            ['name' => 'Harbolnas 12.12', 'type' => 'percentage', 'value' => 90],
            ['name' => 'Super Brand Day', 'type' => 'percentage', 'value' => 25],
            ['name' => 'Diskon New User', 'type' => 'fixed', 'value' => 25000],
            ['name' => 'Voucher Ramadan', 'type' => 'percentage', 'value' => 15],
            ['name' => 'Cashback Kilat', 'type' => 'fixed', 'value' => 75000],
            ['name' => 'Promo Weekend', 'type' => 'percentage', 'value' => 10],
        ];

        foreach ($promotions as $index => $promo) {
            $promotionId = DB::table('promotions')->insertGetId([
                'name' => $promo['name'],
                'slug' => Str::slug($promo['name']) . '-' . $index,
                'description' => "Nikmati promo " . $promo['name'] . " hanya untuk periode terbatas!",
                'type' => $promo['type'],
                'discount_value' => $promo['value'],
                // Set agar promo aktif (dimulai hari ini sampai 7 hari ke depan)
                'start_date' => $now,
                'end_date' => $now->copy()->addDays(7),
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // 2. Hubungkan ke 5-10 Produk Secara Acak untuk setiap promo
            $productIds = DB::table('products')->inRandomOrder()->limit(rand(5, 10))->pluck('id');

            foreach ($productIds as $productId) {
                DB::table('product_promotion')->insert([
                    'product_id' => $productId,
                    'promotion_id' => $promotionId,
                    'quota' => rand(50, 100), // Batas stok promo
                    'used_quota' => 0,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
