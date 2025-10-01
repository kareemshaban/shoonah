<!DOCTYPE html>

@include('layouts.head')


<body>
<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Menu -->

        @include('layouts.sidebar' , ['slag' => 9 , 'subSlag' => 91])
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
                            <span class="text-muted fw-light">{{__('main.ads_list')}} /</span> {{__('main.ads')}}
                        </h4>
                        <button type="button" class="btn btn-primary"  id="createButton" style="height: 45px">
                            {{__('main.add_new')}}  <span class="tf-icons bx bx-plus"></span>&nbsp;
                        </button>

                    </div>



                    <!-- Responsive Table -->
                    <div class="card">
                        <h5 class="card-header">{{__('main.ads')}}</h5>
                        @include('flash-message')
                        <div class="table-responsive  text-nowrap">
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr class="text-nowrap">
                                    <th class="text-center">#</th>
                                    <th class="text-center"> {{__('main.banner')}}</th>
                                    <th class="text-center"> {{__('main.adTitle')}}</th>
                                    <th class="text-center">{{__('main.adType')}}</th>
                                    <th class="text-center">{{__('main.duration')}}</th>
                                    <th class="text-center">{{__('main.isVisible')}}</th>
                                    <th class="text-center">{{__('main.actions')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($ads as $ad)
                                    <tr>
                                        <th scope="row" class="text-center">{{$loop -> index +1}}</th>
                                        <td class="text-center">
                                            <a  href="{{ asset('images/banner/' . $ad->banner) }}" target="_blank">
                                                <img
                                                    src="{{ asset('images/banner/' . $ad->banner) }}" width="50"
                                                    height="40" />
                                            </a>

                                        </td>
                                        <td class="text-center"> {{$ad -> title}} </td>
                                        <td class="text-center">
                                            @if($ad -> type == 0)
                                                <span class="badge bg-primary">{{__('main.adType0')}}</span>
                                                @elseif($ad -> type == 1)
                                                <span class="badge bg-info">{{__('main.adType1')}}</span>
                                            @endif
                                        </td>
                                        <td class="text-center">{{$ad -> duration}}</td>
                                        <td class="text-center">
                                            @if($ad -> isVisible == 0)
                                                <span class="badge bg-danger">{{__('main.isVisible0')}}</span>
                                            @elseif($ad -> isVisible == 1)
                                                <span class="badge bg-success">{{__('main.isVisible1')}}</span>
                                            @endif
                                        </td>


                                        <td class="text-center">
                                            <div style="display: flex ; gap: 10px ; justify-content: center ">
                                                <i class='bx bxs-edit-alt text-success editBtn' data-toggle="tooltip" data-placement="top" title="{{__('main.edit_action')}}"
                                                   id="{{$ad -> id}}" style="font-size: 25px ; cursor: pointer"></i>
                                                <i class='bx bxs-trash text-danger deleteBtn' data-toggle="tooltip" data-placement="top" title="{{__('main.delete_action')}}"
                                                   id="{{$ad -> id}}" style="font-size: 25px ; cursor: pointer"></i>
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

@include('cpanel.Ads.create')
@include('cpanel.Ads.deleteModal')
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
                $(".modal-body #title").val("");
                $(".modal-body #description").val("");
                $(".modal-body #type").val("0");
                $(".modal-body #order").val("");
                $(".modal-body #banner").val("");
                $(".modal-body #item_id").val("");
                $(".modal-body #url").val("");
                $(".modal-body #duration").val(0);
                $(".modal-body #isVisible").val("1");
                $(".modal-body #flag-img").attr('src', '{{ asset('assets/img/picture.png') }}');
                var translatedText = "{{ __('main.newData') }}";
                $(".modelTitle").html(translatedText);
                AdTypeChange(0);
                $('.modal-body #type').on('change', function() {
                    let value = $(this).val();
                    AdTypeChange(value);
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

    function AdTypeChange(val){
        if(val == 0){
            $(".modal-body #itemStar").hide();
            $(".modal-body #url_star").show();
            $(".modal-body #item_id").attr('required', false);
            $(".modal-body #url").attr('required', true);
        } else {
            $(".modal-body #itemStar").show();
            $(".modal-body #url_star").hide();
            $(".modal-body #item_id").attr('required', true);
            $(".modal-body #url").attr('required', false);
        }
    }
    $(document).on('click', '.editBtn', function(event) {
        let id = event.currentTarget.id ;
        console.log(id);
        event.preventDefault();
        let href = $(this).attr('data-attr');
        $.ajax({
            type:'get',
            url:'/getAd' + '/' + id,
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
                            var img =  '/../images/banner/' + response.banner ;
                            $(".modal-body #flag-img").attr('src' , img );
                            $(".modal-body #title").val(response.title);
                            $(".modal-body #description").val(response.description);
                            $(".modal-body #type").val(response.type);
                            $(".modal-body #order").val(response.order);
                            $(".modal-body #item_id").val(response.item_id);
                            $(".modal-body #url").val(response.url);
                            $(".modal-body #isVisible").val(response.isVisible);
                            $(".modal-body #id").val(response.id);
                            $(".modal-body #duration").val(response.duration);
                            var translatedText = "{{ __('main.editData') }}";
                            $(".modelTitle").html(translatedText);

                            AdTypeChange(response.type);
                            $('.modal-body #type').on('change', function() {
                                let value = $(this).val();
                                AdTypeChange(value);
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
        let url = "{{ route('deleteAd', ':id') }}";
        url = url.replace(':id', id);
        document.location.href=url;
    }

</script>
</body>
</html>
