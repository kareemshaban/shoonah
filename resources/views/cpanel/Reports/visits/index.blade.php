<!DOCTYPE html>

@include('layouts.head')


<body>
<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Menu -->

        @include('layouts.sidebar' , ['slag' => 10 , 'subSlag' => 101])
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
                            <span class="text-muted fw-light">{{__('main.report_list')}} /</span> {{__('main.visit_reports')}}
                        </h4>
                        <button type="button" class="btn btn-primary"  id="createButton" style="height: 45px">
                            {{__('main.add_new')}}  <span class="tf-icons bx bx-plus"></span>&nbsp;
                        </button>

                    </div>



                    <!-- Responsive Table -->
                    <div class="card">
                        <h5 class="card-header">{{__('main.visit_reports')}}</h5>
                        @include('flash-message')
                        <div class="table-responsive  text-nowrap">
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr class="text-nowrap">
                                    <th class="text-center">#</th>
                                    <th class="text-center"> {{__('main.ip_address')}}</th>
                                    <th class="text-center">{{__('main.country')}}</th>
                                    <th class="text-center">{{__('main.user_agent')}}</th>
                                    <th class="text-center">{{__('main.device_type')}}</th>
                                    <th class="text-center">{{__('main.visits_count')}}</th>
                                    <th class="text-center">{{__('main.last_visit_at')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($visits as $visit)
                                    <tr>
                                        <th scope="row" class="text-center">{{$loop -> index +1}}</th>
                                        <td class="text-center">{{$visit -> ip_address}}</td>
                                        <td class="text-center">{{$visit -> country}}</td>
                                        <td class="text-center">{{$visit -> user_agent}}</td>
                                        <td class="text-center">{{$visit -> device_type}}</td>
                                        <td class="text-center">{{$visit -> visits_count}}</td>
                                        <td class="text-center">{{$visit -> last_visit_at}}</td>
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
