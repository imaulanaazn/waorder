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
        Schema::create('product_variants', function (Blueprint $table) {
            $table->id();

            // Relasi ke tabel produk utama
            $table->foreignId('product_id')
                ->constrained('products')
                ->onDelete('cascade');

            // Nama Varian (Contoh: "Warna", "Ukuran", "Rasa")
            $table->string('variant_name');

            // Nilai Varian (Contoh: "Hitam", "XL", "Cokelat")
            $table->string('variant_value');

            // Harga Spesifik Varian
            // Kadang ukuran XL lebih mahal dari S, jadi kita butuh kolom harga di sini
            $table->decimal('price', 15, 2)->nullable();

            // Stok Spesifik Varian
            // Penting: Stok dihitung per varian, bukan cuma per produk
            $table->integer('stock')->default(0);

            // SKU Spesifik Varian (Opsional, tapi profesional)
            // Memudahkan penjual melacak stok barang spesifik di gudang
            $table->string('sku')->unique()->nullable();

            // Foto Spesifik Varian
            // Contoh: Jika user klik varian warna "Merah", foto produk berubah jadi merah
            $table->string('image')->nullable();

            $table->timestamps();

            // Index untuk mempercepat pencarian varian berdasarkan produk
            $table->index('product_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_variants');
    }
};
