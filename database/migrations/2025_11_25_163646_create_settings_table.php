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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();   // contoh: store_name, store_logo, shipping_cost
            $table->text('value')->nullable(); // nilai bisa string, json, atau serialized
            $table->timestamps();

            $table->index('key'); // pencarian cepat
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
