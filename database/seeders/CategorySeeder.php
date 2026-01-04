<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Elektronik',
                'slug' => 'elektronik',
                'image' => '/img/icons/categories/electronics.png',
                'is_popular' => true,
            ],
            [
                'name' => 'Fashion Pria',
                'slug' => 'fashion-pria',
                'image' => '/img/icons/categories/men-fashion.png',
                'is_popular' => true,
            ],
            [
                'name' => 'Fashion Wanita',
                'slug' => 'fashion-wanita',
                'image' => '/img/icons/categories/women-fashion.png',
                'is_popular' => true,
            ],
            [
                'name' => 'Makanan & Minuman',
                'slug' => 'makanan-minuman',
                'image' => '/img/icons/categories/food-drink.png',
                'is_popular' => true,
            ],
            [
                'name' =>  'Kesehatan',
                'slug' => 'kesehatan',
                'image' => '/img/icons/categories/health.png',
                'is_popular' => true,
            ],
            [
                'name' => 'Olahraga',
                'slug' => 'olahraga',
                'image' => '/img/icons/categories/sports.png',
                'is_popular' => true,
            ],
            [
                'name' => 'Otomotif',
                'slug' => 'otomotif',
                'image' => '/img/icons/categories/automotive.png',
                'is_popular' => true,
            ],
            [
                'name' => 'Buku & Alat Tulis',
                'slug' => 'buku-alat-tulis',
                'image' => '/img/icons/categories/books.png',
                'is_popular' => true,
            ],
            [
                'name' => 'Mainan & Hobi',
                'slug' => 'mainan-hobi',
                'image' => '/img/icons/categories/hobies.png',
                'is_popular' => false,
            ],
            [
                'name' => 'Perawatan Rumah',
                'slug' => 'perawatan-rumah',
                'image' => '/img/icons/categories/house.png',
                'is_popular' => false,
            ],
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'slug' => $category['slug'],
                'image' => $category['image'],
                'is_popular' => $category['is_popular'],
            ]);
        }

        // Atau pakai factory (jika sudah dibuat)
        // Category::factory(20)->create();
    }
}
