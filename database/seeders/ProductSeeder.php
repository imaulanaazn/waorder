<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all();

        $products = [
            // Elektronik
            ['Smartphone Samsung Galaxy S24', 15999000, 25, 'Elektronik'],
            ['Laptop ASUS ROG Strix', 28999000, 10, 'Elektronik'],
            ['Earphone TWS Sony WF-1000XM5', 4299000, 50, 'Elektronik'],

            // Fashion Pria
            ['Kaos Polo Pria Cotton', 179000, 100, 'Fashion Pria'],
            ['Celana Jeans Slim Fit', 349000, 80, 'Fashion Pria'],

            // Fashion Wanita
            ['Dress Midi Floral', 499000, 60, 'Fashion Wanita'],
            ['Blouse Wanita Korean Style', 229000, 120, 'Fashion Wanita'],

            // Makanan & Minuman
            ['Kopi Arabica Gayo 1kg', 189000, 200, 'Makanan & Minuman'],
            ['Coklat SilverQueen 500g', 89000, 150, 'Makanan & Minuman'],

            // Kesehatan
            ['Masker Medis 3 Ply (50 pcs)', 35000, 500, 'Kesehatan'],
        ];

        foreach ($products as $item) {
            $category = $categories->where('name', $item[3])->first();

            Product::create([
                'store_id'     => 1,
                'category_id'  => $category->id,
                'name'         => $item[0],
                'slug'         => Str::slug($item[0]),
                'price'        => $item[1],
                'stock'        => $item[2],
                'description'  => 'Deskripsi lengkap untuk produk ' . $item[0] . '. Kualitas premium dengan harga terbaik.',
                'image'        => 'products/' . Str::slug($item[0], '-') . '.jpg',
                'is_active'    => true,
            ]);
        }
    }
}
