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
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Contoh: "Flash Sale Merdeka", "Promo Gajian"
            $table->string('slug')->unique();
            $table->text('description')->nullable();

            // Tipe diskon: percentage (10%) atau fixed (potongan Rp 50.000)
            $table->enum('type', ['percentage', 'fixed'])->default('percentage');
            $table->decimal('discount_value', 15, 2)->default(0);

            // Periode Promo
            $table->dateTime('start_date');
            $table->dateTime('end_date');

            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promotions');
    }
};
