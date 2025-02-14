<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\category\CategoryStoreRequest;
use App\Http\Requests\category\CategoryUpdateRequest;
use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', [
            'categories' => $categories,
        ]);
    }

    public function store(CategoryStoreRequest $request)
    {
        Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'parent_id' => $request->parent_id,
        ]);
        return back()->with('success', 'Category created successfully');
    }

    public function update(CategoryUpdateRequest $request, $categoryId)
    {
        $category = Category::find($categoryId);
        $category->update(
            $request->all()
        );
        return back()->with('success', 'Category updated successfully');
    }

    public function delete($categoryId)
    {
        $category = Category::find($categoryId);
        $hasSubCategories = Category::where('parent_id', $categoryId)->count();
        if ($hasSubCategories > 0) {
            return back()->with('error', 'Category has subcategories!');
        } else {
            $hasProducts = Product::where('category_id',$categoryId)->count();
            if ($hasProducts > 0) {
                return back()->with('error', 'Category has products!');
            }
            $category->delete();
            return back()->with('success', 'Category deleted successfully');
        }
    }
}
