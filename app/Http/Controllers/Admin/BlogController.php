<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\blog\BlogStoreRequest;
use App\Http\Requests\blog\BlogUpdateRequest;
use App\Models\Blog;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        return view('admin.blogs.index', [
            'blogs' => $blogs
        ]);
    }

    public function store(BlogStoreRequest $request)
    {
        $data = $request->except('image');
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('blog', 'public');
            $data['image'] = $imagePath;
        }
        Blog::create($data);
        return back()->with('success', 'Blog created successfully');
    }

    public function update(BlogUpdateRequest $request, $blogId)
    {
        $blog = Blog::find($blogId);
        $data = $request->except('image');
        if ($request->hasFile('image')) {
            if ($blog->image) {
                Storage::disk('public')->delete($blog->image);
            }
            $imagePath = $request->file('image')->store('blog', 'public');
            $data['image'] = $imagePath;
        }
        $blog->update($data);
        return back()->with('success', 'Blog updated successfully');
    }

    public function delete($blogId)
    {
        $blog = Blog::find($blogId);
        if ($blog->image) {
            Storage::disk('public')->delete($blog->image);
        }
        $blog->delete();
        return back()->with('success', 'Blog deleted successfully');
    }
}
