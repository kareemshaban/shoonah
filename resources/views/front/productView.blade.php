<!DOCTYPE html>
<html lang="en">

@include('layouts.head_front')

<body class="animsition">

<!-- Header -->
@include('layouts.nav_front' , ['slag' => -1])




<div class="sec-banner bg0 p-t-80 p-b-50">

    <div class="container">


            <div class="row">
                <div class="col-md-6 col-lg-7 p-b-30">
                    <div class="p-l-25 p-r-30 p-lr-0-lg">
                        <div class="wrap-slick3 flex-sb flex-w">
                            <div class="wrap-slick3-dots"></div>
                            <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

                            <div class="slick3 gallery-lb">
                                <div class="item-slick3" id="main_img_thumb" data-thumb="{{ asset('images/products/' . $product->mainImg) }}">
                                    <div class="wrap-pic-w pos-relative">
                                        <img id="main_img" src="{{ asset('images/products/' . $product->mainImg) }}" alt="IMG-PRODUCT">

                                        <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{ asset('images/products/' . $product->mainImg) }}" id="main_img_a">
                                            <i class="fa fa-expand"></i>
                                        </a>
                                    </div>
                                </div>
                               @if($product -> img1 != '')

                                    <div class="item-slick3" id="img1_thumb" data-thumb="{{ asset('images/products/' . $product->img1) }}">
                                        <div class="wrap-pic-w pos-relative">
                                            <img src="{{ asset('images/products/' . $product->img1) }}" alt="IMG-PRODUCT" id="img1">

                                            <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" id="img1_a" href="{{ asset('images/products/' . $product->img1) }}">
                                                <i class="fa fa-expand"></i>
                                            </a>
                                        </div>
                                    </div>
                               @endif

                              @if($product -> img2 != '')
                                <div class="item-slick3" id="img2_thumb" data-thumb="{{ asset('images/products/' . $product->img2) }}">
                                    <div class="wrap-pic-w pos-relative">
                                        <img src="{{ asset('images/products/' . $product->img2) }}" id="img2" alt="IMG-PRODUCT">

                                        <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" id="img2_a" href="{{ asset('images/products/' . $product->img2) }}">
                                            <i class="fa fa-expand"></i>
                                        </a>
                                    </div>
                                </div>
                                @endif

                                @if($product -> img3 != '')

                                <div class="item-slick3" id="img3_thumb" data-thumb="{{ asset('images/products/' . $product->img3) }}">
                                    <div class="wrap-pic-w pos-relative">
                                        <img src="{{ asset('images/products/' . $product->img3) }}" id="img3" alt="IMG-PRODUCT">

                                        <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" id="img3_a" href="{{ asset('images/products/' . $product->img3) }}">
                                            <i class="fa fa-expand"></i>
                                        </a>
                                    </div>
                                </div>

                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-5 p-b-30">
                    <div class="p-r-50 p-t-5 p-lr-0-lg" @if(Config::get('app.locale') == 'ar') style="text-align: right" @endif>
                        <h4 class="mtext-105 cl2 js-name-detail p-b-14" id="modal-product-name">
                            @if(Config::get('app.locale') == 'ar')
                              {{$product -> name_ar}}
                                @else
                                {{$product -> name_en}}
                            @endif
                        </h4>



                        <p class="stext-102 cl3 p-t-23" id="modal-product-details">
                            @if(Config::get('app.locale') == 'ar')
                                {{$product -> short_description_ar}}
                            @else
                                {{$product -> short_description_en}}
                            @endif
                        </p>
                        <p class="stext-102 cl3 p-t-23" id="modal-product-details">
                            @if(Config::get('app.locale') == 'ar')
                                {!! $product -> description_ar !!}
                            @else
                              {!! $product -> description_en !!}
                            @endif
                        </p>


                        <!--  -->
                        <div class="p-t-33">


                            <div class="flex-w flex-r-m p-b-10">
                                <div class="size-204 flex-w flex-m respon6-next">
                                    <button
                                        class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail"
                                        data-product-id="{{$product->id}}"
                                        data-product-name=" @if(Config::get('app.locale') == 'ar')
                                                  {{$product -> name_ar}}
                                                    @else
                                                    {{$product -> name_en}}
                                                @endif">
                                        {{ __('main.add_to_cart') }}
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!--  -->
                        <div class="flex-w flex-m p-l-100 p-t-40 respon7">
                            <div class="flex-m bor9 p-r-10 m-r-11">
                                @if(in_array($product->id, array_column(session()->get('wishlist', []), 'id')))
                                    <i class="fa fa-heart remove_from_wish_list " data-product-id="{{ $product->id }}" ></i>
                                @else
                                    <i class="fa fa-heart-o add_to_wish_list" data-product-id="{{ $product->id }}"></i>
                                @endif
                            </div>

                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">
                                <i class="fa fa-facebook"></i>
                            </a>

                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}" target="_blank" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter">
                                <i class="fa fa-twitter"></i>
                            </a>


                        </div>
                    </div>
                </div>
            </div>

    </div>

</div>


<!-- Footer -->
@include('layouts.footer_design_front')


<!-- Back to top -->
<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
</div>

<script>
    $(document).ready(function() {
        $('.wrap-slick3').each(function(){
            $(this).find('.slick3').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                fade: true,
                infinite: true,
                autoplay: false,
                autoplaySpeed: 6000,

                arrows: true,
                appendArrows: $(this).find('.wrap-slick3-arrows'),
                prevArrow:'<button class="arrow-slick3 prev-slick3"><i class="fa fa-angle-left" aria-hidden="true"></i></button>',
                nextArrow:'<button class="arrow-slick3 next-slick3"><i class="fa fa-angle-right" aria-hidden="true"></i></button>',

                dots: true,
                appendDots: $(this).find('.wrap-slick3-dots'),
                dotsClass:'slick3-dots',
                customPaging: function(slick, index) {
                    var portrait = $(slick.$slides[index]).data('thumb');
                    console.log('portrait' , portrait);
                    return '<img src=" ' + portrait + ' "/><div class="slick3-dot-overlay"></div>';
                },
            });
        });
    });

</script>

@include('layouts.footer_front')
</body>
</html>
