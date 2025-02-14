<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('created_at', 'DESC')->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function details($orderId)
    {
        $order = Order::find($orderId);
        $orderProducts = $order->products;
//        return $orderProducts;
        return view('admin.orders.details', [
            'orderProducts' => $orderProducts,
        ]);
    }

    public function update(Request $request, $orderId)
    {
        $request->validate([
            'status' => 'required',
        ]);
        
        $order = Order::find($orderId);
        $order->update([
            'status' => $request->status,
        ]);
        return back()->with('success', 'Order status has been updated');
    }
}
