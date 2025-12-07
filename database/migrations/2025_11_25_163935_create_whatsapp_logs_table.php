<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('whatsapp_logs', function (Blueprint $table) {
            $table->id();

            $table->enum('direction', ['send', 'receive'])
                ->comment('send = dari kita ke customer, receive = dari customer ke kita');

            $table->string('phone', 20); // cukup untuk nomor +62 atau 08

            $table->text('message');

            $table->enum('status', ['success', 'failed'])
                ->default('success');

            $table->longText('raw_response')->nullable()
                ->comment('Response JSON dari WhatsApp Gateway');

            $table->timestamps();

            // Index untuk filtering cepat
            $table->index('direction');
            $table->index('phone');
            $table->index('status');
            $table->index('created_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('whatsapp_logs');
    }
};
