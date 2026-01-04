<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Ambil ID dari kategori utama yang sudah ada
        // Pastikan nama kategori di database sesuai (Elektronik, Pakaian, dll)
        $categories = [
            'elektronik' => ['Smartphone', 'Laptop', 'Audio & Speaker', 'Kamera'],
            'fashion-pria' => ['Kaos', 'Kemeja', 'Celana Panjang', 'Jaket'],
            'fashion-wanita' => ['Dress', 'Blouse', 'Rok', 'Hijab'],
            'perawatan-rumah' => ['Furniture', 'Dapur', 'Dekorasi', 'Kebersihan'],
            'olahraga' => ['Sepatu Lari', 'Alat Gym', 'Pakaian Olahraga', 'Sepeda'],
        ];

        foreach ($categories as $parentName => $subs) {
            // Cari ID kategori utama berdasarkan nama
            $parent = DB::table('categories')->where('slug', $parentName)->first();

            if ($parent) {
                foreach ($subs as $index => $subName) {
                    DB::table('sub_categories')->insert([
                        'category_id' => $parent->id,
                        'name'        => $subName,
                        'slug'        => Str::slug($subName),
                        'created_at'  => now(),
                        'updated_at'  => now(),
                    ]);
                }
            }
        }
    }
}
