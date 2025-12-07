<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Cart untuk guest (session_id)

        $guestSession = 'guest_session_' . fake()->uuid;
        Cart::create([
            'session_id' => $guestSession,
            'user_id'    => null,
            'qty'        => 0,
        ]);

        // 2. Cart untuk user yang sudah login
        $user = User::first() ?? User::factory()->create();

        Cart::create([
            'session_id' => 'user_session_' . $user->id,
            'user_id'    => $user->id,
            'qty'        => 0,
        ]);
    }
}
