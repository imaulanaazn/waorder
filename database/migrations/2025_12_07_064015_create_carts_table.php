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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();

            // Untuk guest: session_id browser
            // Untuk user login: user_id (nullable jika guest)
            $table->string('session_id', 100)->index();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');

            $table->unsignedInteger('qty')->default(1);

            $table->timestamps();

            // Unique constraint: satu produk hanya boleh 1x di cart (per session/user)
            $table->unique(['session_id', 'user_id']);

            // Index untuk performa
            $table->index('user_id');
            $table->index('created_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
