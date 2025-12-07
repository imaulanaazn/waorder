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
        Schema::create('stores', function (Blueprint $table) {
            $table->id();

            // Owner
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            // Store Info
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();

            // Branding
            $table->string('logo')->nullable();
            $table->string('banner')->nullable();

            // Contact Info
            $table->string('phone')->nullable();
            $table->string('email')->nullable();

            // Address
            $table->text('address')->nullable();
            $table->string('city')->nullable();
            $table->string('province')->nullable();
            $table->string('postal_code')->nullable();

            // Store Status
            $table->boolean('is_active')->default(true);
            $table->timestamp('verified_at')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stores');
    }
};
