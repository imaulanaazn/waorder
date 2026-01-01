<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product_images', function (Blueprint $table) {
            $table->id();

            // Relasi ke produk utama
            $table->foreignId('product_id')
                ->constrained('products')
                ->onDelete('cascade');

            // Path atau URL file gambar
            $table->string('image_path');

            // Menentukan foto mana yang menjadi sampul/cover utama
            $table->boolean('is_primary')->default(false);

            // Untuk mengatur urutan foto (Foto 1, Foto 2, dst)
            $table->integer('sort_order')->default(0);

            $table->timestamps();

            // Index untuk mempercepat query saat mengambil foto per produk
            $table->index('product_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_images');
    }
};
