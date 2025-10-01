<!DOCTYPE html>

@include('layouts.head')


<body>
<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Menu -->

        @include('layouts.sidebar' , ['slag' => 6 , 'subSlag' => 61])
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
                        <h4 class="fw-bold py-3 mb-2 me-2">
                            <span class="text-muted fw-light">{{__('main.quotations_request_list')}} /</span>

                                {{__('main.quotations_requests_view')}}

                        </h4>
                        @if(auth() -> user() -> type == 1)
                         <a href="{{route('quotation-create' , $request -> id)}}">
                             <button type="button" class="btn btn-primary mb-2 ms-2"  id="saveButton"
                                     style="height: 45px" >
                                 {{__('main.create_quotation')}}  <span class="tf-icons bx bx-plus"></span>&nbsp;
                             </button>
                         </a>

                        @endif

                    </div>



                    <!-- Responsive Table -->
                    <div class="card">
                        <h5 class="card-header">

                                {{__('main.quotations_requests_view')}}

                        </h5>
                        <div class="card-content" style="padding-left: 20px ; padding-right: 20px ; padding-bottom: 20px">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-12" style="margin-top: 10px;">
                                    <div class="form-group">
                                        <label> {{__('main.ref_no')}}  <span style="color: red ; font-size: 14px" > * </span></label>
                                        <input name="reference_no" id="reference_no" class="form-control @error('code') is-invalid @enderror"
                                               autofocus  required  placeholder="{{ __('main.reference_no') }}"
                                               readonly value="{{$request -> reference_no}}"/>

                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12" style="margin-top: 10px;">
                                    <div class="form-group">
                                        <label>{{ __('main.client') }} <span style="color: red ; font-size: 14px" > * </span> </label>
                                         <input class="form-control" id="client_id" name="client"
                                                value="{{$request -> client}}" readonly/>


                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12" style="margin-top: 10px;">
                                    <div class="form-group">
                                        <label>{{ __('main.supplier') }} <span style="color: red ; font-size: 14px" > * </span> </label>
                                        <input class="form-control" id="client_id" name="client"
                                               value="{{$request -> supplier}}" readonly/>




                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12" style="margin-top: 10px;">
                                    <div class="form-group">
                                        <label>{{ __('main.orderState') }} <span style="color: red ; font-size: 14px" > * </span> </label>
                                        <input  name="state" id="state" class="form-control @error('name_ar') is-invalid @enderror"
                                                autofocus  required readonly
                                        @if($request -> state == 0)
                                            value="{{__('main.newRequest')}}"
                                        @elseif($request -> state == 1)
                                            value="{{__('main.replied')}}"
                                        @elseif($request -> state == 2)
                                            value="{{__('main.completed')}}"
                                        @elseif($request -> state == 3)
                                            value="{{__('main.canceled')}}"

                                        @endif/>



                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12" style="margin-top: 10px;">
                                    <div class="form-group">
                                        <label>{{ __('main.date') }} <span style="color: red ; font-size: 14px" > * </span>  </label>
                                        <input  name="date" id="date" class="form-control "
                                                autofocus  required  readonly
                                                value="{{\Carbon\Carbon::parse($request -> date) -> format('d-m-Y')}}"/>

                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12" style="margin-top: 10px;">
                                    <div class="form-group">
                                        <label>{{ __('main.phone') }}  </label>
                                        <input  name="phone" id="phone" class="form-control "
                                                autofocus   readonly value="{{$request -> phone }}"/>

                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12" style="margin-top: 10px;">
                                    <div class="form-group">
                                        <label>{{ __('main.address') }}  </label>
                                        <input  name="address" id="address" class="form-control "
                                                autofocus readonly   value="{{$request -> address }}"/>



                                    </div>
                                </div>

                            </div>
                            <div style=" border-top: solid 3px #eee ; width: 80% ; display: block ;  margin:30px auto">

                            </div>
                            <h5 class="card-header">

                                {{__('main.quotations_items')}}

                            </h5>
                            <div class="table-responsive  text-nowrap">
                                <table class="table table-striped table-hover view_table">
                                    <thead>
                                    <tr class="text-nowrap">
                                        <th class="text-center">#</th>
                                        <th class="text-center"> {{__('main.product')}}</th>
                                        <th class="text-center"> </th>
                                        <th class="text-center"> {{__('main.quantity')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($details as $detail)
                                        <tr  >
                                            <th scope="row" class="text-center">{{$loop -> index +1}}</th>
                                            <td class="text-center">
                                                <img src="{{ asset('images/products/' . $detail->mainImg) }}" width="50" />

                                            </td>
                                            <td class="text-center">
                                                @if(Config::get('app.locale')=='ar' )
                                                    {{$detail -> product_ar}}
                                                @else
                                                    {{$detail -> product_en}}
                                                @endif
                                            </td>
                                            <td class="text-center"> {{$detail -> quantity}} </td>

                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>



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

</body>
</html>
