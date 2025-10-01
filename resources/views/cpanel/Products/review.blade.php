<!DOCTYPE html>

@include('layouts.head')


<body>
<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Menu -->

        @include('layouts.sidebar' , ['slag' => 4 , 'subSlag' => 47])
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
            <!-- Navbar -->

            @include('layouts.nav')

            <!-- / Navbar -->

            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- Content -->

                <div class="container-xxl flex-grow-1 container-p-y">
                    <div style="display: flex ; justify-content: space-between ; align-items: center">
                        <h4 class="fw-bold py-3 mb-4">
                            <span class="text-muted fw-light">{{__('main.product_department')}} /</span> {{__('main.review_products')}}
                        </h4>
                    </div>


                    <!-- Responsive Table -->
                    <div class="card">
                        <h5 class="card-header">{{__('main.review_products')}}</h5>
                        @include('flash-message')
                        <div class="table-responsive  text-nowrap">
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr class="text-nowrap">
                                    <th class="text-center">#</th>
                                    <th class="text-center"> {{__('main.mainImg')}}</th>
                                    <th class="text-center"> {{__('main.name_ar')}}</th>
                                    <th class="text-center">{{__('main.name_en')}}</th>
                                    <th class="text-center">{{__('main.brand')}}</th>
                                    <th class="text-center">{{__('main.department')}}</th>
                                    <th class="text-center">{{__('main.category')}}</th>
                                    <th class="text-center">{{__('main.productType')}}</th>
                                    <th class="text-center">{{__('main.productState')}}</th>
                                    <th class="text-center">{{__('main.actions')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <th scope="row" class="text-center">{{$loop -> index +1}}</th>
                                        <td class="text-center">
                                            <img src="{{ asset('images/products/' . $product->mainImg) }}" width="50" />
                                        </td>
                                        <td class="text-center">{{$product -> name_ar}}</td>
                                        <td class="text-center">{{$product -> name_en}}</td>
                                        <td class="text-center">
                                            @if(Config::get('app.locale')=='ar' )
                                            {{$product -> brand_ar}}
                                                @else
                                                {{$product -> brand_en}}
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if(Config::get('app.locale')=='ar' )
                                                {{$product -> department_ar}}
                                            @else
                                                {{$product -> department_en}}
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if(Config::get('app.locale')=='ar' )
                                                {{$product -> category_ar}}
                                            @else
                                                {{$product -> category_en}}
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if($product -> isPrivate == 0)
                                                <span class="badge bg-primary">{{__('main.productType0')}}</span>
                                            @else
                                                <span class="badge bg-info">{{__('main.productType1')}}</span>

                                            @endif

                                        </td>
                                        <td class="text-center">
                                            @if($product -> isAvailable == 0)
                                                <span class="badge bg-danger">{{__('main.productState1')}}</span>
                                            @else
                                                <span class="badge bg-success">{{__('main.productState0')}}</span>

                                            @endif

                                        </td>

                                        <td class="text-center">
                                            @if(auth() -> user() -> type == 0)

                                                <div style="display: flex ; gap: 10px ; justify-content: center ">
                                                    <a href="{{route('accept-product' , $product -> id)}}">  <i class='bx bxs-check-circle text-success acceptBtn' data-toggle="tooltip" data-placement="top" title="{{__('main.accept_action')}}" style="font-size: 25px ; cursor: pointer"></i></a>
                                                    <a href="{{route('reject-product' , $product -> id)}}">  <i class='bx bxs-x-circle text-danger rejectBtn' data-toggle="tooltip" data-placement="top" title="{{__('main.refuse_action')}}"
                                                    id="{{$product -> id}}" style="font-size: 25px ; cursor: pointer"></i> </a>
                                                </div>


                                            @endif



                                        </td>
                                        </tr>
                                        @endforeach

</tbody>
</table>
</div>
</div>
<!--/ Responsive Table -->
</div>
<!-- / Content -->

<!-- Footer -->
@include('layouts.footer_design')
<!-- / Footer -->

<div class="content-backdrop fade"></div>
</div>
<!-- Content wrapper -->
</div>
<!-- / Layout page -->
</div>

<!-- Overlay -->
<div class="layout-overlay layout-menu-toggle"></div>
</div>

@include('layouts.footer')
<script type="text/javascript">




</script>
</body>
</html>
