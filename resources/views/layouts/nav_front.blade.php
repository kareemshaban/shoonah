<header>
    <!-- Header desktop -->
    <div class="container-menu-desktop">
        <!-- Topbar -->
        <div class="top-bar">
            <div class="content-topbar flex-sb-m h-full container"    @if(Config::get('app.locale')=='ar' ) style="direction: rtl" @endif>
                <div class="left-top-bar">
                    {{__('main.front_nav_title')}}
                </div>

                <div class="right-top-bar flex-w h-full">
                    <a href="{{route('faqs')}}" class="flex-c-m trans-04 p-lr-25">
                        {{__('main.help')}}
                    </a>

                    <a href="{{route('profile')}}" class="flex-c-m trans-04 p-lr-25">
                        {{__('main.my_account')}}
                    </a>
                    @if(Config::get('app.locale')=='en' )
                    <a el="alternate" hreflang="ar"
                       href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}" class="flex-c-m trans-04 p-lr-25">

                        AR
                    </a>

                    @else
                        <a el="alternate" hreflang="en"
                           href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}" class="flex-c-m trans-04 p-lr-25">

                            EN
                        </a>

                    @endif
                   @if(auth() -> check())
                    <a href="#" class="flex-c-m trans-04 p-lr-25 text-danger" onclick="openLogOutModal()">
                        {{__('main.logOut')}}
                    </a>

                    @endif



                </div>
            </div>
        </div>

        <div class="wrap-menu-desktop">
            <nav class="limiter-menu-desktop container"    @if(Config::get('app.locale')=='ar' )
                style="direction: rtl" @endif>

                <!-- Logo desktop -->
                <a href="{{route('front')}}" class="logo">
                    <img src="{{asset('assets/img/shoonah_trans.png')}}" alt="IMG-LOGO">
                </a>

                <!-- Menu desktop -->
                <div class="menu-desktop">
                    <ul class="main-menu">

                        <li  @if($slag == 0 ) class="active-menu" @endif>
                            <a href="{{route('front')}}">{{__('main.home')}}</a>
                        </li>

                        <li  @if($slag == 5 )  class="active-menu" @endif>
                            <a href="#">{{__('main.categories')}}</a>
                            <ul class="sub-menu">
                                @foreach($categories as $category)
                                <li>
                                    <a href="{{route('category_products' , $category -> id)}}">
                                        @if(Config::get('app.locale')=='ar' )
                                        {{$category -> name_ar}}
                                        @else
                                        {{$category -> name_en}}
                                        @endif
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </li>

                        <li class="label1 @if($slag == 1 ) active-menu @endif" data-label1="hot">
                            <a href="{{route('top_products')}}">{{__('main.top_products')}}</a>
                        </li>

                        <li @if($slag == 2 ) class="active-menu" @endif>
                            <a href="{{route('front_news')}}">{{__('main.news')}}</a>
                        </li>

                        <li @if($slag == 3 ) class="active-menu" @endif>
                            <a href="{{route('about')}}">{{__('main.about')}}</a>
                        </li>

                        <li @if($slag == 4 ) class="active-menu" @endif>
                            <a href="{{route('contact')}}">{{__('main.contact')}}</a>
                        </li>
                    </ul>
                </div>

                <!-- Icon header -->
                <div class="wrap-icon-header flex-w flex-r-m">
                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                        <i class="zmdi zmdi-search"></i>
                    </div>

                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" id="cart-count" data-notify="{{$cartCount}}">
                        <i class="zmdi zmdi-shopping-cart"></i>
                    </div>

                    <a href="{{route('wishlist')}}" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" id="wishlist-count" data-notify="{{$wishlistCount}}">
                        <i class="zmdi zmdi-favorite-outline"></i>
                    </a>
                </div>
            </nav>
        </div>
    </div>

    <!-- Header Mobile -->
    <div class="wrap-header-mobile">
        <!-- Logo moblie -->
        <div class="logo-mobile">
            <a href="{{route('front')}}"><img src="{{asset('assets/img/shoonah_trans.png')}}" alt="IMG-LOGO"></a>
        </div>

        <!-- Icon header -->
        <div class="wrap-icon-header flex-w flex-r-m m-r-15">
            <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
                <i class="zmdi zmdi-search"></i>
            </div>

            <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="{{$cartCount}}">
                <i class="zmdi zmdi-shopping-cart"></i>
            </div>

            <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti" data-notify="{{$wishlistCount}}">
                <i class="zmdi zmdi-favorite-outline"></i>
            </a>
        </div>

        <!-- Button show menu -->
        <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
        </div>
    </div>


    <!-- Menu Mobile -->
    <div class="menu-mobile">
        <ul class="topbar-mobile">
            <li>
                <div class="left-top-bar">
                   {{__('main.front_nav_title')}}
                </div>
            </li>

            <li>
                <div class="right-top-bar flex-w h-full">
                    <a href="#" class="flex-c-m p-lr-10 trans-04">
                        {{__('main.help')}}
                    </a>

                    <a href="#" class="flex-c-m p-lr-10 trans-04">
                        {{__('main.my_account')}}
                    </a>
                    @if(Config::get('app.locale')=='en' )
                        <a el="alternate" hreflang="ar" class="flex-c-m p-lr-10 trans-04"
                           href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}" >

                            AR
                        </a>
                 @else
                        <a el="alternate" hreflang="en" class="flex-c-m p-lr-10 trans-04"
                           href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}" >

                            EN
                        </a>
                    @endif

                </div>
            </li>
        </ul>

        <ul class="main-menu-m">
            <li @if($slag == 0 ) class="active" @endif>
                <a href="{{route('front')}}">{{__('main.home')}}</a>
            </li>




            <li @if($slag == 1 ) class="active-menu" @endif>
                <a href="{{route('top_products')}}" class="label1 rs1" data-label1="hot">{{__('main.top_products')}}</a>
            </li>

            <li @if($slag == 2 ) class="active-menu" @endif>
                <a href="{{route('front_news')}}">{{__('main.news')}}</a>
            </li>

            <li @if($slag == 3 ) class="active-menu" @endif>
                <a href="{{route('about')}}">{{__('main.about')}}</a>
            </li>

            <li @if($slag == 4 ) class="active-menu" @endif>
                <a href="{{route('contact')}}">{{__('main.contact')}}</a>
            </li>
        </ul>
    </div>

    <!-- Modal Search -->
    <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
        <div class="container-search-header">
            <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                <img src="{{asset('assets/front/images/icons/icon-close2.png')}}" alt="CLOSE">
            </button>

            <form class="wrap-search-header flex-w p-l-15"
                  @if(Config::get('app.locale')=='ar' ) style="direction: rtl" @endif method="POST" action="{{ route('product_search') }}"
                  enctype="multipart/form-data" >
                @csrf
                <button class="flex-c-m trans-04">
                    <i class="zmdi zmdi-search" style="font-size: 25px"></i>
                </button>
                <input class="plh3" type="text" name="search"  style="font-size: 25px "
                       placeholder="{{__('main.main_search_placeholder')}}">

            </form>

            <input type="hidden" id="defLang" name="defLang" value="{{Config::get('app.locale')}}">
        </div>
    </div>
</header>
@include('layouts.logOutModal')
@include('layouts.logOutModal')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function openLogOutModal(){
        var translatedText = "{{ __('main.alert_title') }}";
        var translatedText2 = "{{ __('main.logout_alert') }}";


        Swal.fire({
            title: translatedText,
            text: translatedText2,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ok',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('logout-form').submit();
            } else if (result.isDismissed) {
                // Optional: handle cancel button
                console.log('Cancelled');
            }
        });

    }

    $(document).ready(function() {
        $('.js-show-cart').on('click',function(){

            //ajax call to get the cart details
            const baseUrl = "{{ url('/') }}";

            $.ajax({
                url: '/cart',
                type: 'GET',
                success: function (products) {
                    let html = '' ;
                    for (let i = 0 ; i < products.length ; i ++){
                        let imagePath = `${baseUrl}/images/products/${products[i]['mainImg']}`;

                        let name = $('#defLang').val() == 'ar' ? products[i]['name_ar'] : products[i]['name_en'];
                        let imgStyle = $('#defLang').val() == 'ar'
                            ? 'margin-left: 20px; margin-right: 0 !important;'
                            : 'margin-right: 20px; margin-left: 0 !important;';

                        html += `<li class="header-cart-item flex-w flex-t m-b-12" style="border-bottom: solid 1px #eee">
                    <div class="header-cart-item-img" style="${imgStyle}">
                        <img src="${imagePath}" alt="IMG">
                    </div>

                    <div class="header-cart-item-txt p-t-8">
                        <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                           ${name}
                        </a>

                        <span class="header-cart-item-info">
								 X  ${products[i]['quantity']}
                        </span>
                    </div>
                </li>`;
                    }
                    $('.js-panel-cart #cart_proucts').html(html);
                    $('.js-panel-cart').addClass('show-header-cart');
                },
                error: function (response) {
                    console.error("Add to cart failed:", response);
                    // Optionally show an error message
                }
            });



        });
    });

</script>
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>
