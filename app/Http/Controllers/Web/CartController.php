<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\product\CartStoreRequest;
use App\Models\Cart;
use App\Models\CartProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function cart(CartStoreRequest $request)
    {

        $user = Auth::guard('web')->user();
        $hasCart = $user->carts()->latest()->first();

        if ($hasCart == null || ($hasCart->opened == 1 && $hasCart->status == 1) ) {
            $hasCart = Cart::create([
                'user_id' => $user->id,
            ]);
        }

        $cartProduct = CartProduct::where('cart_id', $hasCart->id)
            ->where('product_id', $request->product_id)->first();
        if ($cartProduct != null) {
            if($cartProduct->is_deleted==1){
                $cartProduct->update([
                    'is_deleted' => 0
                ]);
                return back()->with('success', 'Product added to your cart.');
            }
            else{
                $cartProduct->update([
                    'is_deleted' => 1
                ]);
                return back()->with('success', 'Product removed from cart.');
            }
        }
        CartProduct::create([
            'product_id' => $request->product_id,
            'cart_id' => $hasCart->id
        ]);
        return back()->with('success', 'Product added to cart successfully.');
    }
    public function deleteCartProduct(Request $request)
    {
        $request->validate([
            'deletedProductId' => 'required',
        ]);

        $user = Auth::guard('web')->user();
        $hasCart = $user->carts()->latest()->first();

        $deletedProductId = $request->deletedProductId;
        CartProduct::where('cart_id', $hasCart->id)
            ->where('product_id', $deletedProductId)
            ->update([
                'is_deleted' => 1
            ]);
        return back()->with('success', 'Product removed from cart.');
    }

    public function cartProducts()
    {
        $user = Auth::guard('web')->user();
        $userCart = $user->carts()->latest()->first();
        if ($userCart && $userCart->opened == 0 && $userCart->status == 0) {
            $cartProducts = $userCart->products()->where('is_deleted', 0)->get();
            return view('website.cart.index', [
                'cartProducts' => $cartProducts,
                'cart' => $userCart
            ]);
        } else {
            return view('website.cart.index', [
                'cartProducts' => null,
                'cart' => null
            ]);
        }
    }
}
