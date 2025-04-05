<!DOCTYPE html>

@include('layouts.head')


<body>
<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Menu -->

        @include('layouts.sidebar' , ['slag' => 3 , 'subSlag' => 31])
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
                            <span class="text-muted fw-light">{{__('main.clients_department')}} /</span> {{__('main.clients_list')}}
                        </h4>


                    </div>



                    <!-- Responsive Table -->
                    <div class="card">
                        <h5 class="card-header">{{__('main.clients_list')}}</h5>
                        <div class="table-responsive  text-nowrap">
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr class="text-nowrap">
                                    <th class="text-center">#</th>
                                    <th class="text-center"> {{__('main.name')}}</th>
                                    <th class="text-center">{{__('main.area')}}</th>
                                     <th class="text-center">{{__('main.gender')}}</th>
                                    <th class="text-center">{{__('main.state')}}</th>
                                    <th class="text-center">{{__('main.mobile')}}</th>
                                    <th class="text-center">{{__('main.registerDate')}}</th>
                                    <th class="text-center">{{__('main.actions')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($clients as $client)
                                    <tr>
                                        <th scope="row" class="text-center">{{$loop -> index +1}}</th>
                                        <td class="text-center">{{$client -> name}}</td>
                                        <td class="text-center">
                                            <div style="display: flex ; gap: 10px ; align-items: center; justify-content: center">
                                                <img
                                                    src="{{ asset('images/country/' . $client->flag) }}" width="40"
                                                    height="40" style="border-radius: 50%" />
                                                <span>    @if(Config::get('app.locale')=='ar' )
                                                        {{$client -> city_ar}}
                                                      @else
                                                        {{$client -> city_en}}
                                                    @endif
                                                </span>

                                            </div>
                                        </td>
                                        <td class="text-center">
                                            @if($client -> gender == 0)
                                                <span class="badge bg-primary">{{__('main.gender0')}}</span>
                                            @else
                                                <span class="badge bg-warning">{{__('main.gender1')}}</span>

                                            @endif

                                        </td>
                                        <td class="text-center">
                                            @if($client -> block == 0)
                                                <span class="badge bg-success">{{__('main.state0')}}</span>
                                            @else
                                                <span class="badge bg-danger">{{__('main.state1')}}</span>

                                            @endif

                                        </td>

                                        <td class="text-center">{{$client -> mobile}}</td>
                                        <td class="text-center">{{\Carbon\Carbon::parse($client -> created_at) ->format('Y-m-d')   }}</td>

                                        <td class="text-center">
                                            <div style="display: flex ; gap: 10px ; justify-content: center ">
                                              @if($client -> block == 0)
                                                    <i class='bx bx-block text-danger deleteBtn'   data-toggle="tooltip" data-placement="top" title="{{__('main.block_action')}}"
                                                       id="{{$client -> id}}" style="font-size: 25px ; cursor: pointer"></i>
                                                  @else
                                                    <i class='bx bx-refresh text-success activeBtn'   data-toggle="tooltip" data-placement="top" title="{{__('main.unblock_action')}}"
                                                       id="{{$client -> id}}" style="font-size: 25px ; cursor: pointer"></i>
                                              @endif


                                                    <i class='bx bxs-user-account text-info accountViewBtn'
                                                       data-toggle="tooltip" data-placement="top" title="{{__('main.view_Account')}}"
                                                       id="{{$client -> id}}" style="font-size: 25px ; cursor: pointer"></i>


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

@include('cpanel.Clients.unBlockModal')
@include('cpanel.Clients.deleteModal')
@include('cpanel.Clients.view')
@include('layouts.footer')
<script type="text/javascript">
    var id = 0 ;


    $(document).on('click', '.accountViewBtn', function(event) {
        let id = event.currentTarget.id ;
        console.log(id);
        event.preventDefault();
        let href = $(this).attr('data-attr');
        $.ajax({
            type:'get',
            url:'/getUserByClient' + '/' + id,
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
                            $('#viewAccountModal').modal("show");
                            $(".modal-body #name").val(response.name);
                            $(".modal-body #email").val(response.email);
                            $(".modal-body #password").val('********');


                            var translatedText = "{{ __('main.view_Account') }}";
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


    $(document).on('click', '.btnConfirmDelete', function(event) {

        confirmDelete(id);
    });

    $(document).on('click', '.btnConfirmUnBlock', function(event) {

        confirmUnBlock(id);
    });


    $(document).on('click', '.cancel-modal', function(event) {
        $('#deleteModal').modal("hide");
        console.log()
        id = 0 ;
    });

    $(document).on('click', '.cancel-modal2', function(event) {
        $('#unBlockModal').modal("hide");
        console.log()
        id = 0 ;
    });

    function confirmUnBlock(id){
        let url = "{{ route('unblockClient', ':id') }}";
        url = url.replace(':id', id);
        document.location.href=url;
    }
    function confirmDelete(id){
        let url = "{{ route('blockClient', ':id') }}";
        url = url.replace(':id', id);
        document.location.href=url;
    }



</script>
</body>
</html>
