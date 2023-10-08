@php
    $id = Auth::user()->id;
    $user = App\Models\User::find($id);
    $route = Route::current()->getName();
@endphp

<div class="col-md-2"><br><br>
    <img class="card-img-top" style="border-radius: 50%;" src="{{ (!empty($user->profile_photo_path)) ? url('upload/user-images/' . $user->profile_photo_path) : url('upload/no_image.jpg') }}" height="100%" width="100%"><br><br>
    <ul class="list-group list-group-flush">
        <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm btn-block {{ $route == 'dashboard' ? 'active' : '' }}">Chính</a>
        <a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block {{ $route == 'user.profile' ? 'active' : '' }}">Cập nhật thông tin</a>
        <a href="{{ route('change.password') }}" class="btn btn-primary btn-sm btn-block {{ $route == 'change.password' ? 'active' : '' }}">Đổi mật khẩu</a>
        <a href="{{ route('my.orders') }}" class="btn btn-primary btn-sm btn-block {{ $route == 'my.orders' ? 'active' : '' }}">Đơn đặt hàng</a>
        <a href="{{ route('return.order.list') }}" class="btn btn-primary btn-sm btn-block {{ $route == 'return.order.list' ? 'active' : '' }}">Trả hàng</a>
        <a href="{{ route('cancel.orders') }}" class="btn btn-primary btn-sm btn-block {{ $route == 'cancel.orders' ? 'active' : '' }}">Đơn hàng đã hủy</a>
        <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Đăng xuất</a>
    </ul>
</div> <!-- // end col md 2 -->