<!DOCTYPE html>
<html   @if(Config::get('app.locale')=='ar' )  lang="ar"   dir="rtl" @else lang="en"   dir="ltr" @endif>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom CSS -->
<!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

@include('layouts.head_front')
<style>
    .select2-container .select2-selection--single {
        height: 38px;
        padding-left: 10px;
    }

    .select2-container .select2-selection--single .select2-selection__rendered {
        line-height: 36px;
    }

    .select2-container .select2-selection--single .select2-selection__arrow {
        height: 36px;
    }

    .select2-container .select2-selection--single .select2-selection__rendered img.flag {
        width: 20px;
        height: 15px;
        margin-right: 10px;
    }
</style>
<body class="animsition">

<!-- Header -->
@include('layouts.nav_front' , ['slag' => -1])

<div class="sec-banner bg0 p-t-80 p-b-50 py-5 bg-light">
<!-- breadcrumb -->
<div class="container"  @if(Config::get('app.locale')=='ar' ) style="direction: ltr" @endif>
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
        <a href="{{route('front')}}" class="stext-109 cl8 hov-cl1 trans-04">
            {{__('main.home')}}
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

        <span class="stext-109 cl4">
				 {{__('main.your_cart')}}
        </span>
    </div>
</div>


<!-- Shoping Cart -->
<form class="bg0 p-t-75 p-b-85">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                <div class="m-l-25 m-r--38 m-lr-0-xl">
                    <div class="wrap-table-shopping-cart">
                        <table class="table-shopping-cart">
                            <tr class="table_head">
                                <th class="column-1">{{__('main.product')}}</th>
                                <th class="column-2"></th>

                                <th class="column-4">{{__('main.quantity')}}</th>

                            </tr>

                            @foreach($products as $product)

                            <tr class="table_row">
                                <td class="column-1">
                                    <div class="how-itemcart1">
                                        <img src="{{ asset('images/products/' . $product->mainImg) }}" alt="IMG">
                                    </div>
                                </td>
                                <td class="column-2">
                                    @if(Config::get('app.locale')=='ar' )
                                        {{$product -> name_ar}}
                                        @else
                                        {{$product -> name_en}}
                                    @endif
                                </td>

                                <td class="column-4">
                                    <div class="wrap-num-product flex-w m-l-auto m-r-0" >
                                        <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m"
                                             data-product-id="{{ $product->id }}">
                                            <i class="fs-16 zmdi zmdi-minus"></i>
                                        </div>

                                        <input class="mtext-104 cl3 txt-center num-product"
                                               type="number" name="num-product1" value="{{$product -> quantity }}">

                                        <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m"
                                             data-product-id="{{ $product->id }}">
                                            <i class="fs-16 zmdi zmdi-plus" ></i>
                                        </div>
                                    </div>
                                </td>

                            </tr>

                            @endforeach

                        </table>
                    </div>

                </div>
            </div>

            <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50"    @if(Config::get('app.locale')=='ar' ) style="direction: rtl" @endif >
                <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                    <h4 class="mtext-109 cl2 p-b-30">
                        {{__('main.quotation_request')}}
                    </h4>

                    <div class="flex-w flex-t bor12 p-b-13">
                        <div class="size-208">
								<span class="stext-110 cl2">
									{{__('main.cart_count')}}:
								</span>
                        </div>

                        <div class="size-209">
								<span class="mtext-110 cl2">
									{{count($products)}}
								</span>
                        </div>
                    </div>

                    <div class="flex-w flex-t bor12 p-t-15 p-b-30">

                        <div class=" p-r-18 p-r-0-sm w-full-ssm" style="width: 100%">
                            <p class="stext-111 cl6 p-t-2">
                                {{__('main.quotation_hint')}}
                            </p>

{{--                            <div class="p-t-15">--}}
{{--									<span class="stext-112 cl8">--}}
{{--										{{__('main.contacts_details')}}--}}
{{--									</span>--}}
{{--                                <div class="bor8 bg0 m-b-22">--}}
{{--                                    <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="phone" placeholder="Postcode / Zip">--}}
{{--                                </div>--}}
{{--                                <div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">--}}
{{--                                    <select class="js-select2" name="time">--}}
{{--                                        <option value="">Select a country...</option>--}}
{{--                                    </select>--}}
{{--                                    <div class="dropDownSelect2"></div>--}}
{{--                                </div>--}}

{{--                                <div class="bor8 bg0 m-b-12">--}}
{{--                                    <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="state" placeholder="State /  country">--}}
{{--                                </div>--}}

{{--                                <div class="bor8 bg0 m-b-22">--}}
{{--                                    <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="postcode" placeholder="Postcode / Zip">--}}
{{--                                </div>--}}



{{--                            </div>--}}
                        </div>
                    </div>



                    <button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer btn-checkout">
                        {{__('main.quotation_request')}}
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

</div>
<!-- Footer -->
@include('layouts.footer_design_front')
<!-- breadcrumb -->
<div class="container">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
        <a href="{{route('front')}}" class="stext-109 cl8 hov-cl1 trans-04">
            {{__('main.home')}}
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

        <span class="stext-109 cl4">
			  {{__('main.your_cart')}}
        </span>
    </div>
</div>


<!-- Shoping Cart -->


<!-- Back to top -->
<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
</div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

<!-- Bootstrap Icons (for icons in features) -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
<!--===============================================================================================-->
<script>
    $(document).ready(function() {
        $.ajax({
            url: 'https://cdn.jsdelivr.net/npm/world_countries_lists@latest/data/en/countries.json',
            dataType: 'json',
            success: function(data) {
                var countryData = data.map(function(item) {
                    return {
                        id: item.id,
                        text: item.name,
                        flag: item.flag
                    };
                });

                $('.js-select2').select2({
                    data: countryData,
                    templateResult: function(state) {
                        if (!state.id) { return state.text; }
                        var baseUrl = 'https://cdn.jsdelivr.net/npm/world_countries_flags@latest/flags/';
                        var flagUrl = baseUrl + state.id.toLowerCase() + '.png';
                        return $('<span><img src="' + flagUrl + '" class="flag" /> ' + state.text + '</span>');
                    },
                    templateSelection: function(state) {
                        if (!state.id) { return state.text; }
                        var baseUrl = 'https://cdn.jsdelivr.net/npm/world_countries_flags@latest/flags/';
                        var flagUrl = baseUrl + state.id.toLowerCase() + '.png';
                        return $('<span><img src="' + flagUrl + '" class="flag" /> ' + state.text + '</span>');
                    },
                    placeholder: "Select a country...",
                    allowClear: true
                });
            }
        });


        $('.btn-checkout').on('click', function (e) {
            e.preventDefault();

            $.ajax({
                url: '/check-auth',
                method: 'GET',
                success: function (response) {
                    if (response.authenticated) {
                        // User is logged in, proceed to checkout
                        window.location.href = '/checkOut';
                    } else {
                        // Not logged in, redirect to login with return URL
                        window.location.href = '/login?redirect_to=open-cart';
                    }
                }
            });
        });
    });


</script>

@if(session()->has('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: @json(session('success')),
                confirmButtonColor: '#B57E10'
            })
        });
    </script>
    @php
        session()->forget('success');
    @endphp
@endif

@if(session()->has('warning'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'warning',
                title: 'Warning!',
                text: @json(session('warning')),
                confirmButtonColor: '#B57E10'
            })
        });
    </script>
    @php
        session()->forget('success');
    @endphp
@endif

@if(session()->has('error'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'warning',
                title: 'Warning!',
                text: @json(session('error')),
                confirmButtonColor: '#B57E10'
            }).then(() => {
                window.location.href = '/profile';
            });
        });
    </script>
    @php
        session()->forget('success');
    @endphp
@endif


@include('layouts.footer_front')
</body>
</html>






