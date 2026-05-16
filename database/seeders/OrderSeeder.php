<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orders = [
            [
                'user_id' => 2,
                'status' => 'pending',
                'name' => 'Nguyen Phi Hue Chi',
                'phone' => '0901234567',
                'address' => 'Binh Thanh, Sai Gon',

                'items' => [
                    [
                        'product_id' => 1,
                        'quantity' => 2,
                    ],
                    [
                        'product_id' => 2,
                        'quantity' => 1,
                    ]
                ],
            ],
            [
                'user_id' => 2,
                'status' => 'completed',
                'name' => 'Tran Thi Binh',
                'phone' => '0912325478',
                'address' => 'District 1, Sai Gon',

                'items' => [
                    [
                        'product_id' => 3,
                        'quantity' => 1,
                    ],
                    [
                        'product_id' => 4,
                        'quantity' => 2,
                    ]
                ],
            ],
            [
                'user_id' => 2,
                'status' => 'cancelled',
                'name' => 'Le Van Cuong',
                'phone' => '0987654321',
                'address' => 'Thu Duc, Sai Gon',
                'items' => [
                    [
                        'product_id' => 10,
                        'quantity' => 3,
                    ],
                    [
                        'product_id' => 7,
                        'quantity' => 2,
                    ]
                ],
            ],
        ];

        foreach ($orders as $data) {

            $order = Order::create([
                'user_id' => $data['user_id'],
                'status' => $data['status'],
                'name' => $data['name'],
                'phone' => $data['phone'],
                'address' => $data['address'],
                'total' => 0,
            ]);

            $total = 0;

            foreach ($data['items'] as $item) {

                $product = Product::find($item['product_id']);

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'price' => $product->regular_price,
                ]);
                $total += $item['quantity'] * $product->regular_price;
            }
            $order->update([
                'total' => $total
            ]);
        }
    }
}
