<!DOCTYPE html>
<html lang="en">

@include('layouts.head_front')
<body class="animsition">

<!-- Header -->
@include('layouts.nav_front' , ['slag' => -1])







<div class="sec-banner bg0 p-t-80 p-b-50">

    <div class="card" style="width: 90%; margin: auto; @if(Config::get('app.locale')=='ar') direction:rtl @endif">
        <!-- Tab Navigation -->
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs" id="profileTabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">
                        {{__('main.my_profile')}}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="requests-tab" data-toggle="tab" href="#requests" role="tab" aria-controls="requests" aria-selected="false">
                        {{__('main.my_requests')}}
                    </a>
                </li>
            </ul>
        </div>

        <!-- Tab Content -->
        <div class="card-body" style="padding: 5%">
            <div class="tab-content" id="profileTabsContent">
                <!-- Profile Tab -->
                <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <!-- Your existing profile form content -->
                    <h2 style="color: #B57E10; font-size: 18px">{{__('main.account_info')}}</h2>
                    <div class="row" style="padding:25px;border:solid 2px #eee;border-radius:15px;">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label> {{__('main.name')}} <span style="font-size: 14px ; color: red">*</span></label>
                                <input type="text" name="name" id="name"
                                       class="form-control @error('name') is-invalid @enderror"
                                       placeholder="{{ __('main.name') }}" autofocus
                                       value="{{$user -> name}}" required @if($user -> type > 0) readonly @endif/>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                @enderror

                                <input id="id" name="id" type="hidden" value="{{$user -> id}}"/>

                            </div>
                        </div>
                        @if($user -> type == 0)
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label> {{__('main.role')}} <span style="font-size: 14px ; color: red">*</span></label>
                                    <input type="text" name="role" id="role"
                                           class="form-control @error('role') is-invalid @enderror"
                                           placeholder="{{ __('main.role') }}" autofocus
                                           @if(Config::get('app.locale')=='ar' )   value="{{$user -> role_ar}}"
                                           @else value="{{$user -> role_en}}" @endif readonly/>
                                    @error('role')
                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                    @enderror
                                    <input id="role_id" name="role_id" type="hidden" value="{{$user -> role_id}}"/>
                                </div>
                            </div>
                        @else
                            <div class="col-lg-6 col-md-6 col-sm-12"></div>
                        @endif


                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label> {{__('main.email')}} <span style="font-size: 14px ; color: red">*</span></label>
                                <input type="text" name="email" id="email"
                                       class="form-control @error('email') is-invalid @enderror"
                                       placeholder="{{ __('main.email') }}" autofocus
                                       value="{{$user -> email}}" required @if($user -> type > 0) readonly @endif/>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                @enderror

                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label> {{__('main.password')}} <span style="font-size: 14px ; color: red">*</span></label>
                                <div style="display: flex ; gap: 20px">
                                    <input type="text" name="password" id="password"
                                           class="form-control @error('password') is-invalid @enderror"
                                           placeholder="{{ __('main.password') }}" autofocus
                                           value="*********" required/>
                                    <img src="{{asset('assets/img/reset-password.png')}}"  style="cursor: pointer" id="resetPassword"
                                         width="40" height="40" data-toggle="tooltip" data-placement="top" title="{{__('main.reset_password')}}">

                                </div>



                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                @enderror

                            </div>
                        </div>

                    </div>

                    <form class="center" method="POST" action="{{ route('update-client') }}"
                          enctype="multipart/form-data" >
                        @csrf
                        <h2 style="color: #B57E10 ; font-size: 18px ; margin-top: 25px">
                            {{__('main.personal_info')}}  <span class="badge bg-primary">({{__('main.user2')}}) </span>
                        </h2>
                        <input type="hidden" id="user_id" name="user_id" value="{{$user -> id}}"/>

                        <div style="padding:25px;border:solid 2px #eee;border-radius:15px;">


                            <div class="row" style="margin-bottom: 10px;">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>{{ __('main.name') }}  <span style="color: red ; font-size: 14px"> * </span> </label>
                                        <input type="text" name="name" id="name"
                                               class="form-control @error('name') is-invalid @enderror"
                                               placeholder="{{ __('main.name') }}" autofocus  required value="{{$client -> name}}"/>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                        @enderror
                                        <input  name="id" id="id" type="hidden" value="{{$client -> id}}"/>

                                    </div>
                                </div>

                            </div>
                            <div class="row" style="margin-bottom: 10px">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>{{__('main.country')}} <span style="color: red ; font-size: 14px"> * </span></label>
                                        <select class="form-control @error('country_id') is-invalid @enderror" id="country_id" name="country_id" required>
                                            @foreach($countries as $country)
                                                <option value="{{$country -> id}}" @if($client -> country_id == $country -> id) selected @endif>
                                                    @if(Config::get('app.locale')=='ar' )
                                                        {{$country -> name_ar}}
                                                    @else
                                                        {{$country -> name_en}}
                                                    @endif
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('company')
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                        @enderror

                                    </div>

                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>{{__('main.city')}} <span style="color: red ; font-size: 14px"> * </span></label>
                                        <input id="mcity_id" name="mcity_id" value="{{$client -> city_id}}" type="hidden">
                                        <select class="form-control @error('city_id') is-invalid @enderror" id="city_id" name="city_id" required>

                                        </select>
                                        @error('company')
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                        @enderror

                                    </div>

                                </div>

                            </div>
                            <div class="row" style="margin-bottom: 10px;">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>{{ __('main.phone') }}  </label>
                                        <input type="text" name="phone" id="phone"
                                               class="form-control @error('phone') is-invalid @enderror"
                                               placeholder="{{ __('main.phone') }}" autofocus value="{{$client -> phone}}"  />
                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                        @enderror


                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>{{ __('main.mobile') }} <span style="color: red ; font-size: 14px"> * </span></label>
                                        <input type="text" name="mobile" id="mobile"
                                               class="form-control @error('mobile') is-invalid @enderror"
                                               placeholder="{{ __('main.mobile') }}" autofocus required value="{{$client -> mobile}}"/>
                                        @error('mobile')
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                        @enderror

                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-bottom: 10px;">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>{{ __('main.email') }}  </label>
                                        <input type="text" name="email" id="email"
                                               class="form-control @error('email') is-invalid @enderror"
                                               placeholder="{{ __('main.email') }}" autofocus  value="{{$client -> email}}" />
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                        @enderror


                                    </div>
                                </div>


                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>{{ __('main.address') }}</label>
                                        <textarea type="text" name="address" id="address"
                                                  class="form-control @error('address') is-invalid @enderror"
                                                  placeholder="{{ __('main.address') }}" autofocus > {{$client -> address}} </textarea>
                                        @error('address')
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                        @enderror

                                    </div>
                                </div>

                            </div>

                            <div class="row" style="margin-top: 40px">
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-primary" style="background: #B57E10">{{ __('main.save_btn') }}</button>

                                </div>

                            </div>
                        </div>
                    </form>
                </div>

                <!-- Requests Tab -->
                <div class="tab-pane fade" id="requests" role="tabpanel" aria-labelledby="requests-tab">
                    <h2 style="color: #B57E10; font-size: 18px">{{__('main.my_requests')}}</h2>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th class="text-center">{{__('main.ref_no')}}</th>
                                <th class="text-center">{{__('main.date')}}</th>
                                <th class="text-center">{{__('main.orderState')}}</th>
                                <th class="text-center">{{__('main.quotation_count')}}</th>
                                <th class="text-center">{{__('main.actions')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($quotationRequests as $request)
                                <tr>
                                    <td class="text-center">{{$request -> reference_no}}</td>
                                    <td class="text-center">{{\Carbon\Carbon::parse($request -> date) -> format('d-m-Y') }}</td>
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
                                    <td class="text-center">{{$request -> quotations_count}}</td>
                                    <td class="text-center">
                                        <div style="display: flex ; gap: 10px; justify-content: center">

                                        <a href="{{route('request-view' , $request -> id)}}">

                                            <i class='fa fa-eye text-primary' data-toggle="tooltip" data-placement="top" title="{{__('main.view_action')}}"
                                               id="{{$request -> id}}" style="font-size: 22px ; cursor: pointer"></i>
                                        </a>
                                        @if($request -> state < 2)
                                            <i class='fa fa-trash text-danger deleteBtn' data-toggle="tooltip" data-placement="top" title="{{__('main.delete_Action')}}"
                                               id="{{$request -> id}}" style="font-size: 22px ; cursor: pointer"></i>

                                        @endif

                                        </div>

                                    </td>
                                </tr>


                            @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Required JavaScript for Bootstrap tabs -->
    <script>
        $(document).ready(function(){
            // Enable Bootstrap tabs
            $('#profileTabs a').on('click', function (e) {
                e.preventDefault();
                $(this).tab('show');
            });

            // Optional: Save active tab to localStorage
            $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                localStorage.setItem('lastTab', $(e.target).attr('href'));
            });

            // Optional: Retrieve last active tab
            var lastTab = localStorage.getItem('lastTab');
            if (lastTab) {
                $('[href="' + lastTab + '"]').tab('show');
            }
        });

        $(document).on('click', '.deleteBtn', function() {
            // Get the quotation ID from the button value
            const requestId = $(this).attr('id');

            // Show confirmation dialog
            Swal.fire({
                title: '{{ __("main.confirm_acceptance") }}',
                text: '{{ __("main.confirm_cancel_quotation") }}',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#B57E10',
                cancelButtonColor: '#d33',
                confirmButtonText: '{{ __("main.yes_cancel") }}',
                cancelButtonText: '{{ __("main.cancel") }}'
            }).then((result) => {
                if (result.isConfirmed) {
                    let url = "{{ route('request-cancel', ':id') }}";
                    url = url.replace(':id', requestId);
                    document.location.href=url;



                }
            });
        });
    </script>

<!-- Back to top -->
<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
</div>


    <input type="hidden" id="lang" name="lang" value="{{Config::get('app.locale')}}"/>
    <script type="text/javascript">
        $(document).ready(function () {
            // Your code here
            getCountryCities($('#country_id').val() , 0);
        });

        $('#country_id').on('change', function() {
            getCountryCities(this.value , 0);
        });


        $(document).on('click', '#resetPassword', function (event) {
            console.log('clicked');
            var id = $('#id').val() ;
            event.preventDefault();
            let href = $(this).attr('data-attr');
            $.ajax({
                url: href,
                beforeSend: function () {
                    $('#loader').show();
                },
                // return the result
                success: function (result) {
                    $('#resetPasswordModal').modal("show");
                    $(".modal-body #id").val(id);
                    $(".modal-body #new_password").val("");
                    $(".modal-body #password2").val("");


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



        function getCountryCities(country_id , city_id){
            var lang = $('#lang').val();
            $.ajax({
                type:'get',
                url:'/getCountryCities' + '/' + country_id,
                dataType: 'json',

                success:function(response){
                    console.log(lang);
                    $('#city_id').empty()
                    if(response){
                        for (var i=0;i<response.length;i++){

                            var option = $('<option />').val(response[i].id).html(lang == 'ar' ?
                                response[i].name_ar : response[i].name_en);

                            // Conditionally select the option
                            if (response[i].id == $('#mcity_id').val()) {
                                option.prop('selected', true); // Set as selected if the condition matches
                            }

                            $('#city_id').append(option);


                        }

                        if(city_id > 0){
                            $("#city_id").val(city_id);
                        }

                    } else {

                    }
                }
            });
        }
    </script>
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('success') }}',
                confirmButtonColor: '#B57E10'
            });
        </script>
    @endif
<!--===============================================================================================-->
@include('cpanel.Users.passwordReset')
@include('layouts.footer_front')
</body>
</html>
