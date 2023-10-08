@extends('frontend.main-master')
@section('content')
@section('title')
    Blog
@endsection

<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="#">Home</a></li>
                <li class='active'>Blog</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="blog-page">
                <div class="col-md-9">
                    @foreach ($blogpost as $blog)
                        <div class="blog-post  wow fadeInUp">
                            <a href="blog-details.html"><img class="img-responsive" src="{{ asset($blog->post_image) }}"
                                    alt=""></a>
                            <h1><a href="blog-details.html">{{ $blog->post_title }}</a></h1>
                            <span
                                class="date-time">{{ Carbon\Carbon::parse($blog->created_at)->diffForHumans() }}</span>
                            <p>{!! Str::limit($blog->post_details, 200) !!}</p>
                            <a href="{{ route('post.details', $blog->id) }}"
                                class="btn btn-upper btn-primary read-more">đọc thêm</a>
                        </div>
                    @endforeach
                    <div class="clearfix blog-pagination filters-container  wow fadeInUp"
                        style="padding:0px; background:none; box-shadow:none; margin-top:15px; border:none">
                        <div class="text-right">
                            <div class="pagination-container">
                                <ul class="list-inline list-unstyled">
                                    @if ($blogpost->onFirstPage())
                                        <li class="prev disabled"><span><i class="fa fa-angle-left"></i></span></li>
                                    @else
                                        <li class="prev"><a href="{{ $blogpost->previousPageUrl() }}"><i class="fa fa-angle-left"></i></a></li>
                                    @endif
                                    @foreach ($blogpost->getUrlRange(1, $blogpost->lastPage()) as $page => $url)
                                        @if ($page == $blogpost->currentPage())
                                            <li class="active"><span>{{ $page }}</span></li>
                                        @else
                                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                                        @endif
                                    @endforeach
                                    @if ($blogpost->hasMorePages())
                                        <li class="next"><a href="{{ $blogpost->nextPageUrl() }}"><i class="fa fa-angle-right"></i></a></li>
                                    @else
                                        <li class="next disabled"><span><i class="fa fa-angle-right"></i></span></li>
                                    @endif
                                </ul>
                            </div><!-- /.pagination-container -->
                        </div><!-- /.text-right -->
                    </div><!-- /.filters-container -->
                </div>
                <div class="col-md-3 sidebar">
                    <div class="sidebar-module-container">
                        <div class="search-area outer-bottom-small">
                            <form>
                                <div class="control-group">
                                    <input placeholder="Type to search" class="search-field">
                                    <a href="#" class="search-button"></a>
                                </div>
                            </form>
                        </div>
                        <div class="home-banner outer-top-n outer-bottom-xs">
                            <img src="{{ asset('frontend/assets/images/banners/LHS-banner.jpg') }} " alt="Image">
                        </div>
                        <!-- ======== ====CATEGORY======= === -->
                        <div class="sidebar-widget outer-bottom-xs wow fadeInUp">
                            <h3 class="section-title">Danh mục</h3>
                            <div class="sidebar-widget-body m-t-10">
                                <div class="accordion">
                                    @foreach ($blogcategory as $category)
                                        <ul class="list-group">
                                            <a href="{{ url('blog/category/post/' . $category->id) }}">
                                                <li class="list-group-item">{{ $category->blog_category_name }}</li>
                                            </a>
                                        </ul>
                                    @endforeach
                                </div><!-- /.accordion -->
                            </div><!-- /.sidebar-widget-body -->
                        </div><!-- /.sidebar-widget -->
                        <div class="sidebar-widget product-tag wow fadeInUp">
                            <h3 class="section-title">Product tags</h3>
                            <div class="sidebar-widget-body outer-top-xs">
                                <div class="tag-list">
                                    <a class="item" title="Phone" href="category.html">Phone</a>
                                    <a class="item active" title="Vest" href="category.html">Vest</a>
                                    <a class="item" title="Smartphone" href="category.html">Smartphone</a>
                                    <a class="item" title="Furniture" href="category.html">Furniture</a>
                                    <a class="item" title="T-shirt" href="category.html">T-shirt</a>
                                    <a class="item" title="Sweatpants" href="category.html">Sweatpants</a>
                                    <a class="item" title="Sneaker" href="category.html">Sneaker</a>
                                    <a class="item" title="Toys" href="category.html">Toys</a>
                                    <a class="item" title="Rose" href="category.html">Rose</a>
                                </div><!-- /.tag-list -->
                            </div><!-- /.sidebar-widget-body -->
                        </div><!-- /.sidebar-widget -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
