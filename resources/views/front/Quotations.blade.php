<!DOCTYPE html>
<html lang="en">
@include('layouts.head_front')
<body class="animsition">

<!-- Header -->
@include('layouts.nav_front', ['slag' => -1])

<div class="sec-banner bg0 p-t-80 p-b-50">
    <div class="card" style="width: 90%; margin: auto; @if(Config::get('app.locale')=='ar') direction:rtl @endif">
        <h2 style="color: #B57E10; font-size: 18px; margin: 15px">{{__('main.quotations')}}</h2>

        @foreach($quotations as $quotation)
            <div class="card mb-3">
                <div class="card-header" id="heading-{{$quotation->id}}" style="cursor: pointer; background-color: #f8f9fa;"
                     data-toggle="collapse" data-target="#collapse-{{$quotation->id}}"
                     aria-expanded="true" aria-controls="collapse-{{$quotation->id}}">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="row flex-grow-1" style="width: 90%">
                            <div class="col-md-6">
                                <strong>{{__('main.ref_no')}}:</strong> {{$quotation->ref_no}}
                            </div>
                            <div class="col-md-6">
                                <strong>{{__('main.supplier')}}:</strong> {{$quotation->supplier}}
                            </div>
                        </div>
                        <i class="zmdi zmdi-chevron-down toggle-icon ml-2"></i>
                    </div>
                </div>
                <div id="collapse-{{$quotation->id}}" class="collapse" aria-labelledby="heading-{{$quotation->id}}" data-parent="#quotationAccordion">
                    <div class="card-body">
                        <!-- Your existing card-content content here -->
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
                            <div class="col-lg-8 col-md-6 col-sm12">
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
                                @foreach($quotation ->  details as $detail)
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
                       @if($request -> state == 0 || $request -> state == 1)
                            <div class="row" style="margin-top: 40px">
                                <div class="col-12 text-center">
                                    <button type="button" class="btn btn-primary acceptBtn" style="background: #B57E10" value="{{$quotation -> id}}">{{ __('main.select_this_quotation') }}</button>

                                </div>

                            </div>
                       @endif

                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Back to top and other footer elements... -->

<style>
    .card-header {
        transition: background-color 0.3s ease;
    }
    .card-header:hover {
        background-color: #e9ecef !important;
    }
    .toggle-icon {
        transition: transform 0.3s ease;
    }
    .card-header[aria-expanded="true"] .toggle-icon {
        transform: rotate(180deg);
    }
</style>

<script>
    $(document).ready(function() {
        // Initialize all collapses as closed except the first one
        $('.collapse').not(':first').collapse('hide');

        // Add animation to the toggle icon
        $('.card-header').on('click', function() {
            $(this).find('.toggle-icon').toggleClass('zmdi-chevron-up zmdi-chevron-down');
        });
    });

    $(document).on('click', '.acceptBtn', function() {
        // Get the quotation ID from the button value
        const quotationId = $(this).val();

        // Show confirmation dialog
        Swal.fire({
            title: '{{ __("main.confirm_acceptance") }}',
            text: '{{ __("main.confirm_accept_quotation") }}',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#B57E10',
            cancelButtonColor: '#d33',
            confirmButtonText: '{{ __("main.yes_accept") }}',
            cancelButtonText: '{{ __("main.cancel") }}'
        }).then((result) => {
            if (result.isConfirmed) {
                let url = "{{ route('request-accept', ':id') }}";
                url = url.replace(':id', quotationId);
                document.location.href=url;



            }
        });
    });
</script>

@include('layouts.footer_front')
</body>
</html>
