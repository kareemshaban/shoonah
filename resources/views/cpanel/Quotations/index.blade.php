<!DOCTYPE html>

@include('layouts.head')

<style>
    .wrapper {
        max-width: 150px;
    }

    .demo-1 {
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
    }
</style>
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
                        <h4 class="fw-bold py-3 mb-4">
                            <span class="text-muted fw-light">{{__('main.quotations_list')}} /</span> {{__('main.quotations')}}
                        </h4>
                    </div>



                    <!-- Responsive Table -->
                    <div class="card">
                        <h5 class="card-header">{{__('main.quotations')}}</h5>
                        @include('flash-message')
                        <div class="table-responsive  text-nowrap">
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr class="text-nowrap">
                                    <th class="text-center">#</th>
                                    <th class="text-center"> {{__('main.ref_no')}}</th>
                                    <th class="text-center"> {{__('main.request_ref_no')}}</th>
                                    <th class="text-center"> {{__('main.date')}}</th>
                                    <th class="text-center"> {{__('main.client')}}</th>
                                    <th class="text-center">{{__('main.supplier')}}</th>
                                    <th class="text-center">{{__('main.orderState')}}</th>
                                    <th class="text-center">{{__('main.actions')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($quotations as $request)
                                    <tr>
                                        <th scope="row" class="text-center">{{$loop -> index +1}}</th>
                                        <td class="text-center">{{$request -> ref_no}}</td>
                                        <td class="text-center">{{$request -> request_ref_no}}</td>
                                        <td class="text-center">{{\Carbon\Carbon::parse($request -> date) ->format('Y-m-d')}} </td>
                                        <td class="text-center"> {{$request -> client}} </td>
                                        <td class="text-center"> {{$request -> supplier}} </td>
                                        <td class="text-center">
                                            @if($request -> state == 0)
                                                <span class="badge bg-warning">{{__('main.notReplied')}}</span>
                                            @elseif($request -> state == 1)
                                                <span class="badge bg-success">{{__('main.accepted')}}</span>
                                            @elseif($request -> state == 2)
                                                <span class="badge bg-danger">{{__('main.refused')}}</span>
                                            @endif
                                        </td>


                                        <td class="text-center">
                                            <div style="display: flex ; gap: 10px ; justify-content: center ">
                                                <i class='bx bx-show text-success editBtn' data-toggle="tooltip" data-placement="top" title="{{__('main.view_action')}}"
                                                   id="{{$request -> id}}" style="font-size: 25px ; cursor: pointer"></i>


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

@include('cpanel.Requests.view')
@include('layouts.footer')
<script type="text/javascript">
    var id = 0 ;

    $(document).on('click', '.editBtn', function(event) {
        let id = event.currentTarget.id ;
        console.log(id);
        event.preventDefault();
        let href = $(this).attr('data-attr');
        $.ajax({
            type:'get',
            url:'/getReview' + '/' + id,
            dataType: 'json',

            success:function(response){
                var date = new Date(response.created_at);
                var currentDate = date.toISOString().substring(0,10);
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
                            $(".modal-body #client").val(response.client);
                            $(".modal-body #supplier").val(response.supplier);
                            $(".modal-body #review").val(response.review);
                            $(".modal-body #comment").val(response.comment);
                            $(".modal-body #date").val(currentDate);
                            var translatedText = "{{ __('main.view_data') }}";
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

    function confirmDelete(id){
        let url = "{{ route('deleteReview', ':id') }}";
        url = url.replace(':id', id);
        document.location.href=url;
    }



</script>
</body>
</html>
