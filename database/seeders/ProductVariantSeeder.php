<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProductVariantSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Ambil semua produk yang ada
        $products = DB::table('products')->get();

        if ($products->isEmpty()) {
            $this->command->error('Tabel products kosong! Jalankan ProductSeeder dulu.');
            return;
        }

        foreach ($products as $product) {
            // Kita asumsikan setiap produk punya 3 varian warna
            $colors = ['Hitam', 'Putih', 'Merah', 'Biru', 'Hijau'];
            $selectedColors = $faker->randomElements($colors, 3);

            // Dan 3 varian ukuran
            $sizes = ['S', 'M', 'L', 'XL', 'XXL'];
            $selectedSizes = ['S', 'M', 'L']; // Standar ukuran

            foreach ($selectedColors as $color) {
                foreach ($selectedSizes as $size) {
                    DB::table('product_variants')->insert([
                        'product_id'    => $product->id,
                        'variant_name'  => 'Warna & Ukuran',
                        'variant_value' => "$color, $size",

                        // Harga varian bisa sama atau sedikit lebih mahal dari harga asli produk
                        'price'         => $product->price + $faker->randomElement([0, 5000, 10000]),

                        'stock'         => $faker->numberBetween(0, 50),
                        'sku'           => strtoupper(substr($product->name, 0, 3)) . '-' . $faker->unique()->numberBetween(1000, 9999),

                        // Placeholder gambar berdasarkan warna (opsional)
                        'image'         => 'https://via.placeholder.com/400x400.png?text=' . str_replace(' ', '+', $color),

                        'created_at'    => now(),
                        'updated_at'    => now(),
                    ]);
                }
            }
        }
    }
}
