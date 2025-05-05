<!DOCTYPE html>

@include('layouts.head')


<body>
<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Menu -->

        @include('layouts.sidebar' , ['slag' => 2 , 'subSlag' => 21])
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
                            <span class="text-muted fw-light">{{__('main.factory_department')}} /</span> {{__('main.suppliers')}}
                        </h4>
                        <button type="button" class="btn btn-primary"  id="createButton" style="height: 45px">
                            {{__('main.add_new')}}  <span class="tf-icons bx bx-plus"></span>&nbsp;
                        </button>

                    </div>



                    <!-- Responsive Table -->
                    <div class="card">
                        <h5 class="card-header">{{__('main.suppliers')}}</h5>
                        @include('flash-message')
                        <div class="table-responsive  text-nowrap">
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr class="text-nowrap">
                                    <th class="text-center">#</th>
                                    <th class="text-center"> {{__('main.name')}}</th>
                                    <th class="text-center">{{__('main.company')}}</th>
                                    <th class="text-center">{{__('main.area')}}</th>
                                    <th class="text-center">{{__('main.phone')}}</th>
                                    <th class="text-center">{{__('main.mobile')}}</th>
                                    <th class="text-center">{{__('main.type')}}</th>
                                    <th class="text-center">{{__('main.actions')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($suppliers as $supplier)
                                    <tr>
                                        <th scope="row" class="text-center">{{$loop -> index +1}}</th>
                                        <td class="text-center">{{$supplier -> name}}</td>
                                        <td class="text-center">{{$supplier -> company}}</td>
                                        <td class="text-center">
                                            <div style="display: flex ; gap: 10px ; align-items: center; justify-content: start">
                                                <img
                                                    src="{{ asset('images/country/' . $supplier->flag) }}" width="40"
                                                    height="40" style="border-radius: 50%" />
                                                <span>    @if(Config::get('app.locale')=='ar' )
                                                        {{$supplier -> city_ar}}
                                                      @else
                                                        {{$supplier -> city_en}}
                                                    @endif
                                                </span>

                                            </div>
                                        </td>
                                        <td class="text-center">{{$supplier -> phone}}</td>
                                        <td class="text-center">{{$supplier -> mobile}}</td>
                                        <td class="text-center">
                                            @if($supplier -> type == 0)
                                                <span class="badge bg-secondary">{{__('main.supplier')}}</span>
                                                @else
                                                <span class="badge bg-warning">{{__('main.factory')}}</span>

                                            @endif

                                        </td>

                                        <td class="text-center">
                                            <div style="display: flex ; gap: 10px ; justify-content: center ">
                                                <i class='bx bxs-edit-alt text-success editBtn' data-toggle="tooltip" data-placement="top" title="{{__('main.edit_action')}}"
                                                   id="{{$supplier -> id}}" style="font-size: 25px ; cursor: pointer"></i>
                                                <i class='bx bxs-trash text-danger deleteBtn'   data-toggle="tooltip" data-placement="top" title="{{__('main.delete_action')}}"
                                                   id="{{$supplier -> id}}" style="font-size: 25px ; cursor: pointer"></i>
                                                @if($supplier -> hasAccount == 0)
                                                <i class='bx bxs-user-plus text-info accountBtn'
                                                   data-toggle="tooltip" data-placement="top" title="{{__('main.create_Account')}}"
                                                   id="{{$supplier -> id}}" style="font-size: 25px ; cursor: pointer"></i>
                                                    @else
                                                    <i class='bx bxs-user-account text-info accountViewBtn'
                                                       data-toggle="tooltip" data-placement="top" title="{{__('main.view_Account')}}"
                                                       id="{{$supplier -> id}}" style="font-size: 25px ; cursor: pointer"></i>
                                                    @if($supplier -> block == 0)
                                                        <i class='bx bx-block text-danger blockBtn'   data-toggle="tooltip" data-placement="top" title="{{__('main.block_action')}}"
                                                           id="{{$supplier -> id}}" style="font-size: 25px ; cursor: pointer"></i>
                                                    @else
                                                        <i class='bx bx-refresh text-success activeBtn'   data-toggle="tooltip" data-placement="top" title="{{__('main.unblock_action')}}"
                                                           id="{{$supplier -> id}}" style="font-size: 25px ; cursor: pointer"></i>
                                                    @endif


                                                @endif
                                            </div>
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

@include('cpanel.Supplier.blockModal')
@include('cpanel.Supplier.unBlockModal')
@include('cpanel.Supplier.create')
@include('cpanel.Supplier.deleteModal')
@include('cpanel.Users.create')
@include('layouts.footer')
<script type="text/javascript">
    var id = 0 ;
    $(document).on('click', '#createButton', function (event) {
        console.log('clicked');
        id = 0;
        event.preventDefault();
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
                $(".modal-body #name").val("");
                $(".modal-body #company").val("");
                $(".modal-body #country_id").val("");
                $(".modal-body #city_id").val("");
                $(".modal-body #address").val("");
                $(".modal-body #phone").val("");
                $(".modal-body #email").val("");
                $(".modal-body #mobile").val("");
                $(".modal-body #vatNumber").val("");
                $(".modal-body #registrationNumber").val("");
                $(".modal-body #logo").attr('src', '{{ asset('assets/img/picture.png') }}');
                var translatedText = "{{ __('main.newData') }}";
                $(".modelTitle").html(translatedText);


                $('.modal-body #country_id').on('change', function() {
                      getCountryCities(this.value , 0);
                });
            },
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
    });
    $(document).on('click', '.editBtn', function(event) {
        let id = event.currentTarget.id ;
        console.log(id);
        event.preventDefault();
        let href = $(this).attr('data-attr');
        $.ajax({
            type:'get',
            url:'/getSupplier' + '/' + id,
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
                            $(".modal-body #name").val(response.name);
                            $(".modal-body #company").val(response.company);
                            $(".modal-body #country_id").val(response.country_id);

                            $(".modal-body #address").val(response.address);
                            $(".modal-body #phone").val(response.phone);
                            $(".modal-body #email").val(response.email);
                            $(".modal-body #mobile").val(response.mobile);
                            $(".modal-body #vatNumber").val(response.vatNumber);
                            $(".modal-body #registrationNumber").val(response.registrationNumber);
                            $(".modal-body #id").val(response.id);
                            var translatedText = "{{ __('main.editData') }}";
                            $(".modelTitle").html(translatedText);

                            getCountryCities(response.country_id , response.city_id);

                            $('.modal-body #country_id').on('change', function() {
                                getCountryCities(this.value , 0);
                            });

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
    $(document).on('click', '.accountBtn', function(event) {
        let id = event.currentTarget.id ;
        console.log(id);
        event.preventDefault();
        let href = $(this).attr('data-attr');
        $.ajax({
            type:'get',
            url:'/getSupplier' + '/' + id,
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
                            $('#createAccountModal').modal("show");
                            $(".modal-body #name").val(response.name);
                            $(".modal-body #email").val(response.email);
                            $(".modal-body #password").val("");
                            $(".modal-body #password2").val("");
                            $(".modal-body #id").val(0);
                            $(".modal-body #supplier_id").val(response.id);
                            $(".modal-body #type").val(1);
                            $(".modal-body #role_id").val("");
                            $(".modal-body #roles").hide();
                            $(".modal-body #role_id").attr('required', false);

                            var translatedText = "{{ __('main.newData') }}";
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
    $(document).on('click', '.accountViewBtn', function(event) {
        let id = event.currentTarget.id ;
        console.log(id);
        event.preventDefault();
        let href = $(this).attr('data-attr');
        $.ajax({
            type:'get',
            url:'/getUserBySupplier' + '/' + id,
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
                            $('#createAccountModal').modal("show");
                            $(".modal-body #name").val(response.name);
                            $(".modal-body #email").val(response.email);
                            $(".modal-body #password").val(response.default_password);
                            $(".modal-body #password2").val(response.default_password);
                            $(".modal-body #id").val(response.id);
                            $(".modal-body #supplier_id").val(response.supplier_id);
                            $(".modal-body #type").val(response.type);
                            $(".modal-body #role_id").val("");
                            $(".modal-body #roles").hide();
                            $(".modal-body #role_id").attr('required', false);


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

    $(document).on('click', '.deleteBtn', function(event) {
        id = event.currentTarget.id ;
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
    $(document).on('click', '.cancel-modal', function(event) {
        $('#deleteModal').modal("hide");
        console.log()
        id = 0 ;
    });


    $(document).on('click', '.blockBtn', function(event) {
        id = event.currentTarget.id ;
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
                $('#blockModal').modal("show");
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
    $(document).on('click', '.btnConfirmDelete1', function(event) {

        confirmBlock(id);
    });
    $(document).on('click', '.cancel-modal1', function(event) {
        $('#blockModal').modal("hide");
        console.log()
        id = 0 ;
    });

    $(document).on('click', '.activeBtn', function(event) {
        id = event.currentTarget.id ;
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
                $('#unBlockModal').modal("show");
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
    $(document).on('click', '.btnConfirmUnBlock', function(event) {

        confirmUnBlock(id);
    });
    $(document).on('click', '.cancel-modal2', function(event) {
        $('#unBlockModal').modal("hide");
        console.log()
        id = 0 ;
    });



    function confirmDelete(id){
        let url = "{{ route('deleteSupplier', ':id') }}";
        url = url.replace(':id', id);
        document.location.href=url;
    }

    function confirmBlock(id){
        let url = "{{ route('blockSupplier', ':id') }}";
        url = url.replace(':id', id);
        document.location.href=url;
    }
    function confirmUnBlock(id){
        let url = "{{ route('unblockSupplier', ':id') }}";
        url = url.replace(':id', id);
        document.location.href=url;
    }


    function getCountryCities(country_id , city_id){
        $.ajax({
            type:'get',
            url:'/getCountryCities' + '/' + country_id,
            dataType: 'json',

            success:function(response){
                $('.modal-body #city_id').empty()
                if(response){
                    for (var i=0;i<response.length;i++){
                        $('<option/>').val(response[i].id).html(response[i].name_ar).appendTo('.modal-body #city_id');
                    }

                    if(city_id > 0){
                        $(".modal-body #city_id").val(city_id);
                    }

                } else {

                }
            }
        });
    }

</script>
</body>
</html>
