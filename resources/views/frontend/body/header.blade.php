<header class="header-style-1">
    <div class="top-bar animate-dropdown">
        <div class="container">
            <div class="header-top-inner">
                <div class="cnt-account">
                    <ul class="list-unstyled">
                        <li><a href="{{ route('wishlist') }}"><i class="icon fa fa-heart"></i>Yêu thích</a></li>
                        <li><a href="{{ route('mycart') }}"><i class="icon fa fa-shopping-cart"></i>Giỏ hàng</a></li>
                        <li><a href="{{ route('checkout') }}"><i class="icon fa fa-check"></i>Thanh toán</a></li>
                        <li><a href="" type="button" data-toggle="modal" data-target="#ordertraking"><i
                                    class="icon fa fa-check"></i>Theo dõi đơn hàng</a></li>
                        <li>
                            @auth
                                <a href="{{ route('login') }}"><i class="icon fa fa-user"></i>Thông tin người dùng</a>
                            @else
                                <a href="{{ route('login') }}"><i class="icon fa fa-lock"></i>Đăng ký/Đăng nhập</a>
                            @endauth
                        </li>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="main-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
                    <div class="logo"> <a href="{{ url('/') }}"> <img src="frontend/assets/images/logo.png"
                                alt="logo"> </a> </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder">
                    <div class="search-area">
                        <form method="post" action="{{ route('product.search') }}">
                            @csrf
                            <div class="control-group">
                                <input class="search-field" onfocus="search_result_show()" onblur="search_result_hide()"
                                    id="search" name="search" placeholder="Tìm kiếm ở đây..." />
                                <button class="search-button" type="submit"></button>
                            </div>
                        </form>
                        <div id="searchProducts"></div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row">
                    <div class="dropdown dropdown-cart"> <a href="#" class="dropdown-toggle lnk-cart"
                            data-toggle="dropdown">
                            <div class="items-cart-inner">
                                <div class="basket">
                                    <i class="glyphicon glyphicon-shopping-cart"></i>
                                </div>
                                <div class="basket-item-count">
                                    <span class="count" id="cartQty"></span>
                                </div>
                                <div class="total-price-basket">
                                    <span class="lbl">Giỏ hàng -</span>
                                    <span class="total-price">
                                        <span class="value" id="cartSubTotal"></span>
                                        <span class="sign">₫</span>
                                    </span>
                                </div>
                            </div>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <!-- Mini Cart Start with Ajax -->
                                <div id="miniCart">
                                </div>
                                <!-- End Mini Cart Start with Ajax -->
                                <div class="clearfix"></div>
                                <hr>
                                <div class="clearfix cart-total">
                                    <div class="pull-right">
                                        <span class="text">Tổng cộng:</span>
                                        <span class="price" id="cartSubTotal"></span>
                                        <span class="price">₫</span>
                                    </div>
                                    <div class="clearfix"></div>
                                    <a href="{{ route('mycart') }}"
                                        class="btn btn-upper btn-primary btn-block m-t-20">Xem giỏ hàng</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-nav animate-dropdown">
        <div class="container">
            <div class="yamm navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse"
                        class="navbar-toggle collapsed" type="button">
                        <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span
                            class="icon-bar"></span> <span class="icon-bar"></span> </button>
                </div>
                <div class="nav-bg-class">
                    <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
                        <div class="nav-outer">
                            <ul class="nav navbar-nav">
                                <li>
                                    <a href="{{ url('/') }}">Trang chủ</a>
                                </li>
                                @php
                                    $categories = App\Models\Category::orderby('category_name', 'ASC')->get();
                                @endphp
                                @foreach ($categories as $category)
                                    <li class="dropdown yamm mega-menu"> <a href="#" data-hover="dropdown"
                                            class="dropdown-toggle"
                                            data-toggle="dropdown">{{ $category->category_name }}</a>
                                        <ul class="dropdown-menu container">
                                            <li>
                                                <div class="yamm-content ">
                                                    <div class="row">
                                                        @php
                                                            $subcategories = App\Models\SubCategory::where('category_id', $category->id)
                                                                ->orderby('subcategory_name', 'ASC')
                                                                ->get();
                                                        @endphp
                                                        @foreach ($subcategories as $subcategory)
                                                            <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                                                                <h2 class="title">
                                                                    <a
                                                                        href="{{ url('subcategory/product/' . $subcategory->id . '/' . $subcategory->subcategory_slug) }}">{{ $subcategory->subcategory_name }}</a>
                                                                </h2>
                                                                @php
                                                                    $subsubcategories = App\Models\SubSubCategory::where('subcategory_id', $subcategory->id)
                                                                        ->orderby('subsubcategory_name', 'ASC')
                                                                        ->get();
                                                                @endphp
                                                                @foreach ($subsubcategories as $subsubcategory)
                                                                    <ul class="links">
                                                                        <li><a
                                                                                href="{{ url('subsubcategory/product/' . $subsubcategory->id . '/' . $subsubcategory->subsubcategory_slug) }}">{{ $subsubcategory->subsubcategory_name }}</a>
                                                                        </li>
                                                                    </ul>
                                                                @endforeach
                                                            </div>
                                                        @endforeach
                                                        <div class="col-xs-12 col-sm-6 col-md-4 col-menu banner-image">
                                                            <img class="img-responsive"
                                                                src="frontend/assets/images/banners/top-menu-banner.jpg"
                                                                alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                @endforeach
                                <li class="dropdown  navbar-right special-menu"> <a href="#">Todays
                                        offer</a>
                                </li>
                                <li class="dropdown navbar-right special-menu"> <a
                                        href="{{ route('home.blog') }}">Blog</a> </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Order Traking Modal -->
    <div class="modal fade" id="ordertraking" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Theo dõi đơn hàng của bạn </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('order.tracking') }}">
                        @csrf
                        <div class="modal-body">
                            <label style="padding-bottom: 10px">Mã đơn hàng</label>
                            <input type="text" name="code" required="" class="form-control"
                                placeholder="Mã hóa đơn đặt hàng của bạn">
                        </div>
                        <button class="btn btn-danger" type="submit" style="margin-left: 17px;"> Tìm kiếm </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
