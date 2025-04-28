<!DOCTYPE html>

@include('layouts.head')

<style>
    .form-group {
        margin-top: 10px ;
    }
</style>

<body>
<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Menu -->

        @include('layouts.sidebar' , ['slag' => 0 , 'subSlag' => 0 ])
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
                        <h4 class="fw-bold py-3" style="margin-bottom: 0">
                            <span class="text-muted fw-light">{{__('main.dashboard')}} /</span> {{__('main.my_profile')}}
                        </h4>

                    </div>

                  @include('flash-message')

                    <!-- Responsive Table -->
                    <div class="card">
                        <h5 class="card-header">{{__('main.my_profile')}}</h5>
                        <div class="card-body">
                            <div class="container-fluid">
                            <form class="center" method="POST" action="{{ route('store-user') }}"
                                  enctype="multipart/form-data" >
                                @csrf
                               <h2 style="color: #B57E10 ; font-size: 18px"> {{__('main.account_info')}} </h2>
                               <div class="row" style="padding:25px;border:solid 2px #eee;border-radius:15px;">
                                   <div class="col-lg-6 col-md-6 col-sm-12">
                                       <div class="form-group">
                                           <label> {{__('main.name')}} <span style="font-size: 14px ; color: red">*</span></label>
                                           <input type="text" name="name" id="name"
                                                  class="form-control @error('name') is-invalid @enderror"
                                                  placeholder="{{ __('main.name') }}" autofocus
                                                   value="{{$user -> name}}" required/>
                                           @error('name')
                                           <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                           @enderror

                                           <input id="id" name="id" type="hidden" value="{{$user -> id}}"/>

                                       </div>
                                   </div>

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

                                   <div class="col-lg-6 col-md-6 col-sm-12">
                                       <div class="form-group">
                                           <label> {{__('main.email')}} <span style="font-size: 14px ; color: red">*</span></label>
                                           <input type="text" name="email" id="email"
                                                  class="form-control @error('email') is-invalid @enderror"
                                                  placeholder="{{ __('main.email') }}" autofocus
                                                  value="{{$user -> email}}" required/>
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

                            </form>

                                @if($user -> type == 1)
                                    <form class="center" method="POST" action="{{ route('store-supplier') }}"
                                          enctype="multipart/form-data" >
                                    @csrf

                                        <h2 style="color: #B57E10 ; font-size: 18px">
                                            {{__('main.personal_info')}}  <span class="badge bg-info">({{__('main.user1')}}) </span>
                                        </h2>


                                    </form>

                                @elseif($user -> type == 2)
                                    <form class="center" method="POST" action="{{ route('update-client') }}"
                                          enctype="multipart/form-data" >
                                        @csrf
                                        <h2 style="color: #B57E10 ; font-size: 18px">
                                            {{__('main.personal_info')}}  <span class="badge bg-primary">({{__('main.user2')}}) </span>
                                        </h2>
                                    </form>
                                @endif
                            </div>

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

@include('cpanel.Users.passwordReset')
@include('layouts.footer')
<script type="text/javascript">
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
</script>
</body>
</html>
