<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\BlogPostCategory;
use Illuminate\Http\Request;

class HomeBlogController extends Controller
{
    public function addBlogPost()
    {
        $blogcategory = BlogPostCategory::latest()->get();
        $blogpost = BlogPost::paginate(2);
        return view('frontend.blog.blog-list', compact('blogpost', 'blogcategory'));
    }

    public function detailsBlogPost($id)
    {
        $blogcategory = BlogPostCategory::latest()->get();
        $blogpost = BlogPost::findOrFail($id);
        return view('frontend.blog.blog-details', compact('blogpost', 'blogcategory'));
    }

    public function homeBlogCatPost($category_id)
    {
        $blogcategory = BlogPostCategory::latest()->get();
        $blogpost = BlogPost::where('category_id', $category_id)->orderBy('id', 'DESC')->get();
        return view('frontend.blog.blog-cat-list', compact('blogpost', 'blogcategory'));
    }
}
