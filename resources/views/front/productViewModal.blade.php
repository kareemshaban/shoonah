<!-- Modal1 -->
<div class="wrap-modal1 js-modal1 p-t-60 p-b-20">
    <div class="overlay-modal1 js-hide-modal1"></div>

    <div class="container">
        <div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
            <button class="how-pos3 hov3 trans-04 js-hide-modal1">
                <img src="{{asset('assets/front/images/icons/icon-close.png')}}" alt="CLOSE">
            </button>
            @isset($product)
            <div class="row">
                <div class="col-md-6 col-lg-7 p-b-30">
                    <div class="p-l-25 p-r-30 p-lr-0-lg">
                            <div class="wrap-slick3 flex-sb flex-w">
                            <div class="wrap-slick3-dots"></div>
                            <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

                                <div class="slick3 gallery-lb">
                                    <div class="item-slick3" id="main_img_thumb" data-thumb="">
                                        <div class="wrap-pic-w pos-relative">
                                            <img id="main_img" src="" alt="IMG-PRODUCT">

                                            <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="" id="main_img_a">
                                                <i class="fa fa-expand"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="item-slick3" id="img1_thumb" data-thumb="">
                                        <div class="wrap-pic-w pos-relative">
                                            <img src="" alt="IMG-PRODUCT" id="img1">

                                            <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" id="img1_a" href="">
                                                <i class="fa fa-expand"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="item-slick3" id="img2_thumb" data-thumb="">
                                        <div class="wrap-pic-w pos-relative">
                                            <img src="" id="img2" alt="IMG-PRODUCT">

                                            <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" id="img2_a" href="">
                                                <i class="fa fa-expand"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="item-slick3" id="img3_thumb" data-thumb="">
                                        <div class="wrap-pic-w pos-relative">
                                            <img src="" id="img3" alt="IMG-PRODUCT">

                                            <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" id="img3_a" href="">
                                                <i class="fa fa-expand"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-5 p-b-30">
                    <div class="p-r-50 p-t-5 p-lr-0-lg" @if(Config::get('app.locale') == 'ar') style="text-align: right" @endif>
                        <h4 class="mtext-105 cl2 js-name-detail p-b-14" id="modal-product-name">

                        </h4>



                        <p class="stext-102 cl3 p-t-23" id="modal-product-details">
                        </p>

                        <!--  -->
                        <div class="p-t-33">


                            <div class="flex-w flex-r-m p-b-10">
                                <div class="size-204 flex-w flex-m respon6-next">

                                    <button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
                                        {{__('main.add_to_cart')}}
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
            @endisset
        </div>
    </div>
</div>
