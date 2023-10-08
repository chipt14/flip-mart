@extends('frontend.main-master')
@section('content')
@section('title')
    Home Flipmart
@endsection

<div class="body-content outer-top-xs" id="top-banner-and-menu">
    <div class="container">
        <div class="row">
            <!-- ============================================== SIDEBAR ============================================== -->
            <div class="col-xs-12 col-sm-12 col-md-3 sidebar">
                <!-- ================================== TOP NAVIGATION ================================== -->
                @include('frontend.common.vertical-menu')
                <!-- ================================== TOP NAVIGATION : END ================================== -->
                <!-- ============================================== HOT DEALS ============================================== -->
                @include('frontend.common.hot-deals')
                <!-- ============================================== HOT DEALS: END ============================================== -->
                <!-- ============================================== featured ============================================== -->
                <div class="sidebar-widget outer-bottom-small wow fadeInUp">
                    <h3 class="section-title">Đặc biệt</h3>
                    <div class="sidebar-widget-body outer-top-xs">
                        <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
                            <div class="item">
                                <div class="products special-product">
                                    @foreach ($featured as $product)
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image">
                                                                <a
                                                                    href="{{ url('product/details/' . $product->id . '/' . $product->product_slug) }}">
                                                                    <img src="{{ $product->product_thambnail }}">
                                                                </a>
                                                            </div>
                                                            <!-- /.image -->
                                                        </div>
                                                        <!-- /.product-image -->
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name"><a
                                                                    href="{{ url('product/details/' . $product->id . '/' . $product->product_slug) }}">{{ $product->product_name }}</a>
                                                            </h3>
                                                            {{-- <div class="rating rateit-small"></div> --}}
                                                            <div class="product-price">
                                                                <span
                                                                    class="price">{{ number_format($product->selling_price) }}₫</span>
                                                            </div>
                                                            <!-- /.product-price -->
                                                        </div>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.product-micro-row -->
                                            </div>
                                            <!-- /.product-micro -->
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.sidebar-widget-body -->
                </div>
                <!-- /.sidebar-widget -->
                <!-- ============================================== SPECIAL OFFER : END ============================================== -->
                <!-- ============================================== PRODUCT TAGS ============================================== -->
                @include('frontend.common.product-tags')
                <!-- ============================================== PRODUCT TAGS : END ============================================== -->
                <!-- ============================================== SPECIAL DEALS : END ============================================== -->
                <!-- ============================================== Testimonials============================================== -->
                <div class="sidebar-widget  wow fadeInUp outer-top-vs ">
                    <div id="advertisement" class="advertisement">
                        <div class="item">
                            <div class="avatar"><img src="frontend/assets/images/testimonials/member1.png"
                                    alt="Image"></div>
                            <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis.
                                Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                            <div class="clients_author">John Doe <span>Abc Company</span> </div>
                            <!-- /.container-fluid -->
                        </div>
                        <!-- /.item -->
                        <div class="item">
                            <div class="avatar"><img src="frontend/assets/images/testimonials/member3.png"
                                    alt="Image"></div>
                            <div class="testimonials"><em>"</em>Vtae sodales aliq uam morbi non sem lacus port mollis.
                                Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                            <div class="clients_author">Stephen Doe <span>Xperia Designs</span> </div>
                        </div>
                        <!-- /.item -->
                        <div class="item">
                            <div class="avatar"><img src="frontend/assets/images/testimonials/member2.png"
                                    alt="Image"></div>
                            <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis.
                                Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                            <div class="clients_author">Saraha Smith <span>Datsun &amp; Co</span> </div>
                            <!-- /.container-fluid -->
                        </div>
                        <!-- /.item -->
                    </div>
                    <!-- /.owl-carousel -->
                </div>
                <!-- ============================================== Testimonials: END ============================================== -->
                <div class="home-banner"> <img src="frontend/assets/images/banners/LHS-banner.jpg" alt="Image">
                </div>
            </div>
            <!-- /.sidemenu-holder -->
            <!-- ============================================== SIDEBAR : END ============================================== -->
            <!-- ============================================== CONTENT ============================================== -->
            <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
                <!-- ========================================== SECTION – HERO ========================================= -->
                <div id="hero">
                    <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
                        @foreach ($sliders as $slider)
                            <div class="item" style="background-image: url({{ $slider->slider_img }});">
                                <div class="container-fluid">
                                    <div class="caption bg-color vertical-center text-left">
                                        <div class="big-text fadeInDown-1"> {{ $slider->title }} </div>
                                        <div class="excerpt fadeInDown-2 hidden-xs">
                                            <span>{{ $slider->description }}</span>
                                        </div>
                                        <div class="button-holder fadeInDown-3"> <a href="index.php?page=single-product"
                                                class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop
                                                Now</a> </div>
                                    </div>
                                    <!-- /.caption -->
                                </div>
                                <!-- /.container-fluid -->
                            </div>
                            <!-- /.item -->
                        @endforeach
                    </div>
                    <!-- /.owl-carousel -->
                </div>

                <!-- ========================================= SECTION – HERO : END ========================================= -->

                <!-- ============================================== INFO BOXES ============================================== -->
                <div class="info-boxes wow fadeInUp">
                    <div class="info-boxes-inner">
                        <div class="row">
                            <div class="col-md-6 col-sm-4 col-lg-4">
                                <div class="info-box">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <h4 class="info-box-heading green">Giao hàng miễn phí</h4>
                                        </div>
                                    </div>
                                    <h6 class="text">3Miễn phí giao hàng cho tất cả đơn hàng mua tại shop</h6>
                                </div>
                            </div>
                            <!-- .col -->

                            <div class="hidden-md col-sm-4 col-lg-4">
                                <div class="info-box">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <h4 class="info-box-heading green">7 ngày đổi trả</h4>
                                        </div>
                                    </div>
                                    <h6 class="text">Với 7 ngày đầu tiên bạn có thể đổi trả cho cửa hàng</h6>
                                </div>
                            </div>
                            <!-- .col -->

                            <div class="col-md-6 col-sm-4 col-lg-4">
                                <div class="info-box">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <h4 class="info-box-heading green">Thời gian mở cửa</h4>
                                        </div>
                                    </div>
                                    <h6 class="text">Mở cửa từ thứ 2 - 7 / 8h-22h</h6>
                                </div>
                            </div>
                            <!-- .col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.info-boxes-inner -->

                </div>
                <!-- /.info-boxes -->
                <!-- ============================================== INFO BOXES : END ============================================== -->
                <!-- ============================================== SCROLL TABS ============================================== -->
                <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
                    <div class="more-info-tab clearfix ">
                        <h3 class="new-product-title pull-left">sản phẩm</h3>
                        <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
                            <li class="active"><a data-transition-type="backSlide" href="#all" data-toggle="tab">Tất
                                    cả</a></li>
                            @foreach ($categories as $category)
                                <li><a data-transition-type="backSlide" href="#category{{ $category->id }}"
                                        data-toggle="tab">{{ $category->category_name }}</a></li>
                            @endforeach
                        </ul>
                        <!-- /.nav-tabs -->
                    </div>
                    <div class="tab-content outer-top-xs">

                        <div class="tab-pane in active" id="all">
                            <div class="product-slider">
                                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                                    @foreach ($products as $product)
                                        <div class="item item-carousel">
                                            <div class="products">
                                                <div class="product">
                                                    <div class="product-image">
                                                        <div class="image"> <a
                                                                href="{{ url('product/details/' . $product->id . '/' . $product->product_slug) }}"><img
                                                                    src="{{ $product->product_thambnail }}"
                                                                    alt=""></a> </div>
                                                        <!-- /.image -->
                                                        @php
                                                            $amount = intval($product->selling_price) - intval($product->discount_price);
                                                            $discount = ($amount / intval($product->selling_price)) * 100;
                                                        @endphp

                                                        <div>
                                                            @if ($product->product_new == 1)
                                                                <div class="tag new"><span>new</span></div>
                                                            @elseif (!empty($product->discount_price))
                                                                <div class="tag hot">
                                                                    <span>{{ round($discount) }}%</span>
                                                                </div>
                                                            @else
                                                            @endif
                                                        </div>

                                                    </div>
                                                    <!-- /.product-image -->

                                                    <div class="product-info text-left">
                                                        <h3 class="name"><a
                                                                href="{{ url('product/details/' . $product->id . '/' . $product->product_slug) }}">{{ $product->product_name }}</a>
                                                        </h3>
                                                        {{-- <div class="rating rateit-small"></div> --}}
                                                        <div class="description"></div>
                                                        @if ($product->discount_price == null)
                                                            <div class="product-price">
                                                                <span
                                                                    class="price">{{ number_format($product->selling_price) }}₫</span>
                                                            </div>
                                                        @else
                                                            <div class="product-price">
                                                                <span class="price">
                                                                    {{ number_format($product->discount_price) }}₫
                                                                </span>
                                                                <span class="price-before-discount">
                                                                    {{ number_format($product->selling_price) }}₫</span>
                                                            </div>
                                                        @endif
                                                        <!-- /.product-price -->

                                                    </div>
                                                    <!-- /.product-info -->
                                                    <div class="cart clearfix animate-effect">
                                                        <div class="action">
                                                            <ul class="list-unstyled">
                                                                <li class="add-cart-button btn-group">
                                                                    <button class="btn btn-primary icon"
                                                                        type="button" title="Thêm giỏ"
                                                                        data-toggle="modal"
                                                                        data-target="#exampleModal"
                                                                        id="{{ $product->id }}"
                                                                        onclick="productView(this.id)"> <i
                                                                            class="fa fa-shopping-cart"></i> </button>
                                                                    <button class="btn btn-primary cart-btn"
                                                                        type="button">Thêm vào giỏ</button>
                                                                </li>
                                                                <button class="btn btn-primary icon" type="button"
                                                                    title="Yêu thích" id="{{ $product->id }}"
                                                                    onclick="addToWishList(this.id)"> <i
                                                                        class="fa fa-heart"></i> </button>
                                                                <li class="lnk"> <a data-toggle="tooltip"
                                                                        class="add-to-cart" href="detail.html"
                                                                        title="So sánh"> <i class="fa fa-signal"
                                                                            aria-hidden="true"></i> </a> </li>
                                                            </ul>
                                                        </div>
                                                        <!-- /.action -->
                                                    </div>
                                                    <!-- /.cart -->
                                                </div>
                                                <!-- /.product -->
                                            </div>
                                            <!-- /.products -->
                                        </div>
                                        <!-- /.item -->
                                    @endforeach
                                </div>
                                <!-- /.home-owl-carousel -->
                            </div>
                            <!-- /.product-slider -->
                        </div>
                        <!-- /.tab-pane -->
                        @foreach ($categories as $category)
                            <div class="tab-pane" id="category{{ $category->id }}">
                                <div class="product-slider">
                                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme"
                                        data-item="4">
                                        @php
                                            $catwiseProduct = App\Models\Product::where('category_id', $category->id)
                                                ->orderBy('id', 'DESC')
                                                ->get();
                                        @endphp

                                        @forelse($catwiseProduct as $product)
                                            <div class="item item-carousel">
                                                <div class="products">
                                                    <div class="product">
                                                        <div class="product-image">
                                                            <div class="image"> <a
                                                                    href="{{ url('product/details/' . $product->id . '/' . $product->product_slug) }}"><img
                                                                        src="{{ $product->product_thambnail }}"
                                                                        alt=""></a> </div>
                                                            <!-- /.image -->
                                                            @php
                                                                $amount = intval($product->selling_price) - intval($product->discount_price);
                                                                $discount = ($amount / intval($product->selling_price)) * 100;
                                                            @endphp

                                                            <div>
                                                                @if ($product->product_new == 1)
                                                                    <div class="tag new"><span>new</span></div>
                                                                @elseif (!empty($product->discount_price))
                                                                    <div class="tag hot">
                                                                        <span>{{ round($discount) }}%</span>
                                                                    </div>
                                                                @else
                                                                @endif
                                                            </div>

                                                        </div>
                                                        <!-- /.product-image -->

                                                        <div class="product-info text-left">
                                                            <h3 class="name"><a
                                                                    href="">{{ $product->product_name }}</a>
                                                            </h3>
                                                            {{-- <div class="rating rateit-small"></div> --}}
                                                            <div class="description"></div>
                                                            @if ($product->discount_price == null)
                                                                <div class="product-price">
                                                                    <span
                                                                        class="price">{{ number_format($product->selling_price) }}₫</span>
                                                                </div>
                                                            @else
                                                                <div class="product-price">
                                                                    <span class="price">
                                                                        {{ number_format($product->discount_price) }}₫
                                                                    </span>
                                                                    <span class="price-before-discount">
                                                                        {{ number_format($product->selling_price) }}₫</span>
                                                                </div>
                                                            @endif
                                                            <!-- /.product-price -->

                                                        </div>
                                                        <!-- /.product-info -->
                                                        <div class="cart clearfix animate-effect">
                                                            <div class="action">
                                                                <ul class="list-unstyled">
                                                                    <li class="add-cart-button btn-group">
                                                                        <button class="btn btn-primary icon"
                                                                            type="button" title="Add Cart"
                                                                            data-toggle="modal"
                                                                            data-target="#exampleModal"
                                                                            id="{{ $product->id }}"
                                                                            onclick="productView(this.id)"> <i
                                                                                class="fa fa-shopping-cart"></i>
                                                                        </button>
                                                                        <button class="btn btn-primary cart-btn"
                                                                            type="button">Add to cart</button>
                                                                    </li>
                                                                    <button class="btn btn-primary icon"
                                                                        type="button" title="Wishlist"
                                                                        id="{{ $product->id }}"
                                                                        onclick="addToWishList(this.id)"> <i
                                                                            class="fa fa-heart"></i> </button>
                                                                    <li class="lnk"> <a data-toggle="tooltip"
                                                                            class="add-to-cart" href="detail.html"
                                                                            title="Compare"> <i class="fa fa-signal"
                                                                                aria-hidden="true"></i> </a> </li>
                                                                </ul>
                                                            </div>
                                                            <!-- /.action -->
                                                        </div>
                                                        <!-- /.cart -->
                                                    </div>
                                                    <!-- /.product -->
                                                </div>
                                                <!-- /.products -->
                                            </div>
                                            <!-- /.item -->
                                        @empty
                                            <h5 class="text-danger">No Product Found</h5>
                                        @endforelse
                                    </div>
                                    <!-- /.home-owl-carousel -->
                                </div>
                                <!-- /.product-slider -->
                            </div>
                            <!-- /.tab-pane -->
                        @endforeach
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.scroll-tabs -->
                <!-- ============================================== SCROLL TABS : END ============================================== -->
                <!-- ============================================== WIDE PRODUCTS ============================================== -->
                <div class="wide-banners wow fadeInUp outer-bottom-xs">
                    <div class="row">
                        <div class="col-md-7 col-sm-7">
                            <div class="wide-banner cnt-strip">
                                <div class="image"> <img class="img-responsive"
                                        src="frontend/assets/images/banners/home-banner1.jpg" alt=""> </div>
                            </div>
                            <!-- /.wide-banner -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-5 col-sm-5">
                            <div class="wide-banner cnt-strip">
                                <div class="image"> <img class="img-responsive"
                                        src="frontend/assets/images/banners/home-banner2.jpg" alt=""> </div>
                            </div>
                            <!-- /.wide-banner -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.wide-banners -->

                <!-- ============================================== WIDE PRODUCTS : END ============================================== -->


                <!-- ============================================== SKIP PRODUCTS 0 ============================================== -->
                <section class="section featured-product wow fadeInUp">
                    <h3 class="section-title">{{ $skip_category_0->category_name }}</h3>
                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
                        @foreach ($skip_product_0 as $product)
                            <div class="item item-carousel">
                                <div class="products">
                                    <div class="product">
                                        <div class="product-image">
                                            <div class="image">
                                                <a
                                                    href="{{ url('product/details/' . $product->id . '/' . $product->product_slug) }}">
                                                    <img src="{{ $product->product_thambnail }}">
                                                </a>
                                            </div>
                                            <!-- /.image -->
                                            @php
                                                $amount = intval($product->selling_price) - intval($product->discount_price);
                                                $discount = ($amount / intval($product->selling_price)) * 100;
                                            @endphp
                                            <div>
                                                @if ($product->product_new == 1)
                                                    <div class="tag new"><span>new</span></div>
                                                @elseif (!empty($product->discount_price))
                                                    <div class="tag hot">
                                                        <span>{{ round($discount) }}%</span>
                                                    </div>
                                                @else
                                                @endif
                                            </div>
                                        </div>
                                        <!-- /.product-image -->
                                        <div class="product-info text-left">
                                            <h3 class="name"><a
                                                    href="{{ url('product/details/' . $product->id . '/' . $product->product_slug) }}">{{ $product->product_name }}</a>
                                            </h3>
                                            {{-- <div class="rating rateit-small"></div> --}}
                                            <div class="description"></div>
                                            @if ($product->discount_price == null)
                                                <div class="product-price">
                                                    <span
                                                        class="price">{{ number_format($product->selling_price) }}₫</span>
                                                </div>
                                            @else
                                                <div class="product-price">
                                                    <span class="price">
                                                        {{ number_format($product->discount_price) }}₫
                                                    </span>
                                                    <span class="price-before-discount">
                                                        {{ number_format($product->selling_price) }}₫</span>
                                                </div>
                                            @endif
                                            <!-- /.product-price -->
                                        </div>
                                        <!-- /.product-info -->
                                        <div class="cart clearfix animate-effect">
                                            <div class="action">
                                                <ul class="list-unstyled">
                                                    <li class="add-cart-button btn-group">
                                                        <button class="btn btn-primary icon" type="button"
                                                            title="Add Cart" data-toggle="modal"
                                                            data-target="#exampleModal" id="{{ $product->id }}"
                                                            onclick="productView(this.id)"> <i
                                                                class="fa fa-shopping-cart"></i>
                                                        </button>
                                                        <button class="btn btn-primary cart-btn" type="button">Add to
                                                            cart</button>
                                                    </li>
                                                    <button class="btn btn-primary icon" type="button"
                                                        title="Wishlist" id="{{ $product->id }}"
                                                        onclick="addToWishList(this.id)"> <i class="fa fa-heart"></i>
                                                    </button>
                                                    <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart"
                                                            href="detail.html" title="Compare"> <i
                                                                class="fa fa-signal" aria-hidden="true"></i> </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- /.action -->
                                        </div>
                                        <!-- /.cart -->
                                    </div>
                                    <!-- /.product -->

                                </div>
                                <!-- /.products -->
                            </div>
                            <!-- /.item -->
                        @endforeach
                    </div>
                    <!-- /.home-owl-carousel -->
                </section>
                <!-- /.section -->
                <!-- ============================================== SKIP PRODUCTS 0 : END ============================================== -->

                <!-- ============================================== SKIP PRODUCTS 1 ============================================== -->
                <section class="section featured-product wow fadeInUp">
                    <h3 class="section-title">{{ $skip_category_1->category_name }}</h3>
                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
                        @foreach ($skip_product_1 as $product)
                            <div class="item item-carousel">
                                <div class="products">
                                    <div class="product">
                                        <div class="product-image">
                                            <div class="image">
                                                <a
                                                    href="{{ url('product/details/' . $product->id . '/' . $product->product_slug) }}">
                                                    <img src="{{ $product->product_thambnail }}">
                                                </a>
                                            </div>
                                            <!-- /.image -->
                                            @php
                                                $amount = intval($product->selling_price) - intval($product->discount_price);
                                                $discount = ($amount / intval($product->selling_price)) * 100;
                                            @endphp
                                            <div>
                                                @if ($product->product_new == 1)
                                                    <div class="tag new"><span>new</span></div>
                                                @elseif (!empty($product->discount_price))
                                                    <div class="tag hot">
                                                        <span>{{ round($discount) }}%</span>
                                                    </div>
                                                @else
                                                @endif
                                            </div>
                                        </div>
                                        <!-- /.product-image -->
                                        <div class="product-info text-left">
                                            <h3 class="name"><a
                                                    href="{{ url('product/details/' . $product->id . '/' . $product->product_slug) }}">{{ $product->product_name }}</a>
                                            </h3>
                                            {{-- <div class="rating rateit-small"></div> --}}
                                            <div class="description"></div>
                                            @if ($product->discount_price == null)
                                                <div class="product-price">
                                                    <span
                                                        class="price">{{ number_format($product->selling_price) }}₫</span>
                                                </div>
                                            @else
                                                <div class="product-price">
                                                    <span class="price">
                                                        {{ number_format($product->discount_price) }}₫
                                                    </span>
                                                    <span class="price-before-discount">
                                                        {{ number_format($product->selling_price) }}₫</span>
                                                </div>
                                            @endif
                                            <!-- /.product-price -->
                                        </div>
                                        <!-- /.product-info -->
                                        <div class="cart clearfix animate-effect">
                                            <div class="action">
                                                <ul class="list-unstyled">
                                                    <li class="add-cart-button btn-group">
                                                        <button class="btn btn-primary icon" type="button"
                                                            title="Add Cart" data-toggle="modal"
                                                            data-target="#exampleModal" id="{{ $product->id }}"
                                                            onclick="productView(this.id)"> <i
                                                                class="fa fa-shopping-cart"></i>
                                                        </button>
                                                        <button class="btn btn-primary cart-btn" type="button">Add to
                                                            cart</button>
                                                    </li>
                                                    <button class="btn btn-primary icon" type="button"
                                                        title="Wishlist" id="{{ $product->id }}"
                                                        onclick="addToWishList(this.id)"> <i class="fa fa-heart"></i>
                                                    </button>
                                                    <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart"
                                                            href="detail.html" title="Compare"> <i
                                                                class="fa fa-signal" aria-hidden="true"></i> </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- /.action -->
                                        </div>
                                        <!-- /.cart -->
                                    </div>
                                    <!-- /.product -->

                                </div>
                                <!-- /.products -->
                            </div>
                            <!-- /.item -->
                        @endforeach
                    </div>
                    <!-- /.home-owl-carousel -->
                </section>
                <!-- /.section -->
                <!-- ============================================== SKIP PRODUCTS 1 : END ============================================== -->

                <!-- ============================================== WIDE PRODUCTS ============================================== -->
                <div class="wide-banners wow fadeInUp outer-bottom-xs">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="wide-banner cnt-strip">
                                <div class="image"> <img class="img-responsive"
                                        src="frontend/assets/images/banners/home-banner.jpg" alt=""> </div>
                                <div class="strip strip-text">
                                    <div class="strip-inner">
                                        <h2 class="text-right">New Mens Fashion<br>
                                            <span class="shopping-needs">Save up to 40% off</span>
                                        </h2>
                                    </div>
                                </div>
                                <div class="new-label">
                                    <div class="text">NEW</div>
                                </div>
                                <!-- /.new-label -->
                            </div>
                            <!-- /.wide-banner -->
                        </div>
                        <!-- /.col -->

                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.wide-banners -->
                <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
                <!-- ============================================== BRAND ============================================== -->
                <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
                    <div class="more-info-tab clearfix ">
                        <h3 class="new-product-title pull-left">thương hiệu</h3>
                        <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
                            <li class="active"><a data-transition-type="backSlide" href="#brands"
                                    data-toggle="tab">Tất cả</a></li>
                            @foreach ($brands as $brand)
                                <li><a data-transition-type="backSlide" href="#brand{{ $brand->id }}"
                                        data-toggle="tab">{{ $brand->brand_name }}</a></li>
                            @endforeach
                        </ul>
                        <!-- /.nav-tabs -->
                    </div>
                    <div class="tab-content outer-top-xs">

                        <div class="tab-pane in active" id="brands">
                            <div class="product-slider">
                                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                                    @foreach ($products as $product)
                                        <div class="item item-carousel">
                                            <div class="products">
                                                <div class="product">
                                                    <div class="product-image">
                                                        <div class="image"> <a
                                                                href="{{ url('product/details/' . $product->id . '/' . $product->product_slug) }}"><img
                                                                    src="{{ $product->product_thambnail }}"
                                                                    alt=""></a> </div>
                                                        <!-- /.image -->
                                                        @php
                                                            $amount = intval($product->selling_price) - intval($product->discount_price);
                                                            $discount = ($amount / intval($product->selling_price)) * 100;
                                                        @endphp

                                                        <div>
                                                            @if ($product->product_new == 1)
                                                                <div class="tag new"><span>new</span></div>
                                                            @elseif (!empty($product->discount_price))
                                                                <div class="tag hot">
                                                                    <span>{{ round($discount) }}%</span>
                                                                </div>
                                                            @else
                                                            @endif
                                                        </div>

                                                    </div>
                                                    <!-- /.product-image -->

                                                    <div class="product-info text-left">
                                                        <h3 class="name"><a
                                                                href="{{ url('product/details/' . $product->id . '/' . $product->product_slug) }}">{{ $product->product_name }}</a>
                                                        </h3>
                                                        {{-- <div class="rating rateit-small"></div> --}}
                                                        <div class="description"></div>
                                                        @if ($product->discount_price == null)
                                                            <div class="product-price">
                                                                <span
                                                                    class="price">{{ number_format($product->selling_price) }}₫</span>
                                                            </div>
                                                        @else
                                                            <div class="product-price">
                                                                <span class="price">
                                                                    {{ number_format($product->discount_price) }}₫
                                                                </span>
                                                                <span class="price-before-discount">
                                                                    {{ number_format($product->selling_price) }}₫</span>
                                                            </div>
                                                        @endif
                                                        <!-- /.product-price -->

                                                    </div>
                                                    <!-- /.product-info -->
                                                    <div class="cart clearfix animate-effect">
                                                        <div class="action">
                                                            <ul class="list-unstyled">
                                                                <li class="add-cart-button btn-group">
                                                                    <button class="btn btn-primary icon"
                                                                        type="button" title="Thêm vào giỏ"
                                                                        data-toggle="modal"
                                                                        data-target="#exampleModal"
                                                                        id="{{ $product->id }}"
                                                                        onclick="productView(this.id)"> <i
                                                                            class="fa fa-shopping-cart"></i>
                                                                    </button>
                                                                    <button class="btn btn-primary cart-btn"
                                                                        type="button">Add to cart</button>
                                                                </li>
                                                                <button class="btn btn-primary icon" type="button"
                                                                    title="Yêu thích" id="{{ $product->id }}"
                                                                    onclick="addToWishList(this.id)"> <i
                                                                        class="fa fa-heart"></i> </button>
                                                                <li class="lnk"> <a data-toggle="tooltip"
                                                                        class="add-to-cart" href="detail.html"
                                                                        title="Compare"> <i class="fa fa-signal"
                                                                            aria-hidden="true"></i> </a> </li>
                                                            </ul>
                                                        </div>
                                                        <!-- /.action -->
                                                    </div>
                                                    <!-- /.cart -->
                                                </div>
                                                <!-- /.product -->
                                            </div>
                                            <!-- /.products -->
                                        </div>
                                        <!-- /.item -->
                                    @endforeach
                                </div>
                                <!-- /.home-owl-carousel -->
                            </div>
                            <!-- /.product-slider -->
                        </div>
                        <!-- /.tab-pane -->
                        @foreach ($brands as $brand)
                            <div class="tab-pane" id="brand{{ $brand->id }}">
                                <div class="product-slider">
                                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme"
                                        data-item="4">
                                        @php
                                            $brandwiseProduct = App\Models\Product::where('brand_id', $brand->id)
                                                ->orderBy('id', 'DESC')
                                                ->get();
                                        @endphp

                                        @forelse($brandwiseProduct as $product)
                                            <div class="item item-carousel">
                                                <div class="products">
                                                    <div class="product">
                                                        <div class="product-image">
                                                            <div class="image"> <a
                                                                    href="{{ url('product/details/' . $product->id . '/' . $product->product_slug) }}"><img
                                                                        src="{{ $product->product_thambnail }}"
                                                                        alt=""></a> </div>
                                                            <!-- /.image -->
                                                            @php
                                                                $amount = intval($product->selling_price) - intval($product->discount_price);
                                                                $discount = ($amount / intval($product->selling_price)) * 100;
                                                            @endphp

                                                            <div>
                                                                @if ($product->product_new == 1)
                                                                    <div class="tag new"><span>new</span></div>
                                                                @elseif (!empty($product->discount_price))
                                                                    <div class="tag hot">
                                                                        <span>{{ round($discount) }}%</span>
                                                                    </div>
                                                                @else
                                                                @endif
                                                            </div>

                                                        </div>
                                                        <!-- /.product-image -->

                                                        <div class="product-info text-left">
                                                            <h3 class="name"><a
                                                                    href="">{{ $product->product_name }}</a>
                                                            </h3>
                                                            {{-- <div class="rating rateit-small"></div> --}}
                                                            <div class="description"></div>
                                                            @if ($product->discount_price == null)
                                                                <div class="product-price">
                                                                    <span
                                                                        class="price">{{ number_format($product->selling_price) }}₫</span>
                                                                </div>
                                                            @else
                                                                <div class="product-price">
                                                                    <span class="price">
                                                                        {{ number_format($product->discount_price) }}₫
                                                                    </span>
                                                                    <span class="price-before-discount">
                                                                        {{ number_format($product->selling_price) }}₫</span>
                                                                </div>
                                                            @endif
                                                            <!-- /.product-price -->

                                                        </div>
                                                        <!-- /.product-info -->
                                                        <div class="cart clearfix animate-effect">
                                                            <div class="action">
                                                                <ul class="list-unstyled">
                                                                    <li class="add-cart-button btn-group">
                                                                        <button class="btn btn-primary icon"
                                                                            type="button" title="Add Cart"
                                                                            data-toggle="modal"
                                                                            data-target="#exampleModal"
                                                                            id="{{ $product->id }}"
                                                                            onclick="productView(this.id)"> <i
                                                                                class="fa fa-shopping-cart"></i>
                                                                        </button>
                                                                        <button class="btn btn-primary cart-btn"
                                                                            type="button">Add to cart</button>
                                                                    </li>
                                                                    <button class="btn btn-primary icon"
                                                                        type="button" title="Wishlist"
                                                                        id="{{ $product->id }}"
                                                                        onclick="addToWishList(this.id)"> <i
                                                                            class="fa fa-heart"></i> </button>
                                                                    <li class="lnk"> <a data-toggle="tooltip"
                                                                            class="add-to-cart" href="detail.html"
                                                                            title="Compare"> <i class="fa fa-signal"
                                                                                aria-hidden="true"></i> </a> </li>
                                                                </ul>
                                                            </div>
                                                            <!-- /.action -->
                                                        </div>
                                                        <!-- /.cart -->
                                                    </div>
                                                    <!-- /.product -->
                                                </div>
                                                <!-- /.products -->
                                            </div>
                                            <!-- /.item -->
                                        @empty
                                            <h5 class="text-danger">No Product Found</h5>
                                        @endforelse
                                    </div>
                                    <!-- /.home-owl-carousel -->
                                </div>
                                <!-- /.product-slider -->
                            </div>
                            <!-- /.tab-pane -->
                        @endforeach
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.section -->
                <!-- ============================================== BRAND  ============================================== -->

                <!-- ============================================== BLOG SLIDER ============================================== -->
                <section class="section latest-blog outer-bottom-vs wow fadeInUp">
                    <h3 class="section-title">Blog</h3>
                    <div class="blog-slider-container outer-top-xs">
                        <div class="owl-carousel blog-slider custom-carousel">
                            @foreach ($blogpost as $blog)
                                <div class="item">
                                    <div class="blog-post">
                                        <div class="blog-post-image">
                                            <div class="image">
                                                <a href="blog.html">
                                                    <img src="{{ $blog->post_image }}" alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <!-- /.blog-post-image -->
                                        <div class="blog-post-info text-left">
                                            <h3 class="name"><a href="#">{{ $blog->post_title }}</a></h3>
                                            <span
                                                class="info">{{ Carbon\Carbon::parse($blog->created_at)->diffForHumans() }}</span>
                                            <p class="text">{!! Str::limit($blog->post_details, 100) !!}</p>
                                            <a href="{{ route('post.details', $blog->id) }}"
                                                class="lnk btn btn-primary">đọc thêm</a>
                                        </div>
                                        <!-- /.blog-post-info -->
                                    </div>
                                    <!-- /.blog-post -->
                                </div>
                            @endforeach
                            <!-- /.item -->
                        </div>
                        <!-- /.owl-carousel -->
                    </div>
                    <!-- /.blog-slider-container -->
                </section>
                <!-- /.section -->
                <!-- ============================================== BLOG SLIDER : END ============================================== -->
            </div>
            <!-- /.homebanner-holder -->
            <!-- ============================================== CONTENT : END ============================================== -->
        </div>
        <!-- /.row -->
        <!-- ============================================== BRANDS CAROUSEL ============================================== -->
        @include('frontend.body.brand')
        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
    </div>
    <!-- /.container -->
</div>
@endsection
