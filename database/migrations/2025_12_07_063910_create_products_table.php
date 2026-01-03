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
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            // --- Relasi Utama ---
            $table->foreignId('store_id')
                ->constrained('stores')
                ->onDelete('cascade');
            $table->foreignId('category_id')
                ->constrained('categories')
                ->onDelete('cascade');

            // --- Informasi Dasar ---
            $table->string('name');
            $table->string('sku', 50)->unique()->index();
            $table->string('slug')->unique();
            $table->text('description');
            $table->enum('condition', ['new', 'second'])->default('new'); // Kondisi barang
            $table->integer('min_order')->default(1); // Minimal pembelian

            // --- Harga & Stok ---
            $table->decimal('price', 15, 2);          // Harga jual sekarang
            $table->decimal('original_price', 15, 2)->nullable(); // Untuk fitur harga coret/diskon
            $table->integer('stock')->default(0);

            // --- Logistik & Pengiriman (Penting untuk integrasi kurir) ---
            $table->integer('weight');                // Dalam Gram (Satuan standar API kurir)
            $table->integer('width')->nullable();     // Dalam CM (Untuk volume)
            $table->integer('height')->nullable();    // Dalam CM
            $table->integer('length')->nullable();    // Dalam CM

            // --- Media & Status ---
            $table->string('image')->nullable();      // Foto utama
            $table->boolean('is_active')->default(true);
            $table->boolean('is_featured')->default(false); // Untuk masuk ke "Produk Pilihan" di Home
            $table->boolean('is_best_seller')->default(false);

            // --- SEO & Statistik (Denormalisasi untuk performa cepat) ---
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->unsignedBigInteger('views_count')->default(0); // Total klik
            $table->unsignedInteger('sold_count')->default(0);  // Total terjual
            $table->decimal('rating_avg', 3, 2)->default(0);     // Contoh: 4.85
            $table->unsignedInteger('reviews_count')->default(0); // Total orang yang review

            $table->timestamps();

            // --- Indexing ---
            // Menambahkan index pada kolom yang sering digunakan di "WHERE" atau "ORDER BY"
            $table->index(['is_active', 'is_featured']);
            $table->index('price');
            $table->index('sold_count');
            $table->index('is_best_seller');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
