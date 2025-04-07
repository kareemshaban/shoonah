<!DOCTYPE html>

@include('layouts.head')
<style>
    #product-list .dropdown-menu {
        display: block;
        position: relative;
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
                            <span class="text-muted fw-light">{{__('main.product_department')}} /</span> {{__('main.add_product_to_supplier')}}
                        </h4>

                    </div>



                    <!-- Responsive Table -->
                    <div class="card">
                        <h5 class="card-header">{{__('main.add_product_to_supplier')}}</h5>
                        <form class="center" method="POST" action="{{ route('store_product_to_supplier') }}"
                              enctype="multipart/form-data" id="product-form">
                            @csrf
                            <div class="container-fluid" style="padding-bottom: 30px;">
                                <div class="row" style="display: flex ; align-items: center">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label> {{__('main.supplier')}} </label>
                                            <select class="form-control @error('supplier_id_select') is-invalid @enderror" id="supplier_id_select"
                                                    name="supplier_id_select" required>
                                                <option selected value=""> {{__('main.choose')}} </option>
                                                @foreach($suppliers as $supplier)
                                                    <option value="{{$supplier -> id}}"> {{$supplier -> name}} </option>
                                                @endforeach


                                            </select>

                                        </div>

                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6" >
                                        <input type="hidden" id="lang" name="lang" value="{{Config::get('app.locale')}}"/>
                                        <div class="form-group">
                                            <label> {{__('main.item')}} </label>
                                            <div style="display: flex ; gap: 10px ; align-items: center ; border: solid 1px grey; padding: 5px ; border-radius: 10px ">
                                                <i class='bx bx-barcode-reader' style="font-size: 30px"></i>
                                                <input class="form-control" id="item" name="item" value="" placeholder="{{__('main.search_item')}}">
                                            </div>



                                        </div>


                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6"></div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div id="product-list">

                                        </div>
                                    </div>
                                </div>




                            </div>



                        </form>
                        <div class="table-responsive  text-nowrap">
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr class="text-nowrap">
                                    <th class="text-center">#</th>
                                    <th class="text-center"> {{__('main.mainImg')}}</th>
                                    <th class="text-center"> {{__('main.name')}}</th>
                                    <th class="text-center">{{__('main.brand')}}</th>
                                    <th class="text-center">{{__('main.department')}}</th>
                                    <th class="text-center">{{__('main.category')}}</th>
                                    <th class="text-center">{{__('main.quantity')}}</th>
                                    <th class="text-center">{{__('main.price')}}</th>
                                    <th class="text-center">{{__('main.productType')}}</th>
                                    <th class="text-center">{{__('main.productState')}}</th>
                                    <th class="text-center">{{__('main.actions')}}</th>
                                </tr>
                                </thead>
                                <tbody id="product-table">


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

@include('cpanel.Products.deleteSupplierProductModal')
@include('cpanel.Products.createModal')
@include('cpanel.Products.alertModal')
@include('layouts.footer')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
    $( document ).ready(function() {
        $('#supplier_id_select').val("");
        $('#item').val( "");
    });
    $('#item').keyup(function (){
       var name = $(this).val();
           autoCompelete(name);
    });
    $('#supplier_id_select').change(function (){
         let supplier_id =  $(this).val();
        //getSupplierProducts
        console.log(supplier_id);
        $.ajax({
            type: 'get',
            url: '/getSupplierProducts' + '/' + supplier_id,
            dataType: 'json',

            success: function (response) {
                var lang = $('#lang').val() ;
                var html = "";
                $.each(response , function (key , value){
                    html += '<tr>';
                    var img =  '/../images/products/' + value.mainImg ;
                    if(lang == 'ar'){
                        html += `<td class="text-center"> ${key + 1} </td>` ;
                        html += `<td class="text-center"> <img src=${img} width="50" /></td>`;
                        html += `<td class="text-center"> ${value.name_ar} </td>`;
                        html += `<td class="text-center"> ${value.brand_ar} </td>`;
                        html += `<td class="text-center"> ${value.department_ar} </td>`;
                        html += `<td class="text-center"> ${value.category_ar} </td>`;
                        html += `<td class="text-center"> ${value.quantity} </td>`;
                        html += `<td class="text-center"> ${value.price} </td>`;
                        var productType0 = "{{ __('main.productType0') }}";
                        var productType1 = "{{ __('main.productType1') }}";
                        if(value.isPrivate == 0){
                            html += `<td class="text-center">  <span class="badge bg-primary"> ${productType0}  </span> </td>`;
                        } else {
                            html += `<td class="text-center">  <span class="badge bg-info"> ${productType1}  </span> </td>`;
                        }
                        var productState1 = "{{ __('main.productState1') }}";
                        var productState0 = "{{ __('main.productState0') }}";
                        if(value.isAvailable == 0){
                            html += `<td class="text-center">  <span class="badge bg-primary"> ${productState1}  </span> </td>`;
                        } else {
                            html += `<td class="text-center">  <span class="badge bg-info"> ${productState0}  </span> </td>`;
                        }

                        var edit_action = "{{ __('main.edit_action') }}";
                        var delete_action = "{{ __('main.delete_action') }}";
                        html += ` <td class="text-center">
                                            <div style="display: flex ; gap: 10px ; justify-content: center ">
                                                 <i class='bx bxs-edit-alt text-success editBtn' data-toggle="tooltip" data-placement="top" title="${edit_action}"
                                                   data-id="${value.id}"  style="font-size: 25px ; cursor: pointer"></i>
                                                <i class='bx bxs-trash text-danger deleteBtn' data-toggle="tooltip" data-placement="top" title="${delete_action}"
                                                  data-id="${value.id}" style="font-size: 25px ; cursor: pointer"></i>
                                            </div>
                                        </td>`;

                    } else {
                        html += `<td class="text-center"> ${key + 1} </td>` ;
                        html += `<td class="text-center"> <img src=${img} width="50" /></td>`;
                        html += `<td class="text-center"> ${value.name_en} </td>`;
                        html += `<td class="text-center"> ${value.brand_en} </td>`;
                        html += `<td class="text-center"> ${value.department_en} </td>`;
                        html += `<td class="text-center"> ${value.category_en} </td>`;
                        html += `<td class="text-center"> ${value.quantity} </td>`;
                        html += `<td class="text-center"> ${value.price} </td>`;
                        var productType0 = "{{ __('main.productType0') }}";
                        var productType1 = "{{ __('main.productType1') }}";
                        if(value.isPrivate == 0){
                            html += `<td class="text-center">  <span class="badge bg-primary"> ${productType0}  </span> </td>`;
                        } else {
                            html += `<td class="text-center">  <span class="badge bg-info"> ${productType1}  </span> </td>`;
                        }
                        var productState1 = "{{ __('main.productState1') }}";
                        var productState0 = "{{ __('main.productState0') }}";
                        if(value.isAvailable == 0){
                            html += `<td class="text-center">  <span class="badge bg-primary"> ${productState1}  </span> </td>`;
                        } else {
                            html += `<td class="text-center">  <span class="badge bg-info"> ${productState0}  </span> </td>`;
                        }

                        var edit_action = "{{ __('main.edit_action') }}";
                        var delete_action = "{{ __('main.delete_action') }}";
                        html += ` <td class="text-center">
                                            <div style="display: flex ; gap: 10px ; justify-content: center ">
                                                 <i class='bx bxs-edit-alt text-success editBtn' data-toggle="tooltip" data-placement="top" title="${edit_action}"
                                                    data-id="${value.id}" style="font-size: 25px ; cursor: pointer"></i>
                                                <i class='bx bxs-trash text-danger deleteBtn' data-toggle="tooltip" data-placement="top" title="${delete_action}"
                                                   data-id="${value.id}" style="font-size: 25px ; cursor: pointer"></i>
                                            </div>
                                        </td>`;
                    }
                    html += '</tr>' ;
                });
                console.log(html);

                $('#product-table').html(html);

            },
            error: function (err){
                console.log(err);
            }
        });
    });


    function  autoCompelete(name) {
        if (name != '') {
            $.ajax({
                type: 'get',
                url: '/productAutoComplete' + '/' + name,
                dataType: 'json',

                success: function (response) {

                    var lang = $('#lang').val() ;
                    var html = "<ul class='dropdown-menu'>";
                    $.each(response , function (key , value){
                        var img =  '/../images/products/' + value.mainImg ;
                        if(lang == 'ar'){
                            html += `<li style="width: 100%" id=${value.id} class="product-item">
                                  <a href="#" class="dropdown-item" style="display: flex; align-items: center;">
                                    <!-- Image -->
                                    <img src="${img}"   alt="image" style="width: 30px;  margin-right: 10px; margin-left: 10px">
                                    <!-- Text -->
                                        ${value.name_ar}
                                  </a>
                                </li>`;
                        } else {
                            html += `<li style="width: 100%">
                                      <a href="#" class="dropdown-item" style="display: flex; align-items: center;">
                                        <!-- Image -->
                                        <img src="${img}"  alt="image" style="width: 30px;  margin-right: 10px; margin-left: 10px">
                                        <!-- Text -->
                                        ${value.name_en}
                                      </a>
                                    </li>`;
                        }

                    });
                    html += '</ul>' ;
                    $('#product-list').html(html);
                    console.log(html);
                }
            });
        } else {
            // hide autocomplete element
            $('#product-list').html("");
        }
    }
    $(document).on('click', '.product-item', function(event) {
        let item_id = $(this).attr('id');
        let supplier_id = $('#supplier_id_select').val();
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
                    msg =  lang == 'ar' ?  'هذا الصنف مضاف الي هذا المورد من قبل' : 'This Item has been added to this supplier before' ;
                    showAlert(msg);
                }

            } ,
            error: function (err){
                let msg =  ''
                var lang = $('#lang').val() ;
                msg =  lang == 'ar' ?  'حدث خطأ برجاء التأكد من اختيار المورد أولا ثم قم بالبحث عن الصنف' :
                    'Something went Wrong , Please make sure to select the supplier before search for product' ;
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
                $(" #msg").html( msg );
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

    $(document).on('click', '.cancel-modal', function(event) {
        $('#alertModal').modal("hide");
        id = 0 ;
        $('#item').val("");
        $('#product-list').html("");
    });

    $(document).on('click', '.deleteBtn', function(event) {
        id = $(this).attr('data-id');
        console.log(id);
        event.preventDefault();
        let href = $(this).attr('data-attr');
        $.ajax({
            url: href,
            beforeSend: function() {
                $('#loader').show();
            },
            // return the result
            success: function(result) {
                $('#deleteModal').modal("show");
            },
            complete: function() {
                $('#loader').hide();
            },
            error: function(jqXHR, testStatus, error) {
                console.log(error);
                alert("Page " + href + " cannot open. Error:" + error);
                $('#loader').hide();
            },
            timeout: 8000
        })
    });

    $(document).on('click', '.btnConfirmDelete', function(event) {

        confirmDelete(id);
    });

    function confirmDelete(id){
        let url = "{{ route('deleteSupplierProduct', ':id') }}";
        url = url.replace(':id', id);
        document.location.href=url;
    }

    $(document).on('click', '.editBtn', function(event) {
        id = $(this).attr('data-id');
           console.log(id);
        event.preventDefault();
        let href = $(this).attr('data-attr');
        $.ajax({
            type:'get',
            url:'/getSupplierProduct' + '/' + id,
            dataType: 'json',

            success:function(response){
                console.log(response);
                if(response){
                    let href = $(this).attr('data-attr');
                    $.ajax({
                        url: href,
                        beforeSend: function() {
                            $('#loader').show();
                        },
                        // return the result
                        success: function(result) {
                            $('#createModal').modal("show");
                            $(".modal-body #supplier").val(response.supplier_id);
                            $(".modal-body #supplier_id").val(response.supplier_id);
                            $(".modal-body #id").val(response.id);
                            $(".modal-body #item").val(response.product_id);
                            $(".modal-body #item_id").val(response.product_id);
                            $(".modal-body #quantity").val(response.quantity);
                            $(".modal-body #price").val(response.price);

                            var translatedText = "{{ __('main.editData') }}";
                            $(".modelTitle").html(translatedText);



                        },
                        complete: function() {
                            $('#loader').hide();
                        },
                        error: function(jqXHR, testStatus, error) {
                            console.log(error);
                            alert("Page " + href + " cannot open. Error:" + error);
                            $('#loader').hide();
                        },
                        timeout: 8000
                    })
                } else {

                }
            }
        });
    });
</script>
</body>
</html>
