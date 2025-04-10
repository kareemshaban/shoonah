<!DOCTYPE html>

@include('layouts.head')


<body>
<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Menu -->

        @include('layouts.sidebar' , ['slag' => 8 , 'subSlag' => 81])
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
                            <span class="text-muted fw-light">{{__('main.news_list')}} /</span> {{__('main.news')}}
                        </h4>
                        <a href="{{route('create-New')}}">
                            <button type="button" class="btn btn-primary"  id="createButton" style="height: 45px">
                                {{__('main.add_new')}}  <span class="tf-icons bx bx-plus"></span>&nbsp;
                            </button>
                        </a>


                    </div>



                    <!-- Responsive Table -->
                    <div class="card">
                        <h5 class="card-header">{{__('main.news')}}</h5>
                        @include('flash-message')
                        <div class="table-responsive  text-nowrap">
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr class="text-nowrap">
                                    <th class="text-center">#</th>
                                    <th class="text-center"> {{__('main.publisher')}}</th>
                                    <th class="text-center">{{__('main.title')}}</th>
                                    <th class="text-center">{{__('main.date')}}</th>
                                    <th class="text-center">{{__('main.isVisibleNew')}}</th>
                                    <th class="text-center">{{__('main.actions')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($news as $item)
                                    <tr>
                                        <th scope="row" class="text-center">{{$loop -> index +1}}</th>
                                        <td class="text-center"> {{$item -> publisher}} </td>
                                        <td class="text-center">
                                            @if(Config::get('app.locale')=='ar' )
                                                {{$item -> title_ar}}
                                            @else
                                                {{$item -> title_en}}
                                            @endif
                                        </td>
                                        <td class="text-center">{{\Carbon\Carbon::parse($item -> date) ->format('Y-m-d') }}</td>
                                        <td class="text-center">
                                            @if($item -> isVisible == 0)
                                                <span class="badge bg-danger">{{__('main.isVisible0')}}</span>
                                            @elseif($item -> isVisible == 1)
                                                <span class="badge bg-success">{{__('main.isVisible1')}}</span>
                                            @endif
                                        </td>



                                        <td class="text-center">
                                            <div style="display: flex ; gap: 10px ; justify-content: center ">
                                                <a href="{{route('edit-New' , $item -> id)}}">
                                                    <i class='bx bxs-edit-alt text-success' data-toggle="tooltip" data-placement="top" title="{{__('main.edit_action')}}"
                                                       style="font-size: 25px ; cursor: pointer"></i>
                                                </a>

                                                <i class='bx bxs-trash text-danger deleteBtn' data-toggle="tooltip" data-placement="top" title="{{__('main.delete_action')}}"
                                                   id="{{$item -> id}}" style="font-size: 25px ; cursor: pointer"></i>
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

@include('cpanel.News.deleteModal')
@include('layouts.footer')
<script type="text/javascript">
    var id = 0 ;
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
        let url = "{{ route('deleteNew', ':id') }}";
        url = url.replace(':id', id);
        document.location.href=url;
    }

</script>
</body>
</html>
