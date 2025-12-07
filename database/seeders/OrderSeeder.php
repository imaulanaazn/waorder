<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::inRandomOrder()->limit(10)->get();

        // Helper untuk generate invoice unik
        $generateInvoice = function () {
            $date = now()->format('Ymd');
            $last = Order::where('invoice', 'like', "INV-{$date}%")->count();
            return 'INV-' . $date . '-' . str_pad($last + 1, 4, '0', STR_PAD_LEFT);
        };

        // Order 1 - Confirmed
        $order1 = Order::create([
            'store_id'        => 1,
            'invoice'         => $generateInvoice(),
            'customer_name'   => 'Budi Santoso',
            'customer_phone'  => '081234567890',
            'customer_address' => 'Jl. Sudirman No.123, Jakarta Selatan',
            'customer_note'   => 'Tolong dibungkus rapi',
            'total_price'     => 0,
            'status'          => 'confirmed',
        ]);

        // Order 2 - Pending
        $order2 = Order::create([
            'store_id'        => 1,
            'invoice'         => $generateInvoice(),
            'customer_name'   => 'Siti Aisyah',
            'customer_phone'  => '085712345678',
            'customer_address' => 'Perumahan Bumi Asri Blok C/45, Bandung',
            'total_price'     => 0,
            'status'          => 'pending',
        ]);

        // Tambah item + hitung total
        foreach ([$order1, $order2] as $index => $order) {
            $total = 0;
            $items = $products->shuffle()->take(rand(2, 5));

            foreach ($items as $product) {
                $qty = rand(1, 3);
                $price = $product->price;
                $subtotal = $qty * $price;

                OrderItem::create([
                    'order_id'          => $order->id,
                    'product_id'        => $product->id,
                    'qty'          => $qty,
                    'price' => $price,
                ]);

                $total += $subtotal;
            }

            $order->update(['total_price' => $total]);
        }

        // Tambah 3 order acak lagi
        // Order::factory(3)->create()->each(function ($order) use ($products) {
        //     $total = 0;
        //     $items = $products->shuffle()->take(rand(1, 4));

        //     foreach ($items as $product) {
        //         $qty = rand(1, 3);
        //         $subtotal = $qty * $product->price;
        //         $total += $subtotal;

        //         OrderItem::create([
        //             'order_id'          => $order->id,
        //             'product_id'        => $product->id,
        //             'qty'          => $qty,
        //             'price' => $product->price,
        //         ]);
        //     }

        //     $order->total_price = $total;
        //     $order->save();
        // });
    }
}
