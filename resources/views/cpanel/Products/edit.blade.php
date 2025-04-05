<!DOCTYPE html>

@include('layouts.head')


<body>
<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Menu -->

        @include('layouts.sidebar' , ['slag' => 4 , 'subSlag' => 45])
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
                            <span class="text-muted fw-light">{{__('main.product_department')}} /</span> {{__('main.edit_product')}}
                        </h4>
                        <button type="button" class="btn btn-primary mb-2 ms-2"  id="saveButton"
                                style="height: 45px" onclick="valdiateForm()">
                            {{__('main.save_btn')}}  <span class="tf-icons bx bx-save"></span>&nbsp;
                        </button>
                    </div>



                    <!-- Responsive Table -->
                    <div class="card">
                        <h5 class="card-header">{{__('main.edit_product')}}</h5>
                        <form class="center" method="POST" action="{{ route('update-product') }}"
                              enctype="multipart/form-data" id="product-form">
                        @csrf
                            <div class="container-fluid" style="padding-bottom: 30px;">
                            <div class="row">
                                <div class="col-lg-3 col-md-6 col-sm-12" style="margin-top: 10px;">
                                    <div class="form-group">
                                        <label> {{__('main.code')}}  <span style="color: red ; font-size: 14px" > * </span></label>
                                        <input name="code" id="code" class="form-control @error('code') is-invalid @enderror"
                                               autofocus  required  placeholder="{{ __('main.code') }}" readonly value="{{$product -> code}}"/>
                                        @error('code')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                           </span>
                                        @enderror
                                        <input type="hidden" name="id" id="id" value="{{$product -> id}}">

                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-12" style="margin-top: 10px;">
                                    <div class="form-group">
                                        <label>{{ __('main.brand') }} <span style="color: red ; font-size: 14px" > * </span> </label>
                                        <select type="text" name="brand_id" id="brand_id"
                                                class="form-control @error('brand_id') is-invalid @enderror" autofocus  required>
                                            @foreach($brands as $brand)
                                                <option value="{{$brand -> id}}" @if($product -> brand_id == $brand -> id) selected @endif>
                                                    @if(Config::get('app.locale')=='ar' )
                                                        {{$brand -> name_ar}}
                                                    @else
                                                        {{$brand -> name_en}}
                                                    @endif
                                                </option>

                                            @endforeach

                                        </select>
                                        @error('brand_id')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror


                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-12" style="margin-top: 10px;">
                                    <div class="form-group">
                                        <label>{{ __('main.department') }} <span style="color: red ; font-size: 14px" > * </span> </label>
                                        <select type="text" name="department_id" id="department_id"
                                                class="form-control @error('department_id') is-invalid @enderror" autofocus  required>
                                            @foreach($departments as $department)
                                                <option value="{{$department -> id}}"  @if($product -> department_id == $department -> id) selected @endif>
                                                    @if(Config::get('app.locale')=='ar' )
                                                        {{$department -> name_ar}}
                                                    @else
                                                        {{$department -> name_en}}
                                                    @endif
                                                </option>

                                            @endforeach

                                        </select>
                                        @error('department_id')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror


                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-12" style="margin-top: 10px;">
                                    <div class="form-group">
                                        <label>{{ __('main.category') }}  <span style="color: red ; font-size: 14px" > * </span> </label>
                                        <input type="hidden" name="cat" id="cat" value="{{$product -> category_id}}">
                                        <select type="text" name="category_id" id="category_id"
                                                class="form-control @error('category_id') is-invalid @enderror" autofocus  required>
                                            <option value=""> {{__('main.choose')}} </option>

                                        </select>
                                        @error('category_id')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror


                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-12" style="margin-top: 10px;">
                                    <div class="form-group">
                                        <label>{{ __('main.name_ar') }} <span style="color: red ; font-size: 14px" > * </span> </label>
                                        <input  name="name_ar" id="name_ar" class="form-control @error('name_ar') is-invalid @enderror"
                                                autofocus  required  placeholder="{{ __('main.name_ar') }}" value="{{$product -> name_ar}}"/>
                                        @error('name_ar')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror


                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-12" style="margin-top: 10px;">
                                    <div class="form-group">
                                        <label>{{ __('main.name_en') }} <span style="color: red ; font-size: 14px" > * </span>  </label>
                                        <input  name="name_en" id="name_en" class="form-control @error('name_en') is-invalid @enderror"
                                                autofocus  required  placeholder="{{ __('main.name_en') }}" value="{{$product -> name_en}}"/>
                                        @error('name_en')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror


                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-12" style="margin-top: 10px;">
                                    <div class="form-group">
                                        <label>{{ __('main.short_description_ar') }}  </label>
                                        <input  name="short_description_ar" id="short_description_ar" class="form-control @error('short_description_ar') is-invalid @enderror"
                                                autofocus    placeholder="{{ __('main.short_description_ar') }}" value="{{$product -> short_description_ar}}"/>
                                        @error('short_description_ar')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror


                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-12" style="margin-top: 10px;">
                                    <div class="form-group">
                                        <label>{{ __('main.short_description_en') }}  </label>
                                        <input  name="short_description_en" id="short_description_en" class="form-control @error('short_description_en') is-invalid @enderror"
                                                autofocus    placeholder="{{ __('main.short_description_en') }}" value="{{$product -> short_description_en}}"/>
                                        @error('short_description_en')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror


                                    </div>
                                </div>
                                <div class="col-12" style="margin-top: 10px;">
                                    <div class="form-group">
                                        <label>{{ __('main.description_ar') }}  </label>
                                        <textarea  name="description_ar" id="description_ar" class="form-control @error('description_ar') is-invalid @enderror"
                                                   autofocus    rows="3" placeholder="{{ __('main.description_ar') }}"> {{$product -> description_ar}} </textarea>
                                        @error('description_ar')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror


                                    </div>
                                </div>
                                <div class="col-12" style="margin-top: 10px;">
                                    <div class="form-group">
                                        <label>{{ __('main.description_en') }}  </label>
                                        <textarea  name="description_en" id="description_en" class="form-control @error('description_en') is-invalid @enderror"
                                                   autofocus    rows="3" placeholder="{{ __('main.description_en') }}"> {{$product -> description_en}}  </textarea>
                                        @error('description_en')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror


                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12" style="margin-top: 10px;">
                                    <div class="form-group">
                                        <label> {{__('main.tag')}} <span style="color: red ; font-size: 14px" > * </span> </label>
                                        <input name="tag" id="tag" class="form-control @error('tag') is-invalid @enderror"
                                               autofocus  required  placeholder="{{ __('main.tag') }}" value="{{$product -> tag}} "/>
                                        @error('tag')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                           </span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12" style="margin-top: 10px;">
                                    <div class="form-group">
                                        <label> {{__('main.productType')}} <span style="color: red ; font-size: 14px" > * </span></label>
                                        <select name="isPrivate" id="isPrivate" class="form-control @error('isPrivate') is-invalid @enderror"
                                               autofocus  required  >
                                            <option value="0" @if($product -> isPrivate == 0) selected @endif> {{__('main.productType0')}}</option>
                                            <option value="1" @if($product -> isPrivate == 1) selected @endif> {{__('main.productType1')}}</option>

                                        </select>
                                        @error('isPrivate')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                           </span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12" style="margin-top: 10px;">
                                    <div class="form-group">
                                        <label> {{__('main.productState')}} <span style="color: red ; font-size: 14px" > * </span> </label>
                                        <select name="isAvailable" id="isAvailable" class="form-control @error('isAvailable') is-invalid @enderror"
                                                autofocus  required  >
                                            <option value="1" @if($product -> isAvailable == 1) selected @endif> {{__('main.productState0')}}</option>
                                            <option value="0" @if($product -> isAvailable == 0) selected @endif> {{__('main.productState1')}}</option>

                                        </select>
                                        @error('isAvailable')
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
                                            <img src="{{asset('images/products/' . $product->mainImg)}}" class="pickerImg" id="mainImg_img"
                                                 onclick="pickImg(0)">

                                        </div>
                                        <input class="form-control" hidden="hidden" type="file" id="mainImg" name="mainImg"
                                               accept="*">
                                    </div>


                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label> {{__('main.img')}} 1 </label>
                                        <div class="imgDiv">
                                            <img @if($product -> img1 == "")
                                                     src="{{asset('assets/img/image.png')}}"
                                                 @else
                                                     src="{{asset('images/products/' . $product->img1)}}"
                                                 @endif
                                                 class="pickerImg" id="img1_img"
                                                 onclick="pickImg(1)">

                                        </div>
                                        <input class="form-control" hidden="hidden" type="file" id="img1" name="img1"
                                               accept="*">
                                    </div>


                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label> {{__('main.img')}} 2 </label>
                                        <div class="imgDiv">
                                            <img @if($product -> img2 == "")
                                                     src="{{asset('assets/img/image.png')}}"
                                                 @else
                                                     src="{{asset('images/products/' . $product->img2)}}"
                                                 @endif class="pickerImg" id="img2_img"
                                                 onclick="pickImg(2)">

                                        </div>
                                        <input class="form-control" hidden="hidden" type="file" id="img2" name="img2"
                                               accept="*">
                                    </div>


                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label> {{__('main.img')}} 3 </label>
                                        <div class="imgDiv">
                                            <img @if($product -> img3 == "")
                                                     src="{{asset('assets/img/image.png')}}"
                                                 @else
                                                     src="{{asset('images/products/' . $product->img3)}}"
                                                 @endif class="pickerImg" id="img3_img"
                                                 onclick="pickImg(3)">

                                        </div>
                                        <input class="form-control" hidden="hidden" type="file" id="img3" name="img3"
                                               accept="*">
                                    </div>


                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6" hidden="hidden">
                                    <div class="form-group">
                                        <label> {{__('main.img')}} 4 </label>
                                        <div class="imgDiv">
                                            <img @if($product -> img4 == "")
                                                     src="{{asset('assets/img/image.png')}}"
                                                 @else
                                                     src="{{asset('images/products/' . $product->img4)}}"
                                                 @endif class="pickerImg" id="img4_img"
                                                 onclick="pickImg(4)">

                                        </div>
                                        <input class="form-control" hidden="hidden" type="file" id="img4" name="img4"
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

@include('cpanel.Products.alertModal')
@include('layouts.footer')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
    $( document ).ready(function() {

        getDepartmentCategories($('#department_id').val());


        $("#department_id").change(function () {
            console.log(this.value);
            getDepartmentCategories(this.value);
        });


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
        $("#img4").change(function () {
            readURL(this , 4);
        });



    });
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
     function valdiateForm(){
        var msg = '' ;
         var translatedText = "" ;
        if($('#brand_id').val() == ""){
             translatedText = "{{ __('main.select_brand') }}";
            msg =  translatedText + "\n" ;
        }

        if($('#department_id').val() == ""){
             translatedText = "{{ __('main.select_department') }}";
            msg +=  translatedText + "\n" ;
        }
        if($('#category_id').val() == ""){
             translatedText = "{{ __('main.select_category') }}";
            msg +=  translatedText + "\n" ;
        }
        if($('#name_ar').val() == ""){
             translatedText = "{{ __('main.name_ar_required') }}";
            msg +=  translatedText + "\n" ;
        }
        if($('#name_en').val() == ""){
            translatedText = "{{ __('main.name_en_required') }}";
            msg +=  translatedText + "\n" ;
        }
        if($('#tag').val() == ""){
            translatedText = "{{ __('main.tag_required') }}";
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
                $(" #msg").html( msg );
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
    $(document).on('click', '.cancel-modal', function(event) {
        $('#alertModal').modal("hide");
        console.log()
        id = 0 ;
    });

    function getDepartmentCategories(department){
        $.ajax({
            type:'get',
            url:'/getDepartmentCategories' + '/' + department,
            dataType: 'json',

            success:function(response){
                console.log(response);
                $('#category_id').empty();
                var translatedText = "{{ __('main.choose') }}";
                $('<option/>').val("").html(translatedText).appendTo('#category_id');

                var cat = $('#cat').val() ;
                if(response){
                    for (var i=0;i<response.length;i++){
                        if(cat == response[i].id){
                            $('<option  selected />').val(response[i].id).html(response[i].name_ar).appendTo('#category_id');
                        } else {
                            $('<option   />').val(response[i].id).html(response[i].name_ar).appendTo('#category_id');
                        }

                    }

                    $

                } else {

                }
            }
        });
    }
</script>
</body>
</html>
