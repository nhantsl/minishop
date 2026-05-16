<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;


class AdminController extends Controller
{
    public function index()
        {
            $orders = Order::with('user')->latest()->paginate(10);
            $users = User::all();
            $products = Product::paginate(10, ['*'], 'products_page');
            return view('admin', compact('orders' , 'users', 'products'));
        }

}
