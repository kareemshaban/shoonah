<!DOCTYPE html>
<html lang="en">
@include('layouts.head')

<body>


    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        @include('layouts.sidebar')
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper" @if(Config::get('app.locale')=='ar' )
            style="margin-left: 0 ; margin-right: 260px ; direction: rtl;" @else
            style="margin-right: 0 ; margin-left: 260px ; direction: ltr;" @endif>
            <!--  Header Start -->
            @include('layouts.header')
            <!--  Header End -->
            <div class="body-wrapper-inner">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header"
                            style="display: flex ; justify-content: space-between ; align-items: center">
                            <h5 class="card-title fw-semibold " style="margin-bottom: 0 !important; color: #3cacc8 ">{{
                                __('main.employee') }}</h5>
                            <button type="button" class="btn btn-info btn-lg" style="display: flex ; align-items: center;" id="createButton">
                                <span style="margin-left: 5px; margin-right: 5px"> {{ __('main.add_new') }} </span>
                                <iconify-icon icon="mingcute:plus-fill"></iconify-icon>
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="table-wrapper">

                                <table class="table table-striped  table-bordered table-hover" id="table">
                                    <thead>
                                        <th class="text-center"> {{ __('main.tag') }} </th>
                                        <th class="text-center"> {{ __('main.name') }} </th>
                                        <th class="text-center"> {{ __('main.phone') }} </th>
                                        <th class="text-center"> {{ __('main.salary') }} </th>
                                        <th class="text-center"> {{ __('main.actions') }} </th>
                                    </thead>
                                    <tbody>
                                        @foreach ( $employees as $employee )
                                        <tr>
                                            <td class="text-center"> {{ $employee -> tag }} </td>
                                            <td class="text-center"> {{ $employee -> name }} </td>
                                            <td class="text-center"> {{ $employee -> phone }} </td>
                                            <td class="text-center"> {{ $employee -> salary }} </td>
                                            <td class="text-center">

                                                <button type="button" class="btn btn-danger deleteBtn" value="{{ $employee -> id }}"> <iconify-icon icon="mynaui:trash-solid" style="font-size: 25px"></iconify-icon> </button>
                                                <button type="button" class="btn btn-success editBtn" value="{{ $employee -> id }}"> <iconify-icon icon="akar-icons:edit" style="font-size: 25px"></iconify-icon> </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>


                        </div>
                    </div>

                    @include('Employee.create')
                    @include('Employee.deleteModal')

                    @include('layouts.footer')
                </div>
            </div>
        </div>
    </div>

    <script >
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
                $(".modal-body #phone").val("");
                $(".modal-body #salary").val(0);
                $(".modal-body #workHoursCount").val(0);
                $(".modal-body #workDaysCount").val(0);
                $(".modal-body #offWeaklyDaysCount").val(0);
                $(".modal-body #address").val("");

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
       let id = event.currentTarget.value ;
        event.preventDefault();
        let href = $(this).attr('data-attr');
        $.ajax({
            type:'get',
            url:'/employee-get' + '/' + id,
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
                            $(".modal-body #id").val(response.id);
                            $(".modal-body #name").val(response.name);
                            $(".modal-body #phone").val(response.phone);
                            $(".modal-body #salary").val(response.salary);
                            $(".modal-body #workHoursCount").val(response.workHoursCount);
                            $(".modal-body #workDaysCount").val(response.workDaysCount);
                            $(".modal-body #offWeaklyDaysCount").val(response.offWeaklyDaysCount);
                            $(".modal-body #address").val(response.address);

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
        id = event.currentTarget.value ;
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
        console.log(id);
        confirmDelete();
    });
    $(document).on('click', '.cancel-modal', function(event) {
        $('#deleteModal').modal("hide");
        console.log()
        id = 0 ;
    });




    function confirmDelete(){
        let url = "{{ route('employee-destroy', ':id') }}";
        url = url.replace(':id', id);
        document.location.href=url;
    }

    </script>
</body>

</html>
