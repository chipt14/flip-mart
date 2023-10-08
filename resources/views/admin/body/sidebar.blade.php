@php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();
@endphp

<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">
        <div class="user-profile">
            <div class="ulogo">
                <a href="index.html">
                    <!-- logo for regular state and mobile devices -->
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="backend/images/logo-dark.png" alt="">
                        <h3><b>Sunny</b> Admin</h3>
                    </div>
                </a>
            </div>
        </div>
        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="{{ $route == 'dashboard' ? 'active' : '' }}">
                <a href="{{ url('admin/dashboard') }}">
                    <i data-feather="pie-chart"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            @php
                $brand =
                    auth()
                        ->guard('admin')
                        ->user()->brand == 1;
                $category =
                    auth()
                        ->guard('admin')
                        ->user()->category == 1;
                $product =
                    auth()
                        ->guard('admin')
                        ->user()->product == 1;
                $slider =
                    auth()
                        ->guard('admin')
                        ->user()->slider == 1;
                $coupons =
                    auth()
                        ->guard('admin')
                        ->user()->coupons == 1;
                $shipping =
                    auth()
                        ->guard('admin')
                        ->user()->shipping == 1;
                $blog =
                    auth()
                        ->guard('admin')
                        ->user()->blog == 1;
                $setting =
                    auth()
                        ->guard('admin')
                        ->user()->setting == 1;
                $returnorder =
                    auth()
                        ->guard('admin')
                        ->user()->returnorder == 1;
                $review =
                    auth()
                        ->guard('admin')
                        ->user()->review == 1;
                $orders =
                    auth()
                        ->guard('admin')
                        ->user()->orders == 1;
                $stock =
                    auth()
                        ->guard('admin')
                        ->user()->stock == 1;
                $reports =
                    auth()
                        ->guard('admin')
                        ->user()->reports == 1;
                $alluser =
                    auth()
                        ->guard('admin')
                        ->user()->alluser == 1;
                $adminuserrole =
                    auth()
                        ->guard('admin')
                        ->user()->adminuserrole == 1;
            @endphp
            @if ($brand == true)
                <li class="treeview {{ $prefix == '/brand' ? 'active' : '' }}">
                    <a href="#">
                        <i data-feather="file"></i>
                        <span>Quản lý thương hiệu</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $route == 'all.brand' ? 'active' : '' }}">
                            <a href="{{ route('all.brand') }}"><i class="ti-more"></i>Thương hiệu</a>
                        </li>
                    </ul>
                </li>
            @else
            @endif
            @if ($category == true)
                <li class="treeview {{ $prefix == '/category' ? 'active' : '' }}">
                    <a href="#">
                        <i data-feather="file"></i> <span>Quản lý danh mục</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $route == 'all.category' ? 'active' : '' }}">
                            <a href="{{ route('all.category') }}"><i class="ti-more"></i>Danh mục</a>
                        </li>
                        <li class="{{ $route == 'all.subcategory' ? 'active' : '' }}">
                            <a href="{{ route('all.subcategory') }}"><i class="ti-more"></i>Danh mục nhỏ</a>
                        </li>
                        <li class="{{ $route == 'all.subsubcategory' ? 'active' : '' }}">
                            <a href="{{ route('all.subsubcategory') }}"><i class="ti-more"></i>Danh mục nhỏ hơn</a>
                        </li>
                    </ul>
                </li>
            @else
            @endif
            @if ($product == true)
                <li class="treeview {{ $prefix == '/product' ? 'active' : '' }}">
                    <a href="#">
                        <i data-feather="file"></i>
                        <span>Quản lý sản phẩm</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $route == 'product.add' ? 'active' : '' }}">
                            <a href="{{ route('product.add') }}"><i class="ti-more"></i>Thêm mới</a>
                        </li>
                        <li class="{{ $route == 'product.manage' ? 'active' : '' }}">
                            <a href="{{ route('product.manage') }}"><i class="ti-more"></i>Danh sách</a>
                        </li>
                    </ul>
                </li>
            @else
            @endif
            @if ($slider == true)
                <li class="treeview {{ $prefix == '/slider' ? 'active' : '' }}">
                    <a href="#">
                        <i data-feather="file"></i>
                        <span>Quản lý Slider</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $route == 'slider.manage' ? 'active' : '' }}">
                            <a href="{{ route('slider.manage') }}"><i class="ti-more"></i>Slider</a>
                        </li>
                    </ul>
                </li>
            @else
            @endif
            @if ($coupons == true)
                <li class="treeview {{ $prefix == '/coupons' ? 'active' : '' }}">
                    <a href="#">
                        <i data-feather="file"></i>
                        <span>Quản lý mã giảm giá</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $route == 'coupon.manage' ? 'active' : '' }}">
                            <a href="{{ route('coupon.manage') }}"><i class="ti-more"></i>Mã giảm giá</a>
                        </li>
                    </ul>
                </li>
            @else
            @endif
            @if ($shipping == true)
                <li class="treeview {{ $prefix == '/shipping' ? 'active' : '' }}">
                    <a href="#">
                        <i data-feather="file"></i>
                        <span>Khu vực vận chuyển</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $route == 'city.manage' ? 'active' : '' }}">
                            <a href="{{ route('city.manage') }}"><i class="ti-more"></i>Tỉnh/thành phố</a>
                        </li>
                        <li class="{{ $route == 'district.manage' ? 'active' : '' }}">
                            <a href="{{ route('district.manage') }}"><i class="ti-more"></i>Quận/huyện</a>
                        </li>
                        <li class="{{ $route == 'ward.manage' ? 'active' : '' }}">
                            <a href="{{ route('ward.manage') }}"><i class="ti-more"></i>Xã/phường</a>
                        </li>
                    </ul>
                </li>
            @else
            @endif
            @if ($blog == true)
                <li class="treeview {{ $prefix == '/blog' ? 'active' : '' }}  ">
                    <a href="#">
                        <i data-feather="file"></i>
                        <span>Quản lý blog</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $route == 'blog.category' ? 'active' : '' }}"><a
                                href="{{ route('blog.category') }}"><i class="ti-more"></i>Danh mục</a></li>
                        <li class="{{ $route == 'list.post' ? 'active' : '' }}"><a href="{{ route('list.post') }}"><i
                                    class="ti-more"></i>Danh sách</a></li>
                        <li class="{{ $route == 'add.post' ? 'active' : '' }}"><a href="{{ route('add.post') }}"><i
                                    class="ti-more"></i>Thêm mới</a></li>
                    </ul>
                </li>
            @else
            @endif
            @if ($returnorder == true)
                <li class="treeview {{ $prefix == '/return' ? 'active' : '' }}  ">
                    <a href="#">
                        <i data-feather="file"></i>
                        <span>Trả lại đơn hàng</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $route == 'return.request' ? 'active' : '' }}"><a
                                href="{{ route('return.request') }}"><i class="ti-more"></i>Yêu cầu trả lại</a></li>
                        <li class="{{ $route == 'all.request' ? 'active' : '' }}"><a
                                href="{{ route('all.request') }}"><i class="ti-more"></i>Yêu cầu đã duyệt</a></li>
                    </ul>
                </li>
            @else
            @endif
            @if ($review == true)
                <li class="treeview {{ $prefix == '/review' ? 'active' : '' }}  ">
                    <a href="#">
                        <i data-feather="file"></i>
                        <span>Đánh giá sản phẩm</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $route == 'pending.review' ? 'active' : '' }}">
                            <a href="{{ route('pending.review') }}">
                                <i class="ti-more"></i>Chờ duyệt
                            </a>
                        </li>
                        <li class="{{ $route == 'publish.review' ? 'active' : '' }}">
                            <a href="{{ route('publish.review') }}">
                                <i class="ti-more"></i>Đã duyệt
                            </a>
                        </li>
                    </ul>
                </li>
            @else
            @endif
            <li class="header nav-small-cap">Giao diện người dùng</li>
            @if ($orders == true)
                <li class="treeview {{ $prefix == '/orders' ? 'active' : '' }}">
                    <a href="#">
                        <i data-feather="file"></i>
                        <span>Đơn đặt hàng</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $route == 'pending-orders' ? 'active' : '' }}">
                            <a href="{{ route('pending-orders') }}"><i class="ti-more"></i>Chờ xác nhận</a>
                        </li>
                        <li class="{{ $route == 'confirmed-orders' ? 'active' : '' }}"><a
                                href="{{ route('confirmed-orders') }}"><i class="ti-more"></i>Xác nhận</a></li>

                        <li class="{{ $route == 'processing-orders' ? 'active' : '' }}"><a
                                href="{{ route('processing-orders') }}"><i class="ti-more"></i>Đang xử lý</a></li>

                        <li class="{{ $route == 'picked-orders' ? 'active' : '' }}"><a
                                href="{{ route('picked-orders') }}"><i class="ti-more"></i> Đóng hàng thành công</a>
                        </li>

                        <li class="{{ $route == 'shipped-orders' ? 'active' : '' }}"><a
                                href="{{ route('shipped-orders') }}"><i class="ti-more"></i> Đã vận chuyển</a></li>

                        <li class="{{ $route == 'delivered-orders' ? 'active' : '' }}"><a
                                href="{{ route('delivered-orders') }}"><i class="ti-more"></i> Đã giao hàng</a></li>

                        <li class="{{ $route == 'cancel-orders' ? 'active' : '' }}"><a
                                href="{{ route('cancel-orders') }}"><i class="ti-more"></i> Hủy đơn hàng</a></li>
                    </ul>
                </li>
            @else
            @endif
            @if ($stock == true)
                <li class="treeview {{ $prefix == '/stock' ? 'active' : '' }}  ">
                    <a href="#">
                        <i data-feather="file"></i>
                        <span>Quản lý kho </span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $route == 'product.stock' ? 'active' : '' }}">
                            <a href="{{ route('product.stock') }}">
                                <i class="ti-more"></i>Kho sản phẩm
                            </a>
                        </li>
                    </ul>
                </li>
            @else
            @endif
            @if ($reports == true)
                <li class="treeview {{ $prefix == '/reports' ? 'active' : '' }}">
                    <a href="#">
                        <i data-feather="file"></i>
                        <span>Báo cáo</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $route == 'all.reports' ? 'active' : '' }}"><a
                                href="{{ route('all.reports') }}"><i class="ti-more"></i>Báo cáo</a></li>
                    </ul>
                </li>
            @else
            @endif
            @if ($alluser == true)
                <li class="treeview {{ $prefix == '/alluser' ? 'active' : '' }}  ">
                    <a href="#">
                        <i data-feather="file"></i>
                        <span>Người dùng</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $route == 'all.users' ? 'active' : '' }}"><a
                                href="{{ route('all.users') }}"><i class="ti-more"></i>Tài khoản</a></li>
                    </ul>
                </li>
            @else
            @endif
            @if ($adminuserrole == true)
                <li class="treeview {{ $prefix == '/adminuserrole' ? 'active' : '' }}  ">
                    <a href="#">
                        <i data-feather="file"></i>
                        <span>Quản trị viên</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $route == 'all.admin.user' ? 'active' : '' }}">
                            <a href="{{ route('all.admin.user') }}">
                                <i class="ti-more"></i>Tài khoản
                            </a>
                        </li>
                    </ul>
                </li>
            @else
            @endif
        </ul>
    </section>
    <div class="sidebar-footer">
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title=""
            data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
        <!-- item-->
        <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title=""
            data-original-title="Email"><i class="ti-email"></i></a>
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title=""
            data-original-title="Logout"><i class="ti-lock"></i></a>
    </div>
</aside>
