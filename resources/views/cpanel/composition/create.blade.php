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

        @include('layouts.sidebar' , ['slag' => 5 , 'subSlag' => 53])
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
                            <span class="text-muted fw-light">{{__('main.material_list')}} /</span> {{__('main.composition_create')}}
                        </h4>
                        <button type="button" class="btn btn-primary mb-2 ms-2"  id="saveButton"
                                style="height: 45px" onclick="valdiateForm()">
                            {{__('main.save_btn')}}  <span class="tf-icons bx bx-save"></span>&nbsp;
                        </button>
                    </div>



                    <!-- Responsive Table -->
                    <div class="card">
                        <h5 class="card-header">{{__('main.composition_create')}}</h5>
                        <form class="center" method="POST" action="{{ route('store-composition') }}"
                              enctype="multipart/form-data" id="product-form">
                        @csrf
                            <div class="container-fluid" style="padding-bottom: 30px;">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-12" style="margin-top: 10px;">
                                    <div class="form-group">
                                        <label> {{__('main.code')}}  <span style="color: red ; font-size: 14px" > * </span></label>
                                        <input name="code" id="code" class="form-control @error('code') is-invalid @enderror"
                                               autofocus  required  placeholder="{{ __('main.code') }}" readonly/>
                                        @error('code')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                           </span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12" style="margin-top: 10px;">
                                    <div class="form-group">
                                        <label>{{ __('main.department') }} <span style="color: red ; font-size: 14px" > * </span> </label>
                                        <select type="text" name="department_id" id="department_id"
                                                class="form-control @error('department_id') is-invalid @enderror" autofocus  required>
                                            @foreach($departments as $department)
                                                <option value="{{$department -> id}}">
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
                                <div class="col-lg-4 col-md-4 col-sm-12" style="margin-top: 10px;">
                                    <div class="form-group">
                                        <label>{{ __('main.category') }}  <span style="color: red ; font-size: 14px" > * </span> </label>
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
                                <div class="col-lg-6 col-md-6 col-sm-12" style="margin-top: 10px;">
                                    <div class="form-group">
                                        <label>{{ __('main.name_ar') }} <span style="color: red ; font-size: 14px" > * </span> </label>
                                        <input  name="name_ar" id="name_ar" class="form-control @error('name_ar') is-invalid @enderror"
                                                autofocus  required  placeholder="{{ __('main.name_ar') }}"/>
                                        @error('name_ar')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror


                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12" style="margin-top: 10px;">
                                    <div class="form-group">
                                        <label>{{ __('main.name_en') }} <span style="color: red ; font-size: 14px" > * </span>  </label>
                                        <input  name="name_en" id="name_en" class="form-control @error('name_en') is-invalid @enderror"
                                                autofocus  required  placeholder="{{ __('main.name_en') }}"/>
                                        @error('name_en')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror


                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12" style="margin-top: 10px;">
                                    <div class="form-group">
                                        <label>{{ __('main.description_ar') }}  </label>
                                        <textarea  name="description_ar" id="description_ar" class="form-control @error('description_ar') is-invalid @enderror"
                                                   autofocus    rows="3" placeholder="{{ __('main.description_ar') }}"> </textarea>
                                        @error('description_ar')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror


                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12" style="margin-top: 10px;">
                                    <div class="form-group">
                                        <label>{{ __('main.description_en') }}  </label>
                                        <textarea  name="description_en" id="description_en" class="form-control @error('description_en') is-invalid @enderror"
                                                   autofocus    rows="3" placeholder="{{ __('main.description_en') }}"> </textarea>
                                        @error('description_en')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror


                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top: 10px;">
                                    <div class="form-group">
                                        <label>{{ __('main.formula_equation') }}  </label>
                                        <textarea  name="formula_equation" id="formula_equation" class="form-control @error('formula_equation') is-invalid @enderror"
                                                   autofocus    rows="3" placeholder="{{ __('main.formula_equation') }}"> </textarea>
                                        @error('formula_equation')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror


                                    </div>
                                </div>

                            </div>
                                <hr style="height: 3px">
                                <div class="row" style=" margin-top: 10px">
                                    <div class="col-lg-12 col-md-12 col-sm-12" >
                                        <input type="hidden" id="lang" name="lang" value="{{Config::get('app.locale')}}"/>
                                        <div class="form-group">
                                            <label> {{__('main.material')}} </label>
                                            <div style="display: flex ; gap: 10px ; align-items: center ; border: solid 1px grey; padding: 5px ; border-radius: 10px ">
                                                <i class='bx bx-barcode-reader' style="font-size: 30px"></i>
                                                <input class="form-control" id="item" name="item" value="" placeholder="{{__('main.search_material')}}">
                                            </div>



                                        </div>


                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div id="product-list">

                                        </div>
                                    </div>
                                </div>



                            <div class="table-responsive  text-nowrap">
                                <table class="table table-striped table-hover" >
                                    <thead>
                                    <tr class="text-nowrap">
                                        <th class="text-center" hidden="hidden">#</th>
                                        <th class="text-center"> {{__('main.name')}}</th>
                                        <th class="text-center">{{__('main.unit')}}</th>
                                        <th class="text-center">{{__('main.priceOfHundred')}}</th>
                                        <th class="text-center">{{__('main.quantity')}}</th>
                                        <th class="text-center">{{__('main.cost')}}</th>
                                        <th class="text-center">{{__('main.actions')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody id="product-table" >



                                    </tbody>
                                </table>
                            </div>
                            <hr style="height: 3px">
                            <div class="row" >
                                <div class="col-lg-4 col-md-4 col-sm-12" style="margin-top: 10px;">
                                    <div class="form-group">
                                        <label> {{__('main.cost')}}  <span style="color: red ; font-size: 14px" > * </span></label>
                                        <input name="cost" id="cost" class="form-control @error('cost') is-invalid @enderror"
                                               autofocus  required  placeholder="{{ __('main.code') }}" readonly/>
                                        @error('cost')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                           </span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12" style="margin-top: 10px;">
                                    <div class="form-group">
                                        <label>{{ __('main.additional_cost') }} <span style="color: red ; font-size: 14px" > * </span> </label>
                                        <input type="number" step="any" name="additional_cost" id="additional_cost"
                                                class="form-control @error('additional_cost') is-invalid @enderror"
                                               autofocus  required />

                                        @error('additional_cost')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror


                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12" style="margin-top: 10px;">
                                    <div class="form-group">
                                        <label>{{ __('main.total_cost') }} <span style="color: red ; font-size: 14px" > * </span> </label>
                                        <input type="number" step="any" name="total_cost" id="total_cost"
                                               class="form-control @error('total_cost') is-invalid @enderror"
                                               autofocus  required readonly />

                                        @error('total_cost')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror


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
        $.ajax({
            type:'get',
            url:'/getCompositionsCode',
            dataType: 'json',
            success:function(response){
                console.log(response);
                if(response){
                    $('#code').val(response);
                }

            }
        });

        $('#cost').val(0);
        $('#additional_cost').val(0);
        $('#total_cost').val(0);
        $('#item').val("");
        $('#product-list').html("");
        $("#additional_cost").change(function () {
            let cost =  $('#cost').val();
            let additional = $(this).val();
            let total = Number(cost) + Number(additional) ;
            $('#total_cost').val(total);
        });
        $("#additional_cost").keyup(function () {
            let cost =  $('#cost').val();
            let additional = $(this).val();
            let total = Number(cost) + Number(additional) ;
            $('#total_cost').val(total);
        });

        getDepartmentCategories($('#department_id').val());

        $("#department_id").change(function () {
            console.log(this.value);
            getDepartmentCategories(this.value);
        });

        $('#item').keyup(function (){
            var name = $(this).val();
            autoCompelete(name);
        });

    });
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

                if(response){
                    for (var i=0;i<response.length;i++){
                        $('<option/>').val(response[i].id).html(response[i].name_ar).appendTo('#category_id');
                    }


                } else {

                }
            }
        });
    }

    function autoCompelete(name){
        if (name != '') {
            $.ajax({
                type: 'get',
                url: '/materialAutoComplete' + '/' + name,
                dataType: 'json',

                success: function (response) {

                    var lang = $('#lang').val() ;
                    var html = "<ul class='dropdown-menu'>";
                    $.each(response , function (key , value){
                        if(lang == 'ar'){
                            html += `<li style="width: 100%" id=${value.id} class="product-item">
                                  <a href="#" class="dropdown-item" style="display: flex; align-items: center;">

                                    <!-- Text -->
                                        ${value.name_ar}
                                  </a>
                                </li>`;
                        } else {
                            html += `<li style="width: 100%" id=${value.id} class="product-item">
                                      <a href="#" class="dropdown-item" style="display: flex; align-items: center;">
                                        <!-- Text -->
                                        ${value.name_en}
                                      </a>
                                    </li>`;
                        }

                    });
                    html += '</ul>' ;
                    $('#product-list').html(html);
                }
            });
        } else {
            // hide autocomplete element
            $('#product-list').html("");
        }

    }

    $(document).on('click', '.product-item', function(event) {
        let item_id = $(this).attr('id');
        console.log(item_id);
        $.ajax({
            type: 'get',
            url: '/getMaterial' + '/' + item_id ,
            dataType: 'json',

            success: function (response) {
                console.log(response);
                $('#item').val("");
                $('#product-list').html("");
                var html = '' ;
                var lang = $('#lang').val() ;

                    html += '<tr>';
                        if(lang == 'ar'){
                            html += `<td class="text-center" hidden="hidden"> <input id="material_id" name="material_id" value="${response.id}" /> </td>` ;
                            html += `<td class="text-center"> ${response.name_ar} </td>`;
                            var unit0 = "{{ __('main.unit0') }}";
                            var unit1 = "{{ __('main.unit1') }}";
                            if(response.unit_id == 0){
                                html += `<td class="text-center"> ${unit0} </td>`;
                            } else {
                                html += `<td class="text-center"> ${unit1} </td>`;
                            }
                            html += `<td class="text-center"> ${response.priceOfHundred} </td>`;
                            html += `<td class="text-center">
                                 <input id="quantity"  name="quantity" type="number" step="any" class="form-control" required/>
                             </td>`;
                            html += `<td class="text-center">
                                 <input id="materialCost"  name="materialCost" type="text" class="form-control" required readonly/>
                             </td>`;
                            var delete_action = "{{ __('main.delete_action') }}";
                            html += ` <td class="text-center">
                                                <i class='bx bxs-trash text-danger deleteBtn' data-toggle="tooltip" data-placement="top" title="${delete_action}"
                                                  data-id="${response.id}" style="font-size: 25px ; cursor: pointer"></i>
                                        </td>`;

                        }
                        else {
                            html += `<td class="text-center"> 0</td>` ;
                            html += `<td class="text-center"> ${response.name_en} </td>`;
                            var unit0 = "{{ __('main.unit0') }}";
                            var unit1 = "{{ __('main.unit1') }}";
                            if(response.unit_id == 0){
                                html += `<td class="text-center"> ${unit0} </td>`;
                            } else {
                                html += `<td class="text-center"> ${unit1} </td>`;
                            }
                            html += `<td class="text-center"> ${response.priceOfHundred} </td>`;
                            html += `<td class="text-center">
                                 <input id="quantity"  name="quantity" type="number" step="any"  class="form-control" required />
                             </td>`;
                            html += `<td class="text-center">
                                 <input id="materialCost"  name="materialCost" type="text"  class="form-control" required readonly/>
                             </td>`;
                            html += ` <td class="text-center">
                                                <i class='bx bxs-trash text-danger deleteBtn' data-toggle="tooltip" data-placement="top" title="${delete_action}"
                                                  data-id="${response.id}" style="font-size: 25px ; cursor: pointer"></i>
                                        </td>`;
                        }
                    html += '</tr>' ;


                $('#product-table').html(html);

            } ,
            error: function (err){

            }
        });

    });
</script>
</body>
</html>
