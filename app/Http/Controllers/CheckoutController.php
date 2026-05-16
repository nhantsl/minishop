<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\OrderService;

class CheckoutController extends Controller
{
    protected OrderService $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function index()
    {
        $cart = session('cart', []);

        $grandTotal = 0;

        foreach ($cart as $item) {
            $grandTotal += $item['price'] * $item['quantity'];
        }
        return view('checkout', compact('cart', 'grandTotal'));
    }

   public function store(Request $request, OrderService $orderService)
    {
        $request->validate([
            'phone'   => 'required',
            'address' => 'required',
        ]);

        $cart = session('cart', []);

        if (empty($cart)) {
            return back()->with('error', 'Cart is empty');
        }

        $grandTotal = 0;

        foreach ($cart as $item) {
            $grandTotal += $item['price'] * $item['quantity'];
        }

        $orderService->createOrder(
            $request->user(),
            $cart,
            [
                'phone'      => $request->phone,
                'address'    => $request->address,
                'grandtotal' => $grandTotal,
            ]
        );

        return redirect()
            ->route('dashboard')
            ->with('success', 'Order created successfully');
    }
}
