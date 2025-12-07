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
            $table->foreignId('store_id')
                ->constrained('stores')
                ->onDelete('cascade'); // jika toko dihapus, produk ikut hilang (bisa diganti set null)
            $table->foreignId('category_id')
                ->constrained('categories')
                ->onDelete('cascade'); // jika kategori dihapus, produk ikut hilang (bisa diganti set null)
            $table->string('name');
            $table->string('slug')->unique();
            $table->decimal('price', 15, 2);        // misal: 9999999999999.99
            $table->integer('stock')->nullable();   // boleh null jika tidak pakai stok
            $table->text('description');
            $table->string('image')->nullable();    // path atau URL gambar
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            // Index tambahan untuk pencarian cepat
            $table->index('is_active');
            $table->index('price');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
