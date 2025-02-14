<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\product\CartStoreRequest;
use App\Http\Requests\product\FavoriteStoreRequest;
use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\Favorite;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function details($productId)
    {
        $product = Product::find($productId);
//        Use
//        {
//        $productCategoryId = $product->categoryId;
//        $category = Category::find($productCategoryId);
//        $relatedProducts = $category->products;
//    }
//        Or
        $relatedProducts = Product::where('category_id', $product->category_id)->get(['id', 'name', 'price', 'image']);

        $productReviews = $product->reviews;
        return view('website.products.details', [
            'product' => $product,
            'relatedProducts' => $relatedProducts,
            'productReviews' => $productReviews
        ]);
    }




}
