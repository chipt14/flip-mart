@extends('frontend.main-master')
@section('content')
@section('title')
    {{ $product->product_name }}
@endsection

<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="#">Home</a></li>
                <li><a href="#">Clothing</a></li>
                <li class='active'>Floral Print Buttoned</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
    <div class='container'>
        <div class='row single-product'>
            <div class='col-md-3 sidebar'>
                <div class="sidebar-module-container">
                    <div class="home-banner outer-top-n">
                        <img src="frontend/assets/images/banners/LHS-banner.jpg" alt="Image">
                    </div>
                    <!-- ============================================== HOT DEALS ============================================== -->
                    @include('frontend.common.hot-deals')
                    <!-- ============================================== HOT DEALS: END ============================================== -->
                    <!-- ============================================== Testimonials============================================== -->
                    <div class="sidebar-widget  wow fadeInUp outer-top-vs ">
                        <div id="advertisement" class="advertisement">
                            <div class="item">
                                <div class="avatar"><img src="frontend/assets/images/testimonials/member1.png"
                                        alt="Image">
                                </div>
                                <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port
                                    mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                                <div class="clients_author">John Doe <span>Abc Company</span> </div>
                                <!-- /.container-fluid -->
                            </div><!-- /.item -->

                            <div class="item">
                                <div class="avatar"><img src="frontend/assets/images/testimonials/member3.png"
                                        alt="Image">
                                </div>
                                <div class="testimonials"><em>"</em>Vtae sodales aliq uam morbi non sem lacus port
                                    mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                                <div class="clients_author">Stephen Doe <span>Xperia Designs</span> </div>
                            </div><!-- /.item -->

                            <div class="item">
                                <div class="avatar"><img src="frontend/assets/images/testimonials/member2.png"
                                        alt="Image">
                                </div>
                                <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port
                                    mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                                <div class="clients_author">Saraha Smith <span>Datsun &amp; Co</span> </div>
                                <!-- /.container-fluid -->
                            </div><!-- /.item -->

                        </div><!-- /.owl-carousel -->
                    </div>
                    <!-- ============================================== Testimonials: END ============================================== -->
                </div>
            </div><!-- /.sidebar -->
            <div class='col-md-9'>
                <div class="detail-block">
                    <div class="row  wow fadeInUp">

                        <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
                            <div class="product-item-holder size-big single-product-gallery small-gallery">

                                <div id="owl-single-product">
                                    @foreach ($multiImg as $image)
                                        <div class="single-product-gallery-item" id="slide{{ $image->id }}">
                                            <a data-lightbox="image-1" data-title="Gallery"
                                                href="{{ $image->photo_name }}">
                                                <img class="img-responsive" alt=""
                                                    src="{{ $image->photo_name }}"
                                                    data-echo="{{ $image->photo_name }}" />
                                            </a>
                                        </div><!-- /.single-product-gallery-item -->
                                    @endforeach
                                </div><!-- /.single-product-slider -->
                                <div class="single-product-gallery-thumbs gallery-thumbs">
                                    <div id="owl-single-product-thumbnails">
                                        @foreach ($multiImg as $image)
                                            <div class="item">
                                                <a class="horizontal-thumb active" data-target="#owl-single-product"
                                                    data-slide="1">
                                                    <img class="img-responsive" width="85" alt=""
                                                        src="{{ $image->photo_name }}"
                                                        data-echo="{{ $image->photo_name }}" />
                                                </a>
                                            </div>
                                        @endforeach
                                    </div><!-- /#owl-single-product-thumbnails -->
                                </div><!-- /.gallery-thumbs -->
                            </div><!-- /.single-product-gallery -->
                        </div><!-- /.gallery-holder -->
                        <div class='col-sm-6 col-md-7 product-info-block'>
                            <div class="product-info">
                                <h1 class="name" id="pname">{{ $product->product_name }}</h1>
                                <div class="rating-reviews m-t-20">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="rating rateit-small"></div>
                                        </div>
                                        @php
                                            $review = App\Models\Review::where('product_id', $product->id)->get();
                                            $totalReview = count($review);
                                        @endphp
                                        <div class="col-sm-8">
                                            <div class="reviews">
                                                <a href="#" class="lnk">({{$totalReview}} Bình luận)</a>
                                            </div>
                                        </div>
                                    </div><!-- /.row -->
                                </div><!-- /.rating-reviews -->
                                <div class="stock-container info-container m-t-10">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <div class="stock-box">
                                                <span class="label">Tình trạng :</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="stock-box">
                                                <span class="value">In Stock</span>
                                            </div>
                                        </div>
                                    </div><!-- /.row -->
                                </div><!-- /.stock-container -->

                                <div class="description-container m-t-20">
                                    {!! $product->short_descp !!}
                                </div><!-- /.description-container -->

                                <div class="price-container info-container m-t-20">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="price-box">
                                                @if ($product->discount_price == null)
                                                    <span
                                                        class="price">{{ number_format($product->selling_price) }}₫</span>
                                                @else
                                                    <span
                                                        class="price">{{ number_format($product->discount_price) }}₫</span>
                                                    <span
                                                        class="price-strike">{{ number_format($product->selling_price) }}₫</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div><!-- /.row -->
                                </div><!-- /.price-container -->

                                <!-- Add Product Color And Size -->
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="info-title control-label">Màu sắc <span></span></label>
                                            <select class="form-control unicase-form-control selectpicker"
                                                style="display: none;" id="color">
                                                <option selected="" disabled="">Chọn màu</option>
                                                @foreach ($product_color as $color)
                                                    <option value="{{ $color }}">{{ ucwords($color) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            @if ($product->product_size == null)
                                            @else
                                                <label class="info-title control-label">Size <span></span></label>
                                                <select class="form-control unicase-form-control selectpicker"
                                                    style="display: none;" id="size">
                                                    <option selected="" disabled="">Chọn size</option>
                                                    @foreach ($product_size as $size)
                                                        <option value="{{ $size }}">{{ ucwords($size) }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            @endif
                                        </div>
                                    </div>
                                </div><!-- /.row -->
                                <!-- End Product Color And Size -->

                                <div class="quantity-container info-container">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <span class="label">Số lượng :</span>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="cart-quantity">
                                                <div class="quant-input">
                                                    <input type="number" class="form-control" id="qty"
                                                        value="1" min="1">
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" id="product_id" value="{{ $product->id }}"
                                            min="1">
                                        <div class="col-sm-7">
                                            <button type="submit" onclick="addToCart()"
                                                class="btn btn-primary mb-2">
                                                <i class="fa fa-shopping-cart inner-right-vs"></i> THÊM VÀO GIỎ
                                            </button>
                                        </div>
                                    </div><!-- /.row -->
                                </div><!-- /.quantity-container -->
                            </div><!-- /.product-info -->
                        </div><!-- /.col-sm-7 -->
                    </div><!-- /.row -->
                </div>
                <div class="product-tabs inner-bottom-xs  wow fadeInUp">
                    <div class="row">
                        <div class="col-sm-3">
                            <ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
                                <li class="active"><a data-toggle="tab" href="#description">Chi tiết</a></li>
                                <li><a data-toggle="tab" href="#review">Bình luận</a></li>
                                {{-- <li><a data-toggle="tab" href="#tags">TAGS</a></li> --}}
                            </ul><!-- /.nav-tabs #product-tabs -->
                        </div>
                        <div class="col-sm-9">
                            <div class="tab-content">
                                <div id="description" class="tab-pane in active">
                                    <div class="product-tab">
                                        <p class="text">{!! $product->long_descp !!}</p>
                                    </div>
                                </div><!-- /.tab-pane -->
                                <div id="review" class="tab-pane">
                                    <div class="product-tab">
                                        <div class="product-reviews">
                                            <h4 class="title">Phản hồi khách hàng</h4>
                                            @php
                                                $reviews = App\Models\Review::where('product_id', $product->id)
                                                    ->latest()
                                                    ->limit(5)
                                                    ->get();
                                            @endphp
                                            <div class="reviews">
                                                @foreach ($reviews as $item)
                                                    @if ($item->status == 0)
                                                    @else
                                                        <div class="review">
                                                            <div class="row" style="padding-bottom: 10px">
                                                                <div class="">
                                                                    <img style="border-radius: 50%"
                                                                        src="{{ !empty($item->user->profile_photo_path) ? url('upload/user-images/' . $item->user->profile_photo_path) : url('upload/no_image.jpg') }}"
                                                                        width="40px;" height="40px;"><b
                                                                        style="padding-left: 10px">{{ $item->user->name }}</b>
                                                                </div>
                                                            </div> <!-- // end row -->
                                                            <div class="review-title"><span
                                                                    class="summary">{{ $item->summary }}</span><span
                                                                    class="date"><i
                                                                        class="fa fa-calendar"></i><span>
                                                                        {{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}
                                                                    </span></span></div>
                                                            <div class="text">"{{ $item->comment }}"</div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div><!-- /.reviews -->
                                        </div><!-- /.product-reviews -->
                                        <div class="product-add-review">
                                            <h4 class="title">Viết đánh giá của riêng bạn</h4>
                                            <div class="review-table">
                                            </div><!-- /.review-table -->
                                            <div class="review-form">
                                                @guest
                                                    <p>
                                                        <b>Để thêm đánh giá sản phẩm. Bạn cần phải đăng nhập đầu tiên
                                                            <a href="{{ route('login') }}">Đăng nhập tại đây</a>
                                                        </b>
                                                    </p>
                                                @else
                                                    <div class="form-container">
                                                        <form role="form" class="cnt-form" method="post"
                                                            action="{{ route('review.store') }}">
                                                            @csrf
                                                            <input type="hidden" name="product_id"
                                                                value="{{ $product->id }}">
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputSummary">Bản tóm tắt <span
                                                                                class="astk">*</span></label>
                                                                        <input type="text" class="form-control txt"
                                                                            id="exampleInputSummary" name="summary"
                                                                            placeholder="">
                                                                    </div><!-- /.form-group -->
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputReview">Đánh giá <span
                                                                                class="astk">*</span></label>
                                                                        <textarea class="form-control txt txt-review" name="comment" id="exampleInputReview" rows="4" placeholder=""></textarea>
                                                                    </div><!-- /.form-group -->
                                                                </div>
                                                            </div><!-- /.row -->
                                                            <div class="action text-right">
                                                                <button type="submit"
                                                                    class="btn btn-primary btn-upper">GỬI ĐÁNH GIÁ</button>
                                                            </div><!-- /.action -->
                                                        </form><!-- /.cnt-form -->
                                                    </div><!-- /.form-container -->
                                                @endguest
                                            </div><!-- /.review-form -->
                                        </div><!-- /.product-add-review -->
                                    </div><!-- /.product-tab -->
                                </div><!-- /.tab-pane -->
                                {{-- <div id="tags" class="tab-pane">
                                    <div class="product-tag">
                                        <h4 class="title">Product Tags</h4>
                                        <form role="form" class="form-inline form-cnt">
                                            <div class="form-container">
                                                <div class="form-group">
                                                    <label for="exampleInputTag">Add Your Tags: </label>
                                                    <input type="email" id="exampleInputTag"
                                                        class="form-control txt">
                                                </div>
                                                <button class="btn btn-upper btn-primary" type="submit">ADD
                                                    TAGS</button>
                                            </div><!-- /.form-container -->
                                        </form><!-- /.form-cnt -->
                                        <form role="form" class="form-inline form-cnt">
                                            <div class="form-group">
                                                <label>&nbsp;</label>
                                                <span class="text col-md-offset-3">Use spaces to separate tags. Use
                                                    single quotes (') for phrases.</span>
                                            </div>
                                        </form><!-- /.form-cnt -->
                                    </div><!-- /.tab-pane -->
                                </div><!-- /.tab-content --> --}}
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.product-tabs -->
                    <!-- ============================================== UPSELL PRODUCTS ============================================== -->
                    <section class="section featured-product wow fadeInUp">
                        <h3 class="section-title">sản phẩm liên quan</h3>
                        <div
                            class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">
                            @foreach ($relatedProduct as $product)
                                <div class="item item-carousel">
                                    <div class="products">
                                        <div class="product">
                                            <div class="product-image">
                                                <div class="image">
                                                    <a
                                                        href="{{ url('product/details/' . $product->id . '/' . $product->product_slug) }}">
                                                        <img src="{{ $product->product_thambnail }}" alt="">
                                                    </a>
                                                </div><!-- /.image -->
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
                                            </div><!-- /.product-image -->
                                            <div class="product-info text-left">
                                                <h3 class="name">
                                                    <a
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
                                            </div><!-- /.product-info -->
                                            <div class="cart clearfix animate-effect">
                                                <div class="action">
                                                    <ul class="list-unstyled">
                                                        <li class="add-cart-button btn-group">
                                                            <button class="btn btn-primary icon"
                                                                data-toggle="dropdown" type="button">
                                                                <i class="fa fa-shopping-cart"></i>
                                                            </button>
                                                            <button class="btn btn-primary cart-btn"
                                                                type="button">Add to
                                                                cart</button>
                                                        </li>
                                                        <li class="lnk wishlist">
                                                            <a class="add-to-cart" href="detail.html"
                                                                title="Wishlist">
                                                                <i class="icon fa fa-heart"></i>
                                                            </a>
                                                        </li>
                                                        <li class="lnk">
                                                            <a class="add-to-cart" href="detail.html"
                                                                title="Compare">
                                                                <i class="fa fa-signal"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div><!-- /.action -->
                                            </div><!-- /.cart -->
                                        </div><!-- /.product -->
                                    </div><!-- /.products -->
                                </div><!-- /.item -->
                            @endforeach
                        </div><!-- /.home-owl-carousel -->
                    </section><!-- /.section -->
                    <!-- ============================================== UPSELL PRODUCTS : END ============================================== -->
                </div><!-- /.col -->
                <div class="clearfix"></div>
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.body-content -->
</div>

@endsection
