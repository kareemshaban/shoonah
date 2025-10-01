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

                                {{__('main.create_quotation')}}

                        </h4>

                        <button type="button" class="btn btn-primary mb-2 ms-2"  id="saveButton"
                                style="height: 45px" onclick="valdiateForm()">
                            {{__('main.save_btn')}}  <span class="tf-icons bx bx-save"></span>&nbsp;
                        </button>


                    </div>



                    <!-- Responsive Table -->
                    <div class="card">
                        <h5 class="card-header">

                                {{__('main.quotations_requests_view')}}

                        </h5>
                        <div class="card-content" style="padding-left: 20px ; padding-right: 20px ; padding-bottom: 20px">
                            <form class="center" method="POST" action="{{ route('store-quotation') }}"
                                  enctype="multipart/form-data" id="product-form">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12" style="margin-top: 10px;">
                                        <div class="form-group">
                                            <label> {{__('main.ref_no')}}  <span style="color: red ; font-size: 14px" > * </span></label>
                                            <input name="ref_no" id="ref_no" class="form-control @error('code') is-invalid @enderror"
                                                   autofocus  required  placeholder="{{ __('main.reference_no') }}"
                                                   readonly />

                                        </div>

                                        <input type="hidden" id="request_id" name="request_id" value="{{$request -> id}}"/>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12" style="margin-top: 10px;">
                                        <div class="form-group">
                                            <label>{{ __('main.date') }} <span style="color: red ; font-size: 14px" > * </span>  </label>
                                            <input type="date"  name="date" id="date" class="form-control date"
                                                    autofocus  required/>

                                        </div>
                                    </div>


                                </div>
                                <div class="row" style="margin-top: 15px">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>{{ __('main.notes') }}</label>
                                            <textarea type="text" name="notes" id="notes"
                                                      class="form-control @error('notes') is-invalid @enderror"
                                                      placeholder="{{ __('main.notes') }}" autofocus > </textarea>
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
                                                <td scope="row" class="text-center">{{$loop -> index +1}}</td>
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
                                                <td class="text-center">
                                                    <input type="number" step="any" id="quantity_{{$loop -> index}}" name="quantity[]" class="form-control quantity" readonly
                                                    value="{{$detail -> quantity}}"/>
                                                     </td>
                                                <td class="text-center">
                                                    <input type="number" step="any" id="price_{{$loop -> index}}" name="price[]" class="form-control price"/>
                                                </td>
                                                <td class="text-center">
                                                    <input type="number" step="any" id="total_{{$loop -> index}}" name="total[]" class="form-control total" readonly/>
                                                </td>
                                                <td class="text-center">
                                                    <input type="text"  id="details_notes_{{$loop -> index}}" name="details_notes[]" class="form-control details_notes" />
                                                </td>

                                            </tr>
                                        @endforeach

                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td class="text-center" colspan="4"> {{__('main.total')}} </td>
                                            <td class="text-center" colspan="3">
                                                <input type="number" step="any" id="quotation_total" name="quotation_total" class="form-control" readonly/>

                                            </td>
                                        </tr>

                                        </tfoot>
                                    </table>
                                </div>
                            </form>


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

@include('cpanel.Quotations.alertModal')
@include('layouts.footer')

<script>
    $(document).ready(function() {
        var total = 0 ;
        $.ajax({
            type:'get',
            url:'/quotation_ref_number',
            dataType: 'json',
            success:function(response){
                console.log(response);
                if(response){
                    itemCode = response ;
                    $('#ref_no').val(response);
                }

            } ,
            error: function (err){
                itemCode = "" ;
                $('#ref_no').val('');
            }
        });

        $(document).on('keyup change', 'input.price, input.quantity', function() {
            // Get the current row
            var grandTotal  = 0 ;
            const $row = $(this).closest('tr');

            // Get price and quantity values
            const price = parseFloat($row.find('input.price').val()) || 0;
            const quantity = parseInt($row.find('input.quantity').val()) || 0;

            // Calculate total
            const total = (price * quantity).toFixed(2);

            // Update total field in the same row
            $row.find('input.total').val(total);

            $('table tbody tr').each(function() {
                const rowTotal = parseFloat($(this).find('input.total').val()) || 0;
                grandTotal += rowTotal;
            });

            $('#quotation_total').val(grandTotal.toFixed(2));
        });

    });

    function valdiateForm(){
        let isValid = true;
        let emptyPriceRows = [];

        // Check each price input in the table
        $('.view_table tbody tr').each(function(index) {
            const priceInput = $(this).find('.price');
            const priceValue = priceInput.val().trim();

            if (!priceValue) {
                isValid = false;
                emptyPriceRows.push(index + 1); // +1 to match the row number display
                // Highlight the empty field
                priceInput.addClass('is-invalid');
            } else {
                priceInput.removeClass('is-invalid');
            }
        });

        if (!isValid) {
            // Show error message with row numbers
            const errorMessage = `{{ __('main.price_required_for_rows') }}: ${emptyPriceRows.join(', ')}`;
            showAlert(errorMessage);

        } else {
            $('#product-form').submit();
        }

    }

    function showAlert(msg){
        let href = $(this).attr('data-attr');
        $.ajax({
            url: href,
            beforeSend: function() {
                $('#loader').show();
            },
            // return the result
            success: function(result) {
                $('#myalertModal').modal("show");
                $(" #msg").html( msg.replace(/\n/g, "<br>") );
            },
            complete: function() {
                $('#loader').hide();
            },
            error: function(jqXHR, testStatus, error) {
                console.log(error);

                $('#loader').hide();
            },
            timeout: 8000
        })
    }

    $(document).on('click', '.cancel-modal2', function(event) {

        $('#myalertModal').modal("hide");
    });
</script>
</body>
</html>
