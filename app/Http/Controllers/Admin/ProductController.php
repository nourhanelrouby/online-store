<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\product\ProductStoreRequest;
use App\Http\Requests\product\ProductUpdateRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();
        if($request->name != null){
            $query->where('name' ,$request->name);
        }
        if($request->category != null){
            $query->where('category_id' ,$request->category);
        }
        if($request->quantity !=null ){
            $query->where('quantity' , '<=',$request->quantity);
        }
        if( $request->status != null ){
                $query->where('status', '=', $request->status);
        }
        if( $request->offer != null ) {
            if ($request->offer == 0) {
                $query->whereNull('offer');
            } else {
                $query->where('offer', '=', $request->offer);
            }
        }
        $products = $query->paginate(10);
        $categories = Category::all();
        return view('admin.products.index', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }

    public function store(ProductStoreRequest $request)
    {
        $data = $request->except('image');
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $data['image'] = $imagePath;
        }
        Product::create($data);
        return back()->with('success', 'Product created successfully');
    }

    public function update(ProductUpdateRequest $request, $productId)
    {
        $product = Product::find($productId);
        $data = $request->except('image');
        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $imagePath = $request->file('image')->store('products', 'public');
            $data['image'] = $imagePath;
        }
        $product->update($data);
        return back()->with('success', 'Product updated successfully');
    }

    public function delete($productId)
    {
        $product = Product::find($productId);
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        $product->delete();
        return back()->with('success', 'Product deleted successfully');
    }
    public function reviews($productId)
    {
        $product = Product::find($productId);
        $productReviews = $product->reviews;
        return view('admin.products.review', [
            'productReviews' => $productReviews,
        ]);
    }
}
