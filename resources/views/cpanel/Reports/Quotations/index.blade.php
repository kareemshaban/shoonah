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

        @include('layouts.sidebar' , ['slag' => 10 , 'subSlag' => 102])
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
                            <span class="text-muted fw-light">{{__('main.report_list')}} /</span> {{__('main.quotations_request_report')}}
                        </h4>
                    </div>



                    <!-- Responsive Table -->
                    <div class="card">
                        <h5 class="card-header">{{__('main.quotations_request_report')}}</h5>
                        @include('flash-message')

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
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $request)
                                    <tr  >
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


</body>
</html>
