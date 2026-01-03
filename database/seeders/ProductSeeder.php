<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID'); // Menggunakan lokalisasi Indonesia

        // Ambil semua ID dari toko dan kategori yang sudah ada
        $storeIds = DB::table('stores')->pluck('id');
        $categoryIds = DB::table('categories')->pluck('id');

        // Jika tabel store atau category kosong, tampilkan pesan error
        if ($storeIds->isEmpty() || $categoryIds->isEmpty()) {
            $this->command->error('Tolong isi tabel stores dan categories terlebih dahulu!');
            return;
        }

        foreach (range(1, 50) as $index) {
            $name = $faker->unique()->words(3, true);
            $price = $faker->numberBetween(50000, 2000000); // Harga antara 50rb - 2jt

            DB::table('products')->insert([
                'store_id' => $faker->randomElement($storeIds),
                'category_id' => $faker->randomElement($categoryIds),
                'name' => ucwords($name),
                'sku' => 'SKU-' . strtoupper($faker->bothify('???-####')),
                'slug' => Str::slug($name) . '-' . $faker->unique()->numberBetween(100, 999),
                'description' => $faker->paragraph(3),
                'condition' => $faker->randomElement(['new', 'second']),
                'min_order' => 1,

                'price' => $price,
                'original_price' => $price + $faker->numberBetween(10000, 50000), // Harga coret
                'stock' => $faker->numberBetween(10, 100),

                'weight' => $faker->randomElement([500, 1000, 2000]), // gram
                'width' => $faker->numberBetween(10, 50),
                'height' => $faker->numberBetween(5, 30),
                'length' => $faker->numberBetween(10, 50),

                'image' => 'https://via.placeholder.com/640x480.png?text=Product+' . $index,
                'is_active' => true,
                'is_featured' => $faker->boolean(20), // 20% peluang jadi produk unggulan

                'views_count' => $faker->numberBetween(100, 5000),
                'sold_count' => $faker->numberBetween(5, 500),
                'rating_avg' => $faker->randomFloat(2, 3, 5), // Rating 3.00 - 5.00
                'reviews_count' => $faker->numberBetween(1, 100),

                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
