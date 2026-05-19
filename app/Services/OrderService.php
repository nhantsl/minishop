<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class OrderService
{
    public function createOrder(User $user,array $cart, array $data)
    {
        return DB::transaction(function () use ($user, $cart, $data) {

        $order = $user->orders()->create([
            'phone'   => $data['phone'],
            'address' => $data['address'],
            'total'   => $data['grandtotal'],
        ]);

        foreach ($cart as $productId => $item) {

            $order->items()->create([
                'product_id' => $productId,
                'quantity'   => $item['quantity'],
                'price'      => $item['price'],
            ]);
        }

        session()->forget('cart');

        return $order;
        });
    }
}
