<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\product\OrderConfirmRequest;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function confirm(OrderConfirmRequest $request)
    {
        $user = Auth::guard('web')->user();
        $hasCart = $user->carts()->latest()->first();
        if (!$hasCart || $hasCart->products->isEmpty()) {
            return back()->with('error', 'Cart is empty');
        }

        $totalPrice = 0;

        foreach ($request->products as $details) {

//            Total Price
            $product = Product::find($details['product_id']);
            if ($product->offer == null) {
                $finalPrice = $product->price;
            } else {
                $finalPrice = $product->new_price;
            }
            $totalPrice += $finalPrice * $details['qty'];
        }
//        Order

        $order = Order::create([
            'status' => 0,
            'total_price' => $totalPrice,
            'user_id' => $user->id,
            'cart_id' => $hasCart->id,
        ]);
        foreach ($request->products as $details) {
            $product = Product::find($details['product_id']);

            if ($product->offer == null) {
                $finalPrice = $product->price;
            } else {
                $finalPrice = $product->new_price;
            }
            OrderDetails::create([
                'quantity' => $details['qty'],
                'order_id' => $order->id,
                'total_price' => $finalPrice * $details['qty'],
                'product_id' => $details['product_id'],
            ]);
        }
        $hasCart->update([
            'status' => 1,
            'opened' => 1,
        ]);
        return back()->with('success', 'Order confirmed successfully.');
    }
}

