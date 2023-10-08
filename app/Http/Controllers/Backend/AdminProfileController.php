<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminProfileController extends Controller
{

    public function adminProfile()
    {
        $id = Auth::user()->id;
		$adminData = Admin::find($id);
        return view('admin.admin-profile-view', compact('adminData'));
    }

    public function adminProfileEdit()
    {
        $id = Auth::user()->id;
		$editData = Admin::find($id);
        return view('admin.admin-profile-edit', compact('editData'));
    }

    public function adminProfileStore(Request $request)
    {
        $id = Auth::user()->id;
		$data = Admin::find($id);
        $data->name = $request->name;
        $data->email = $request->email;

        if ($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            unlink(public_path('upload/admin-images/' . $data->profile_photo_path));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin-images'), $filename);
            $data['profile_photo_path'] = $filename;
        }
        $data->save();

        $notification = [
            'message' => 'Cập nhật thành công!',
            'alert-type' => 'success'
        ];

        return redirect()->route('admin.profile')->with($notification);
    }

    public function adminChangePassword()
    {
        return view('admin.admin-change-password');
    }

    public function adminUpdateChangePassword(Request $request)
    {
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required | confirmed',
        ]);

        $hashedPassword = Auth::user()->password;

        if (Hash::check($request->oldpassword, $hashedPassword)) {
            $admin = Admin::find(Auth::id());
            $admin->password = Hash::make($request->password);
            $admin->save();
            Auth::logout();
            return redirect()->route('admin.logout');
        }else{
            return redirect()->back();
        }
    }

    public function allUsers()
    {
		$users = User::latest()->get();
		return view('backend.user.all-user',compact('users'));
	}
}