<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::paginate(5);
        return view('website.blog.index', compact('blogs'));
    }

    public function details($blogId)
    {
        $blog = Blog::find($blogId);
        return view('website.blog.details', compact('blog'));
    }
}
