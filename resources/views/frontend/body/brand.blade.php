<?php
    use App\Models\Brand;
    $brandSlider = Brand::orderBy('brand_name', 'ASC')->get();
?>
<div id="brands-carousel" class="logo-slider wow fadeInUp">
    <div class="logo-slider-inner">
        <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
            @foreach ($brandSlider as $brand)
                <div class="item m-t-15">
                    <a href="#" class="image">
                        <img data-echo="{{ $brand->brand_image }}" src="" alt="">
                    </a>
                </div>
                <!--/.item-->
            @endforeach
        </div>
        <!-- /.owl-carousel #logo-slider -->
    </div>
    <!-- /.logo-slider-inner -->
</div>
