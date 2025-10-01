<!DOCTYPE html>
<html lang="en">

@include('layouts.head_front')

<body class="animsition">

<!-- Header -->
@include('layouts.nav_front' , ['slag' => 0])





<!-- Slider -->
<section class="section-slide">
    <div class="wrap-slick1">
        <div class="slick1">
            <div class="item-slick1" style="background-image: url({{asset('assets/front/images/slide-02.jpg')}});">
                <div class="container h-full">
                    <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                        <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
								<span class="ltext-101 cl2 respon2">
									{{__('main.slide1')}}
								</span>
                        </div>

                        <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="1000">
                            <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
                                {{__('main.slide11')}}
                            </h2>
                        </div>

                        <div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="2000">
                            <a href="{{route('all_products')}}" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                {{__('main.shop_now')}}
                            </a>
                        </div>




                    </div>
                </div>
            </div>

            <div class="item-slick1" style="background-image: url({{asset('assets/front/images/slide-03.jpg')}});">
                <div class="container h-full">
                    <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                        <div class="layer-slick1 animated visible-false" data-appear="rollIn" data-delay="0">
								<span class="ltext-101 cl2 respon2">
									{{__('main.slide2')}}
								</span>
                        </div>

                        <div class="layer-slick1 animated visible-false" data-appear="lightSpeedIn" data-delay="800">
                            <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
                                {{__('main.slide22')}}
                            </h2>
                        </div>

                        <div class="layer-slick1 animated visible-false" data-appear="slideInUp" data-delay="1600">
                            <a href="{{route('all_products')}}" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                {{__('main.shop_now')}}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

                <div class="item-slick1" style="background-image: url({{asset('assets/front/images/slide-01.jpg')}});">
                <div class="container h-full">
                    <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                        <div class="layer-slick1 animated visible-false" data-appear="rotateInDownLeft" data-delay="0">
								<span class="ltext-101 cl2 respon2">
									{{__('main.slide3')}}
								</span>
                        </div>

                        <div class="layer-slick1 animated visible-false" data-appear="rotateInUpRight" data-delay="800">
                            <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
                                {{__('main.slide33')}}
                            </h2>
                        </div>

                        <div class="layer-slick1 animated visible-false" data-appear="rotateIn" data-delay="1600">
                            <a href="{{route('all_products')}}" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                {{__('main.shop_now')}}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            @foreach($ads as $ad)
                <div class="item-slick1" style="background-image: url({{asset('images/banner/' . $ad ->banner )}});">
                    <div class="container h-full">
                        <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                          @if($ad -> url != '')


                            <div class="layer-slick1 animated visible-false" data-appear="rotateIn" data-delay="1600">
                                <a href="{{$ad -> url}}" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                    {{__('main.explore_more')}}
                                </a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>


<!-- Banner -->
<div class="sec-banner bg0 p-t-80 p-b-50">
    <div class="container position-relative" style=" position: relative;">

        <!-- Left Arrow -->
        <button class="scroll-btn left" onclick="scrollSlider(-1)">
            &#10094;
        </button>

        <!-- Right Arrow -->
        <button class="scroll-btn right" onclick="scrollSlider(1)">
            &#10095;
        </button>

        <div id="department-scroll" class="horizontal-scroll">
            @foreach($departments as $department)
                <div class="department-item">
                    <!-- Block1 -->
                    <div class="block1 wrap-pic-w">
                        <img src="{{asset('images/department/' . $department->image)}}" alt="IMG-BANNER">

                        <a href="{{route('department_products', $department->id)}}"
                           class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3" style="padding-left: 10px ">
                            <div class="block1-txt-child1 flex-col-l"  @if(Config::get('app.locale') == 'ar') style="width: 60% ; text-align: right "  @else style="width: 60% ; "  @endif>
                                <span class="block1-name ltext-102 trans-04 p-b-8" >
                                    @if(Config::get('app.locale') == 'ar')
                                        {{$department->name_ar}}
                                    @else
                                        {{$department->name_en}}
                                    @endif
                                </span>
                            </div>
                            <div class="block1-txt-child2 p-b-4 trans-05">
                                <div class="block1-link stext-101 cl0 trans-09">
                                    {{__('main.explore_more')}}
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>




<!-- Product -->
@include('layouts.products_section' , ['slag' => 0])


<!-- Footer -->
@include('layouts.footer_design_front')


<!-- Back to top -->
<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
</div>

<!-- Modal1 -->

<script>
    function scrollSlider(direction) {
        const container = document.getElementById('department-scroll');
        const scrollAmount = 320; // adjust based on item width + gap
        container.scrollBy({ left: direction * scrollAmount, behavior: 'smooth' });
    }
</script>

<!--===============================================================================================-->
@if(session()->has('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: @json(session('success')),
                confirmButtonColor: '#B57E10'
            }).then(() => {
                window.location.reload();

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
