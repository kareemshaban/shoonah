<!DOCTYPE html>

@include('layouts.head')


<body>
<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Menu -->

        @include('layouts.sidebar' , ['slag' => 10 , 'subSlag' => 103])
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
                            <span class="text-muted fw-light">{{__('main.report_list')}} /</span> {{__('main.quotations_report')}}
                        </h4>
                        <button type="button" class="btn btn-primary"  id="searchButton" style="height: 45px">
                            {{__('main.search_btn')}}  <span class="tf-icons bx bx-search"></span>&nbsp;
                        </button>

                    </div>



                    <!-- Responsive Table -->
                    <div class="card">
                        <h5 class="card-header">{{__('main.filters')}}</h5>
                        @include('flash-message')
                        <div class="card-content" style="padding-left: 20px ; padding-right: 20px ; padding-bottom: 20px">
                            <form class="center" method="POST" action="{{ route('quotations_report_show') }}"
                                  enctype="multipart/form-data" id="reportform">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12" style="margin-top: 10px;">
                                        <div class="form-group">
                                            <label> {{__('main.from_Date')}} </label>
                                            <div style="display: flex ; gap: 10px">
                                                <input type="checkbox" name="isFromDate" id="isFromDate" class="form-check">
                                                <input name="fromDate" id="fromDate" class="form-control date"
                                                       autofocus    />
                                            </div>


                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12" style="margin-top: 10px;">
                                        <div class="form-group">
                                            <label> {{__('main.to_Date')}} </label>
                                            <div style="display: flex ; gap: 10px">
                                                <input type="checkbox" name="isToDate" id="isToDate" class="form-check">
                                                <input name="toDate" id="toDate" class="form-control date"
                                                       autofocus    />
                                            </div>


                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12" style="margin-top: 10px;">
                                        <div class="form-group">
                                            <label> {{__('main.client')}} </label>
                                            <select class="form-control search" id="client_id" name="client_id">
                                                <option value=""> {{__('main.all')}} </option>
                                                @foreach($clients as $client)
                                                    <option value="{{$client -> id}}"> {{$client -> name}} </option>
                                                @endforeach

                                            </select>

                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12" style="margin-top: 10px;">
                                        <div class="form-group">
                                            <label> {{__('main.supplier')}} </label>
                                            <select class="form-control search" id="supplier_id" name="supplier_id">
                                                <option value=""> {{__('main.all')}} </option>
                                                @foreach($suppliers as $supplier)
                                                    <option value="{{$supplier -> id}}"> {{$supplier -> name}} </option>
                                                @endforeach

                                            </select>

                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12" style="margin-top: 10px;">
                                        <div class="form-group">
                                            <label> {{__('main.orderState')}} </label>
                                            <select class="form-control search" id="state" name="state">
                                                <option value=""> {{__('main.all')}} </option>
                                                <option value="0"> {{__('main.notReplied')}} </option>
                                                <option value="1"> {{__('main.accepted')}} </option>
                                                <option value="2"> {{__('main.refused')}} </option>
                                            </select>

                                        </div>
                                    </div>

                                </div>

                            </form>


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


<script>
    $(document).ready(function() {
        $('#isFromDate').prop('checked', false);
        $('#isToDate').prop('checked', false);

        $('#client_id').val("");
        $('#supplier_id').val("");

        $('#searchButton').on('click', function (e) {
            e.preventDefault(); // optional: prevents default action (like href="#" or form reload)
            $('#reportform').submit();
        });
    });

</script>
</body>
</html>
