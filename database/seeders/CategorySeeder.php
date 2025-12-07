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
            'Elektronik',
            'Fashion Pria',
            'Fashion Wanita',
            'Makanan & Minuman',
            'Kesehatan',
            'Olahraga',
            'Otomotif',
            'Buku & Alat Tulis',
            'Mainan & Hobi',
            'Perawatan Rumah',
        ];

        foreach ($categories as $name) {
            Category::create([
                'name' => $name,
                'slug' => Str::slug($name),
            ]);
        }

        // Atau pakai factory (jika sudah dibuat)
        // Category::factory(20)->create();
    }
}
