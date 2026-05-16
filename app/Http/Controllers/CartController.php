<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    // 🟢 ADD TO CART
    public function add(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $product = Product::findOrFail($request->id);
        $price = $product->regular_price;

        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += $request->quantity;
        } else {
            $cart[$product->id] = [
                "name" => $product->name,
                "price" => $price,
                "quantity" => $request->quantity,
                "image" => $product->image ?? null,
            ];
        }

        session()->put('cart', $cart);

        return back()->with('success', 'Added to cart');
    }

    // 🟡 VIEW CART
    public function index()
    {
        $cart = session()->get('cart', []);
        $products = \App\Models\Product::whereIn('id', array_keys($cart))
        ->get()
        ->keyBy('id');
        return view('cart', compact('cart', 'products'));
    }

    // 🔵 UPDATE QUANTITY
    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'quantity' => 'required|integer|min:1'
        ]);

        $cart = session()->get('cart', []);

        if (isset($cart[$request->id])) {
            $cart[$request->id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
        }

        return back()->with('success', 'Cart updated');
    }

    // 🔴 REMOVE ITEM
    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return back()->with('success', 'Item removed');
    }

    // 🧹 CLEAR CART
    public function clear()
    {
        session()->forget('cart');

        return back()->with('success', 'Cart cleared');
    }

}
