<!DOCTYPE html>

@include('layouts.head')
<style>
    #product-list .dropdown-menu {
        display: block;
        position: relative;
    }
</style>

<body>
<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Menu -->

        @include('layouts.sidebar' , ['slag' => 8 , 'subSlag' => 82])
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
                        <h4 class="fw-bold py-3 mb-2 me-2">
                            <span class="text-muted fw-light">{{__('main.news_list')}} /</span> {{__('main.add_news')}}
                        </h4>
                        <button type="button" class="btn btn-primary mb-2 ms-2"  id="saveButton"
                                style="height: 45px" onclick="valdiateForm()">
                            {{__('main.save_btn')}}  <span class="tf-icons bx bx-save"></span>&nbsp;
                        </button>
                    </div>



                    <!-- Responsive Table -->
                    <div class="card">
                        <h5 class="card-header">{{__('main.add_news')}}</h5>
                        <form class="center" method="POST" action="{{ route('store-New') }}"
                              enctype="multipart/form-data" id="product-form">
                        @csrf
                            <div class="container-fluid" style="padding-bottom: 30px;">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12" style="margin-top: 10px;">
                                    <div class="form-group">
                                        <label> {{__('main.title_ar')}}  <span style="color: red ; font-size: 14px" > * </span></label>
                                        <input name="title_ar" id="title_ar" class="form-control @error('title_ar') is-invalid @enderror"
                                               autofocus   placeholder="{{ __('main.title_ar') }}" />
                                        @error('title_ar')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                           </span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12" style="margin-top: 10px;">
                                    <div class="form-group">
                                        <label>{{ __('main.title_en') }} <span style="color: red ; font-size: 14px" > * </span> </label>
                                        <input name="title_en" id="title_en" class="form-control @error('title_en') is-invalid @enderror"
                                               autofocus   placeholder="{{ __('main.title_en') }}" />
                                        @error('title_en')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror


                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top: 10px;">
                                    <div class="form-group">
                                        <label>{{ __('main.description_ar') }}  </label>
                                        <textarea name="details_ar" id="details_ar" class="form-control editor @error('details_ar') is-invalid @enderror"
                                                  autofocus   placeholder="{{ __('main.description_ar') }}" ></textarea>
                                        @error('details_ar')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror


                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top: 10px;">
                                    <div class="form-group">
                                        <label>{{ __('main.description_en') }}  </label>
                                        <textarea name="details_en" id="details_en" class="form-control editor @error('details_en') is-invalid @enderror"
                                                  autofocus    placeholder="{{ __('main.description_en') }}" ></textarea>
                                        @error('details_en')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror


                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top: 10px;">
                                    <div class="form-group">
                                        <label>{{ __('main.url') }} <span style="font-size: 14px ; color: red">*</span> </label>
                                        <input name="url" id="url" class="form-control @error('url') is-invalid @enderror"
                                                  autofocus    placeholder="{{ __('main.url') }}" >
                                        @error('url')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                       </span>
                                        @enderror


                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12" style="margin-top: 10px;">
                                    <div class="form-group">
                                        <label>{{ __('main.date') }} <span style="color: red ; font-size: 14px" > * </span> </label>
                                        <input type="datetime-local" name="date" id="date" class="form-control @error('date') is-invalid @enderror"
                                                autofocus  required  placeholder="{{ __('main.date') }}"/>
                                        @error('date')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror


                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12" style="margin-top: 10px;">
                                    <div class="form-group">
                                        <label>{{ __('main.publisher') }} <span style="color: red ; font-size: 14px" > * </span>  </label>
                                        <input  name="publisher" id="publisher" class="form-control @error('publisher') is-invalid @enderror"
                                                autofocus  required  placeholder="{{ __('main.publisher') }}"/>
                                        @error('publisher')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror


                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12" style="margin-top: 10px;">
                                    <div class="form-group">
                                        <label>{{ __('main.isVisibleNew') }}  <span style="color: red ; font-size: 14px">*</span> </label>
                                        <select id="isVisible" name="isVisible" class="form-control @error('publisher') is-invalid @enderror" required>
                                            <option value="0">{{__('main.isVisible0')}}</option>
                                            <option value="1" selected>{{__('main.isVisible1')}}</option>
                                        </select>
                                        @error('isVisible')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror


                                    </div>
                                </div>



                            </div>
                                <div class="row" style="margin-top: 20px">
                                    <div class="col-lg-3 col-md-4 col-sm-6">
                                        <div class="form-group">
                                            <label> {{__('main.mainImg')}}  <span style="font-size: 14px ; color: red"> * </span></label>
                                            <div class="imgDiv">
                                                <img src="{{asset('assets/img/image.png')}}" class="pickerImg" id="mainImg_img"
                                                     onclick="pickImg(0)">

                                            </div>
                                            <input class="form-control" hidden="hidden" type="file" id="mainImg" name="mainImg"
                                                   accept="*">
                                        </div>


                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-6">
                                        <div class="form-group">
                                            <label> {{__('main.imgS')}} 1 </label>
                                            <div class="imgDiv">
                                                <img src="{{asset('assets/img/image.png')}}" class="pickerImg" id="img1_img"
                                                     onclick="pickImg(1)">

                                            </div>
                                            <input class="form-control" hidden="hidden" type="file" id="img1" name="img1"
                                                   accept="*">
                                        </div>


                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-6">
                                        <div class="form-group">
                                            <label> {{__('main.imgS')}} 2 </label>
                                            <div class="imgDiv">
                                                <img src="{{asset('assets/img/image.png')}}" class="pickerImg" id="img2_img"
                                                     onclick="pickImg(2)">

                                            </div>
                                            <input class="form-control" hidden="hidden" type="file" id="img2" name="img2"
                                                   accept="*">
                                        </div>


                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-6">
                                        <div class="form-group">
                                            <label> {{__('main.imgS')}} 3 </label>
                                            <div class="imgDiv">
                                                <img src="{{asset('assets/img/image.png')}}" class="pickerImg" id="img3_img"
                                                     onclick="pickImg(3)">

                                            </div>
                                            <input class="form-control" hidden="hidden" type="file" id="img3" name="img3"
                                                   accept="*">
                                        </div>


                                    </div>

                                </div>


                            </div>

                        </form>

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
@include('cpanel.composition.alertModal')
@include('layouts.footer')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>

    function readURL(input , which) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                if(which == 0){
                    $('#mainImg_img').attr('src', e.target.result);
                }
                if(which == 1){
                    $('#img1_img').attr('src', e.target.result);
                }
                if(which == 2){
                    $('#img2_img').attr('src', e.target.result);
                }
                if(which == 3){
                    $('#img3_img').attr('src', e.target.result);
                }
                if(which == 4){
                    $('#img4_img').attr('src', e.target.result);
                }


            }
            reader.readAsDataURL(input.files[0]);

        }
    }

    function pickImg(which){
        if(which == 0){
            $("#mainImg").trigger("click");
        }
        if(which == 1){
            $("#img1").trigger("click");
        }
        if(which == 2){
            $("#img2").trigger("click");
        }
        if(which == 3){
            $("#img3").trigger("click");
        }
        if(which == 4){
            $("#img4").trigger("click");
        }
    }


    $("#mainImg").change(function () {
        readURL(this , 0);
    });
    $("#img1").change(function () {
        readURL(this , 1);
    });
    $("#img2").change(function () {
        readURL(this , 2);
    });
    $("#img3").change(function () {
        readURL(this , 3);
    });


    var items = [] ;
    var deleted_index = -1 ;
    $( document ).ready(function() {
        $('.editor').each(function(index) {
            // Ensure the element has a unique ID (required by CKEditor)
            if (!this.id) {
                this.id = 'editor_' + index;
            }

            CKEDITOR.replace(this.id , { versionCheck: false}); // Pass the ID, not the element or class
        });
        //get date
        const input = document.getElementById('date');
        const now = new Date();

// Pad single digits to 2 places
        const pad = (num) => String(num).padStart(2, '0');

        const formatted = `${now.getFullYear()}-${pad(now.getMonth()+1)}-${pad(now.getDate())}T${pad(now.getHours())}:${pad(now.getMinutes())}`;

        input.value = formatted;

    });
     function valdiateForm(){
        var msg = '' ;
         var translatedText = "" ;
        if($('#title_ar').val() == ""){
             translatedText = "{{ __('main.title_ar_required') }}";
            msg =  translatedText + "\n" ;
        }

        if($('#title_en').val() == ""){
             translatedText = "{{ __('main.title_en_required') }}";
            msg +=  translatedText + "\n" ;
        }
        if($('#details_ar').val() == ""){
             translatedText = "{{ __('main.details_ar_required') }}";
            msg +=  translatedText + "\n" ;
        }
        if($('#details_en').val() == ""){
             translatedText = "{{ __('main.details_en_required') }}";
            msg +=  translatedText + "\n" ;
        }
        if($('#publisher').val() == ""){
            translatedText = "{{ __('main.publisher_required') }}";
            msg +=  translatedText + "\n" ;
        }

         if($('#mainImg').val() == ""){
             translatedText = "{{ __('main.mainimg_required') }}";
             msg +=  translatedText + "\n" ;
         }
         if($('#isVisible').val() == ""){
             translatedText = "{{ __('main.isVisible_required') }}";
             msg +=  translatedText + "\n" ;
         }
        if(msg == ''){
            $('#product-form').submit();

        } else {
            showAlert(msg);
            return ;
        }
    }
    function showAlert(msg){
        let href = $(this).attr('data-attr');
        $.ajax({
            url: href,
            beforeSend: function() {
                $('#loader').show();
            },
            // return the result
            success: function(result) {
                $('#alertModal').modal("show");
                $(" #msg").html( msg.replace(/\n/g, "<br>") );
            },
            complete: function() {
                $('#loader').hide();
            },
            error: function(jqXHR, testStatus, error) {
                console.log(error);

                $('#loader').hide();
            },
            timeout: 8000
        })
    }
    $(document).on('click', '.cancel-modal2', function(event) {
        console.log('cancel-modal2');
        $('#alertModal').modal("hide");
    });


    $(document).on('click', '.cancel-modal', function(event) {
        $('#deleteModal').modal("hide");
        deleted_index = -1 ;
    });

    $(document).on('click', '.btnConfirmDelete', function(event) {

        confirmDelete();
    });

    function confirmDelete(){
        if(deleted_index > -1){
            items.splice(deleted_index , 1);
            $('#deleteModal').modal("hide");
            setItems(1)
        }
    }



</script>
</body>
</html>
