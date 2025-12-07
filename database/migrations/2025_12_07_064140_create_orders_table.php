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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('invoice')->unique(); // contoh: INV-20251125-0001
            $table->string('store_id');
            $table->foreignId('customer_id')->nullable()->constrained('users');
            $table->string('customer_name');
            $table->string('customer_phone');
            $table->text('customer_address');
            $table->text('customer_note')->nullable();
            $table->decimal('total_price', 15, 2)->default(0);

            $table->enum('status', [
                'pending',      // menunggu pembayaran/konfirmasi
                'confirmed',    // sudah dibayar
                'processing',   // sedang diproses/dikemas
                'shipped',      // sudah dikirim
                'done',         // selesai
                'cancelled'     // dibatalkan
            ])->default('pending');

            $table->timestamps();

            // Index untuk pencarian cepat
            $table->index('invoice');
            $table->index('status');
            $table->index('store_id');
            $table->index('customer_id');
            $table->index('created_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
