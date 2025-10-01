<!DOCTYPE html>
<html   @if(Config::get('app.locale')=='ar' )  lang="ar"   dir="rtl" @else lang="en"   dir="ltr" @endif>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

@include('layouts.head_front')


<body class="animsition">

<!-- Header -->
@include('layouts.nav_front' , ['slag' => 2])


<div class="sec-banner bg0 p-t-80 p-b-50 py-5 bg-light">
    <div class="container py-5">
        @foreach($news as $new)

            <div class="card mb-4 shadow-sm">
                <!-- Main Image -->
                <img src="{{asset('images/news' . '/' . $new -> mainImg)}}" class="card-img-top" alt="Main News Image">

                <div class="card-body">
                    <!-- Title -->
                    <h3 class="card-title">
                        @if(Config::get('app.locale')=='ar' )
                            {{$new -> title_ar}}
                        @else
                            {{$new -> title_en}}
                    @endif

                    </h3>

                    <!-- Publisher and Date -->
                    <div class="mb-2 text-muted small">
                        <span><strong>{{__('main.publisher_by')}}</strong> {{$new -> publisher}}</span> |
                        <span><strong>{{__('main.publisher_on')}}</strong> {{ \Carbon\Carbon::parse($new ->date)->format('j F Y') }}</span>
                    </div>

                    <!-- Details -->
                    <p class="card-text">
                        @if(Config::get('app.locale')=='ar' )
                            {!! $new -> details_ar !!}
                        @else
                            {!! $new -> details_en !!}
                        @endif
                    </p>

                    <!-- Multiple Images -->
                    <div class="row g-2" style="margin-top: 30px">
                        @if($new -> img1)
                            <div class="col-6 col-md-4">
                                <img src="{{asset('images/news' . '/' . $new -> img1)}}" class="img-fluid rounded" alt="Related Image 1">
                            </div>
                        @endif

                            @if($new -> img2)
                                <div class="col-6 col-md-4">
                                    <img src="{{asset('images/news' . '/' . $new -> img2)}}" class="img-fluid rounded" alt="Related Image 1">
                                </div>
                            @endif

                            @if($new -> img3)
                                <div class="col-6 col-md-4">
                                    <img src="{{asset('images/news' . '/' . $new -> img3)}}" class="img-fluid rounded" alt="Related Image 1">
                                </div>
                            @endif


                    </div>

                    @if($new -> url)
                        <div class="mt-4">
                            <a href="{{$new -> url}}" class="btn btn-primary" target="_blank">
                                {{__('main.read_article')}}
                            </a>
                        </div>
                    @endif
                    <!-- External URL Button -->

                </div>
            </div>
        @endforeach

    </div>


    <!-- Bootstrap JS -->


</div>

<!-- Slider -->







<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


<!-- Footer -->
@include('layouts.footer_design_front')


<!-- Back to top -->
<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
</div>

<!-- Modal1 -->



<!--===============================================================================================-->

@include('layouts.footer_front')
</body>
</html>
