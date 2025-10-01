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

        @include('layouts.sidebar' , ['slag' => 6 , 'subSlag' => 61])
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
                            <span class="text-muted fw-light">{{__('main.quotations_request_list')}} /</span> {{__('main.quotations_requests')}}
                        </h4>
                    </div>



                    <!-- Responsive Table -->
                    <div class="card">
                        <h5 class="card-header">{{__('main.quotations_requests')}}</h5>
                        @include('flash-message')
                        <ul class="nav nav-pills mb-3" id="filter-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" href="#" data-filter="all">{{ __('main.all') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-filter="0">{{ __('main.newRequest') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-filter="1">{{ __('main.replied') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-filter="2">{{ __('main.completed') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-filter="3">{{ __('main.canceled') }}</a>
                            </li>
                        </ul>

                        <div class="table-responsive  text-nowrap">
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr class="text-nowrap">
                                    <th class="text-center">#</th>
                                    <th class="text-center"> {{__('main.ref_no')}}</th>
                                    <th class="text-center"> {{__('main.date')}}</th>
                                    <th class="text-center"> {{__('main.client')}}</th>
                                    <th class="text-center">{{__('main.supplier')}}</th>
                                    <th class="text-center">{{__('main.orderState')}}</th>
                                    <th class="text-center">{{__('main.actions')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($quotationRequests as $request)
                                    <tr  data-state="{{ $request->state }}">
                                        <th scope="row" class="text-center">{{$loop -> index +1}}</th>
                                        <td class="text-center">{{$request -> reference_no}}</td>
                                        <td class="text-center">{{\Carbon\Carbon::parse($request -> date) ->format('Y-m-d')}} </td>
                                        <td class="text-center"> {{$request -> client}} </td>
                                        <td class="text-center"> {{$request -> supplier}} </td>
                                        <td class="text-center">
                                            @if($request -> state == 0)
                                                <span class="badge bg-warning">{{__('main.newRequest')}}</span>
                                            @elseif($request -> state == 1)
                                                <span class="badge bg-info">{{__('main.replied')}}</span>
                                            @elseif($request -> state == 2)
                                                <span class="badge bg-success">{{__('main.completed')}}</span>
                                            @elseif($request -> state == 3)
                                                <span class="badge bg-danger">{{__('main.canceled')}}</span>
                                            @endif
                                        </td>


                                        <td class="text-center">
                                            <div style="display: flex ; gap: 10px ; justify-content: center ">
                                                <a href="{{route('quotationRequests-view' , $request -> id)}}">
                                                <i class='bx bx-show text-success' data-toggle="tooltip" data-placement="top" title="{{__('main.view_action')}}"
                                                   id="{{$request -> id}}" style="font-size: 25px ; cursor: pointer"></i>
                                                </a>

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


@include('layouts.footer')
<script type="text/javascript">
    var id = 0 ;



</script>
<script>
    $(document).ready(function () {
        $('#filter-tabs .nav-link').on('click', function (e) {
            e.preventDefault();
            $('#filter-tabs .nav-link').removeClass('active');
            $(this).addClass('active');

            let filter = $(this).data('filter');

            $('table tbody tr').each(function () {
                let state = $(this).data('state');
                if (filter === 'all' || filter == state) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
    });
</script>
</body>
</html>
