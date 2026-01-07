<?php

namespace Database\Seeders;

use App\Models\Keyword;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class KeywordSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Ambil semua produk yang ada
        $products = Product::with('category', 'subCategory')->get();

        if ($products->isEmpty()) {
            $this->command->error('Tabel products kosong! Jalankan ProductSeeder dulu.');
            return;
        }

        foreach ($products as $product) {
            // 2. Kumpulkan calon keyword dari nama produk, kategori, dan sub-kategori
            $rawKeywords = [];

            // Pecah nama produk menjadi kata-kata (misal: "iPhone 15 Pro" jadi ["iPhone", "15", "Pro"])
            $nameParts = explode(' ', $product->name);
            $rawKeywords = array_merge($rawKeywords, $nameParts);

            // Tambahkan nama kategori dan sub-kategori sebagai keyword
            if ($product->category) $rawKeywords[] = $product->category->name;
            if ($product->subCategory) $rawKeywords[] = $product->subCategory->name;

            // Tambahkan beberapa kata sifat random untuk variasi pencarian
            $adjectives = ['Murah', 'Berkualitas', 'Original', 'Terbaru', 'Promo'];
            $rawKeywords[] = $adjectives[array_rand($adjectives)];

            // 3. Bersihkan data (hapus duplikat, buat huruf kecil, hapus karakter aneh)
            $cleanKeywords = collect($rawKeywords)
                ->map(fn($item) => Str::lower(trim(preg_replace('/[^A-Za-z0-9\-]/', '', $item))))
                ->filter(fn($item) => strlen($item) > 2) // Abaikan kata yang terlalu pendek (seperti "di", "ke")
                ->unique();

            foreach ($cleanKeywords as $word) {
                // 4. Simpan ke tabel keywords jika belum ada (firstOrCreate)
                $keyword = Keyword::firstOrCreate(['name' => $word]);

                // 5. Hubungkan ke tabel pivot product_keyword
                // Menggunakan syncWithoutDetaching agar tidak duplikat di pivot
                $product->keywords()->syncWithoutDetaching([$keyword->id]);
            }
        }
    }
}
