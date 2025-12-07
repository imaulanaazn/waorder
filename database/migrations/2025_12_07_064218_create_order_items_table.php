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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();

            $table->foreignId('order_id')
                ->constrained('orders')
                ->onDelete('cascade'); // jika order dihapus, item ikut hilang

            $table->foreignId('product_id')
                ->constrained('products')
                ->onDelete('restrict'); // produk tidak boleh dihapus jika ada order

            $table->unsignedInteger('qty');
            $table->decimal('price', 15, 2);        // harga satuan saat dibeli
            $table->decimal('subtotal', 15, 2);     // qty × price (bisa dihitung otomatis)

            // Optional: buat kolom subtotal otomatis (generated column) - MySQL 5.7+
            // $table->decimal('subtotal', 15, 2)->storedAs('qty * price');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
