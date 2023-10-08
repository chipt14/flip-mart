<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class AdminUserController extends Controller
{
    public function allAdminRole()
    {
        $adminuser = Admin::where('type', 2)->latest()->get();
        return view('backend.role.admin-role-all', compact('adminuser'));
    }

    public function addAdminRole()
    {
        return view('backend.role.admin-role-create');
    }

    public function storeAdminRole(Request $request)
    {
        $image = $request->file('profile_photo_path');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(225, 225)->save('upload/admin-images/' . $name_gen);
        $save_url = 'upload/admin-images/' . $name_gen;

        Admin::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'brand' => $request->brand,
            'category' => $request->category,
            'product' => $request->product,
            'slider' => $request->slider,
            'coupons' => $request->coupons,
            'shipping' => $request->shipping,
            'blog' => $request->blog,
            'setting' => $request->setting,
            'returnorder' => $request->returnorder,
            'review' => $request->review,
            'orders' => $request->orders,
            'stock' => $request->stock,
            'reports' => $request->reports,
            'alluser' => $request->alluser,
            'adminuserrole' => $request->adminuserrole,
            'type' => 2,
            'profile_photo_path' => $save_url,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Tạo thành công',
            'alert-type' => 'success'
        );

        return redirect()->route('all.admin.user')->with($notification);
    }

    public function editAdminRole($id)
    {
        $adminuser = Admin::findOrFail($id);
        return view('backend.role.admin-role-edit', compact('adminuser'));
    }

    public function updateAdminRole(Request $request)
    {
        $admin_id = $request->id;
        $old_img = $request->old_image;

        if ($request->file('profile_photo_path')) {
            unlink($old_img);
            $image = $request->file('profile_photo_path');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(225, 225)->save('upload/admin-images/' . $name_gen);
            $save_url = 'upload/admin-images/' . $name_gen;

            Admin::findOrFail($admin_id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'brand' => $request->brand,
                'category' => $request->category,
                'product' => $request->product,
                'slider' => $request->slider,
                'coupons' => $request->coupons,
                'shipping' => $request->shipping,
                'blog' => $request->blog,
                'setting' => $request->setting,
                'returnorder' => $request->returnorder,
                'review' => $request->review,
                'orders' => $request->orders,
                'stock' => $request->stock,
                'reports' => $request->reports,
                'alluser' => $request->alluser,
                'adminuserrole' => $request->adminuserrole,
                'type' => 2,
                'profile_photo_path' => $save_url,
                'created_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Cập nhật thành công',
                'alert-type' => 'info'
            );

            return redirect()->route('all.admin.user')->with($notification);

        } else {
            Admin::findOrFail($admin_id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'brand' => $request->brand,
                'category' => $request->category,
                'product' => $request->product,
                'slider' => $request->slider,
                'coupons' => $request->coupons,
                'shipping' => $request->shipping,
                'blog' => $request->blog,
                'setting' => $request->setting,
                'returnorder' => $request->returnorder,
                'review' => $request->review,
                'orders' => $request->orders,
                'stock' => $request->stock,
                'reports' => $request->reports,
                'alluser' => $request->alluser,
                'adminuserrole' => $request->adminuserrole,
                'type' => 2,
                'created_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Cập nhật thành công',
                'alert-type' => 'info'
            );

            return redirect()->route('all.admin.user')->with($notification);
        }
    }

    public function deleteAdminRole($id)
    {
        $adminimg = Admin::findOrFail($id);
        $img = $adminimg->profile_photo_path;
        unlink($img);

        Admin::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Xóa thành công',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }
}
