<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $request->validate([
            'status' => 'required|in:' . implode(',', Order::getStatuses())
        ]);

        $order->update([
            'status' => $request->status
        ]);

        return back()->with('success', 'Updated!');
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);

        $order->delete();

        return back()->with('success', 'Order deleted!');
    }
}
