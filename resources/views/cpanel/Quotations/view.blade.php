<!DOCTYPE html>

@include('layouts.head')


<body>
<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Menu -->

        @include('layouts.sidebar' , ['slag' => 7 , 'subSlag' => 71])
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
                            <span class="text-muted fw-light">{{__('main.quotations_list')}} /</span>

                            {{__('main.quotations_view')}}

                        </h4>


                    </div>



                    <!-- Responsive Table -->
                    <div class="card">
                        <h5 class="card-header">

                            {{__('main.quotations_view')}}

                        </h5>
                        <div class="card-content" style="padding-left: 20px ; padding-right: 20px ; padding-bottom: 20px">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-12" style="margin-top: 10px;">
                                    <div class="form-group">
                                        <label> {{__('main.ref_no')}}  <span style="color: red ; font-size: 14px" > * </span></label>
                                        <input name="reference_no" id="reference_no" class="form-control @error('code') is-invalid @enderror"
                                               autofocus  required  placeholder="{{ __('main.reference_no') }}"
                                               readonly value="{{$quotation -> ref_no}}"/>

                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12" style="margin-top: 10px;">
                                    <div class="form-group">
                                        <label>{{ __('main.client') }} <span style="color: red ; font-size: 14px" > * </span> </label>
                                        <input class="form-control" id="client_id" name="client"
                                               value="{{$quotation -> client}}" readonly/>


                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12" style="margin-top: 10px;">
                                    <div class="form-group">
                                        <label>{{ __('main.supplier') }} <span style="color: red ; font-size: 14px" > * </span> </label>
                                        <input class="form-control" id="client_id" name="client"
                                               value="{{$quotation -> supplier}}" readonly/>




                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12" style="margin-top: 10px;">
                                    <div class="form-group">
                                        <label>{{ __('main.orderState') }} <span style="color: red ; font-size: 14px" > * </span> </label>
                                        <input  name="state" id="state" class="form-control @error('name_ar') is-invalid @enderror"
                                                autofocus  required readonly
                                                @if($quotation -> state == 0)
                                                    value="{{__('main.notReplied')}}"
                                                @elseif($quotation -> state == 1)
                                                    value="{{__('main.accepted')}}"
                                                @elseif($quotation -> state == 2)
                                                    value="{{__('main.refused')}}"
                                                @elseif($quotation -> state == 3)
                                                    value="{{__('main.refused')}}"

                                            @endif/>



                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12" style="margin-top: 10px;">
                                    <div class="form-group">
                                        <label>{{ __('main.date') }} <span style="color: red ; font-size: 14px" > * </span>  </label>
                                        <input  name="date" id="date" class="form-control "
                                                autofocus  required  readonly
                                                value="{{\Carbon\Carbon::parse($quotation -> date) -> format('d-m-Y')}}"/>

                                    </div>
                                </div>


                            </div>
                            <div class="row" style="margin-top: 15px">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>{{ __('main.notes') }}</label>
                                        <textarea type="text" name="notes" id="notes"
                                                  class="form-control @error('notes') is-invalid @enderror"
                                                  placeholder="{{ __('main.notes') }}" autofocus readonly > {{$quotation -> notes}} </textarea>
                                        @error('notes')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror

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
                                        <th class="text-center"> {{__('main.price')}}</th>
                                        <th class="text-center"> {{__('main.total')}}</th>
                                        <th class="text-center"> {{__('main.notes')}}</th>
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
                                            <td class="text-center"> {{$detail -> price}} </td>
                                            <td class="text-center"> {{$detail -> total}} </td>
                                            <td class="text-center"> {{$detail -> notes}} </td>

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
