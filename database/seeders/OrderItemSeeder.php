<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orders   = Order::all();
        $products = Product::where('is_active', true)->inRandomOrder()->get();

        foreach ($orders as $order) {
            // Ambil 1-5 produk acak untuk setiap order
            $items = $products->random(rand(1, 5));

            $totalOrder = 0;

            foreach ($items as $product) {
                $qty   = rand(1, 5);
                $price = $product->price;

                $orderItem = OrderItem::create([
                    'order_id'   => $order->id,
                    'product_id' => $product->id,
                    'qty'        => $qty,
                    'price'      => $price,
                    // subtotal otomatis terisi karena saving event di model
                ]);

                $totalOrder += $orderItem->subtotal;
            }

            // Update total_price di tabel orders
            $order->update(['total_price' => $order->fresh()->orderItems->sum('subtotal')]);
        }
    }
}
