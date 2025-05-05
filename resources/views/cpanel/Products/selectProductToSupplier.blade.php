<!DOCTYPE html>

@include('layouts.head')

<style>
    .card-img-container {
        position: relative;
        overflow: hidden;
    }
    .card-img-top {
        transition: transform 0.3s ease;
    }
    .card-img-container:hover .card-img-top {
        transform: scale(1.05);
    }
    .icon-overlay {
        position: absolute;
        top: 10px;
        left: 10px;
        width: 40px;
        height: 40px;
        background-color: #B57E10  ;
        color: white;
        padding: 5px;
        border-radius: 50%;
        font-size: 18px;
        cursor: pointer;
        transition: background-color 0.3s;
        text-align: center;
    }
    .icon-overlay:hover {
        background-color: white;
        color: #B57E10;
        transform: scale(1.2);
        border: solid 1px #B57E10;
    }
</style>


<body>
<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Menu -->

        @include('layouts.sidebar' , ['slag' => 4 , 'subSlag' => 46])
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
                            <span class="text-muted fw-light">{{__('main.product_department')}} /</span> {{__('main.selectProduct')}}
                        </h4>

                    </div>

                    <!-- Responsive Table -->
                    <div class="card">
                        <h5 class="card-header">{{__('main.selectProduct')}}</h5>
                        @include('flash-message')

                        <div class="container py-5">
                            <input type="hidden" id="supplier_id" name="supplier_id" value="{{$supplier -> id}}"/>
                            <input type="hidden" id="lang" name="lang" value="{{Config::get('app.locale')}}"/>

                            <div class="row g-4">
                                @foreach ($products as $item)
                                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                                        <div class="card h-100 shadow-sm">
                                            <div class="card-img-container">
                                                <img src="{{ asset('images/products/' . $item->mainImg) }}" class="card-img-top" alt="{{ $item->name_ar }}" style="height: 150px ;  object-fit: cover;">
                                                <div class="icon-overlay product-item" id={{$item -> id}}>
                                                    <i class="bx bx-plus" ></i> {{-- Bootstrap icon --}}
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title">
                                                    @if(Config::get('app.locale')=='ar' )
                                                        {{ $item->name_ar }}
                                                    @else
                                                        {{ $item->name_en }}
                                                    @endif
                                                </h5>
                                                <p class="card-text">{{__('main.brand')}} :
                                                    @if(Config::get('app.locale')=='ar' )
                                                        {{ $item->brand_ar }}
                                                    @else
                                                        {{ $item->brand_en }}
                                                    @endif

                                                </p>
                                                <p class="card-text">{{__('main.department')}} :
                                                    @if(Config::get('app.locale')=='ar' )
                                                        {{ $item->department_ar }}--{{ $item->category_ar }}
                                                    @else
                                                        {{ $item->department_en }}--{{ $item->category_en }}
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
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

@include('cpanel.Products.deleteSupplierProductModal')
@include('cpanel.Products.createModal')
@include('cpanel.Products.alertModal')
@include('layouts.footer')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
    $(document).on('click', '.product-item', function(event) {
        let item_id = $(this).attr('id');
        let supplier_id = $('#supplier_id').val();
        $.ajax({
            type: 'get',
            url: '/add_product_to_supplier_action' + '/' + item_id + '/' + supplier_id,
            dataType: 'json',

            success: function (response) {
                console.log(response);
                $('#item').val("");
                $('#product-list').html("");
                if(response == "PRODUCT_NOT_EXIST"){
                    // show create modal
                    let href = $(this).attr('data-attr');
                    $.ajax({
                        url: href,
                        beforeSend: function () {
                            $('#loader').show();
                        },
                        // return the result
                        success: function (result) {
                            $('#createModal').modal("show");
                            $(".modal-body #id").val(0);
                            $(".modal-body #item_id").val(item_id);
                            $(".modal-body #supplier_id").val(supplier_id);
                            $(".modal-body #item").val(item_id);
                            $(".modal-body #supplier").val(supplier_id);
                            $(".modal-body #price").val("0");
                            $(".modal-body #quantity").val("0");
                            $(".modal-body #discount").val("0");
                            $(".modal-body #finalPrice").val("0");
                            var translatedText = "{{ __('main.newData') }}";
                            $(".modelTitle").html(translatedText);


                        }
                        ,
                        complete: function () {
                            $('#loader').hide();
                        },
                        error: function (jqXHR, testStatus, error) {
                            console.log(error);
                            alert("Page " + href + " cannot open. Error:" + error);
                            $('#loader').hide();
                        },
                        timeout: 8000
                    })

                } else {
                    // show alert message that this product is exist
                    let msg =  ''
                    var lang = $('#lang').val() ;
                    msg =  lang == 'ar' ?  'هذا الصنف مضاف الي هذا متجرك من قبل' : 'This Item has been added to your store before' ;
                    showAlert(msg);
                }

            } ,
            error: function (err){
                let msg =  ''
                var lang = $('#lang').val() ;
                msg =  lang == 'ar' ?  'حدث خطأ برجاء المحاولة في وقت لاحق' :
                    'Something went Wrong , Please try again later' ;
                showAlert(msg);
            }
        });

    });

    function showAlert(msg){
        let href = $(this).attr('data-attr');
        $.ajax({
            url: href,
            beforeSend: function() {
                $('#loader').show();
            },
            // return the result
            success: function(result) {
                $('#alertModal').modal("show");
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
</script>
</body>
</html>
