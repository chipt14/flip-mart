<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function reviewStore(Request $request)
    {
        $product = $request->product_id;
        $request->validate([
            'summary' => 'required',
            'comment' => 'required',
        ]);
        Review::insert([
            'product_id' => $product,
            'user_id' => Auth::id(),
            'comment' => $request->comment,
            'summary' => $request->summary,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Đánh giá sẽ được phê duyệt bởi quản trị viên',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function pendingReview()
    {
        $review = Review::where('status', 0)->orderBy('id', 'DESC')->get();
        return view('backend.review.pending-review', compact('review'));
    }

    public function reviewApprove($id)
    {
        Review::where('id', $id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Đánh giá được phê duyệt thành công',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function publishReview()
    {
        $review = Review::where('status', 1)->orderBy('id', 'DESC')->get();
        return view('backend.review.publish-review', compact('review'));
    }

    public function deleteReview($id)
    {
        Review::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Xóa thành công đánh giá',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
