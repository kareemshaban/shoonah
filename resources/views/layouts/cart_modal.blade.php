<div class="wrap-header-cart js-panel-cart">
    <div class="s-full js-hide-cart"></div>

    <div class="header-cart flex-col-l @if(Config::get('app.locale')=='ar') p-r-65 p-l-25 @else  p-l-65 p-r-25 @endif" @if(Config::get('app.locale')=='ar') style="direction: rtl;" @endif>
        <div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					{{__('main.your_cart')}}
				</span>

            <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
                <i class="zmdi zmdi-close"></i>
            </div>
        </div>

        <div class="header-cart-content flex-w js-pscroll">
            <ul class="header-cart-wrapitem w-full"  id="cart_proucts">


            </ul>

            <div class="w-full">


                <div class="header-cart-buttons flex-w w-full">
                    <a href="{{route('open-cart')}}" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 @if(Config::get('app.locale')=='ar') m-l-8   @else m-r-8  @endif m-b-10">
                        {{__('main.checkout')}}
                    </a>

                    <a href="{{route('empty-cart')}}" style="background-color: #dc3545; border: 1px solid #dc3545; color: white; border-radius: 25px" class="flex-c-m stext-101 cl0 size-107 p-lr-15 trans-04 m-b-10 hov-btn3">
                        {{ __('main.empty_cart') }}
                    </a>

                </div>
            </div>
        </div>
    </div>
</div>
