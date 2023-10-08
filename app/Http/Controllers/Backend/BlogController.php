<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\BlogPostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Intervention\Image\ImageManagerStatic as Image;

class BlogController extends Controller
{
    public function blogCategory()
    {
        $blogcategory = BlogPostCategory::latest()->get();
        return view('backend.blog.category.category-view', compact('blogcategory'));
    }

    public function blogCategoryStore(Request $request)
    {
        $request->validate([
            'blog_category_name' => 'required',
        ], [
            'blog_category_name.required' => 'Phải nhập tên',
        ]);

        BlogPostCategory::insert([
            'blog_category_name' => mb_convert_case($request->blog_category_name, MB_CASE_UPPER, "UTF-8"),
            'blog_category_slug' => strtolower(str_replace(' ', '-', $request->blog_category_name)),
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Thêm mới thành công',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function blogCategoryEdit($id)
    {
        $blogcategory = BlogPostCategory::findOrFail($id);
        return view('backend.blog.category.category-edit', compact('blogcategory'));
    }

    public function blogCategoryUpdate(Request $request)
    {
        $blogcar_id = $request->id;

        BlogPostCategory::findOrFail($blogcar_id)->update([
            'blog_category_name' => mb_convert_case($request->blog_category_name, MB_CASE_UPPER, "UTF-8"),
            'blog_category_slug' => strtolower(str_replace(' ', '-', $request->blog_category_name)),
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Cập nhật thành công',
            'alert-type' => 'info'
        );

        return redirect()->route('blog.category')->with($notification);
    }

    public function listBlogPost()
    {
        $blogpost = BlogPost::with('category')->latest()->get();
        return view('backend.blog.post.post-list', compact('blogpost'));
    }

    public function addBlogPost()
    {
        $blogcategory = BlogPostCategory::latest()->get();
        $blogpost = BlogPost::latest()->get();
        return view('backend.blog.post.post-view', compact('blogpost', 'blogcategory'));
    }

    public function BlogPostStore(Request $request)
    {
        $request->validate([
            'post_title' => 'required',
            'post_image' => 'required',
        ], [
            'post_title.required' => 'Phải nhập tên',
            'post_image.required' => 'Phải chọn ảnh',
        ]);

        $image = $request->file('post_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(780, 433)->save('upload/post/' . $name_gen);
        $save_url = 'upload/post/' . $name_gen;

        BlogPost::insert([
            'category_id' => $request->category_id,
            'post_title' => $request->post_title,
            'post_slug' => strtolower(str_replace(' ', '-', $request->post_title)),
            'post_image' => $save_url,
            'post_details' => $request->post_details,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Thêm mới thành công',
            'alert-type' => 'success'
        );

        return redirect()->route('list.post')->with($notification);
    }
}
