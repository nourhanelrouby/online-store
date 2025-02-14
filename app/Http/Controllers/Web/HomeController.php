<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::select('id', 'name', 'price', 'image', 'category_id')->paginate(8);
        $productsHasOffers = Product::whereNotNull('offer')->paginate(8);
        $blogs = Blog::all();
        return view('website.home', [
            'products' => $products,
            'productsHasOffers' => $productsHasOffers,
            'blogs' => $blogs
        ]);
    }
}
