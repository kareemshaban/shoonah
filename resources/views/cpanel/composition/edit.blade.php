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
                            <span class="text-muted fw-light">{{__('main.material_list')}} /</span> {{__('main.composition_edit')}}
                        </h4>
                        <button type="button" class="btn btn-primary mb-2 ms-2"  id="saveButton"
                                style="height: 45px" onclick="valdiateForm()">
                            {{__('main.save_btn')}}  <span class="tf-icons bx bx-save"></span>&nbsp;
                        </button>
                    </div>



                    <!-- Responsive Table -->
                    <div class="card">
                        <h5 class="card-header">{{__('main.composition_create')}}</h5>
                        <form class="center" method="POST" action="{{ route('update-compositions') }}"
                              enctype="multipart/form-data" id="product-form">
                        @csrf
                            <div class="container-fluid" style="padding-bottom: 30px;">
                                <input type="hidden" name="id" id="id"  value="{{$item -> id}}" />
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-12" style="margin-top: 10px;">
                                    <div class="form-group">
                                        <label> {{__('main.code')}}  <span style="color: red ; font-size: 14px" > * </span></label>
                                        <input name="code" id="code" class="form-control @error('code') is-invalid @enderror"
                                               autofocus  required  placeholder="{{ __('main.code') }}" readonly value="{{$item -> code}}"/>
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
                                                <option value="{{$department -> id}}"
                                                @if($department -> id == $item -> department_id ) selected @endif>
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
                                        <input type="hidden"  name="cat_id" id="cat_id" value="{{$item -> category_id}}" />
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
                                                autofocus  required  placeholder="{{ __('main.name_ar') }}" value="{{$item -> name_ar}}"/>
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
                                                autofocus  required  placeholder="{{ __('main.name_en') }}"  value="{{$item -> name_en}}"/>
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
                                                   autofocus    rows="3" placeholder="{{ __('main.description_ar') }}"> {{$item ->description_ar }} </textarea>
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
                                                   autofocus    rows="3" placeholder="{{ __('main.description_en') }}"> {{$item ->description_en }} </textarea>
                                        @error('description_en')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror


                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9" style="margin-top: 10px;">
                                    <div class="form-group">
                                        <label>{{ __('main.formula_equation') }}  </label>
                                        <textarea  name="formula_equation" id="formula_equation" class="form-control @error('formula_equation') is-invalid @enderror"
                                                   autofocus    rows="3" placeholder="{{ __('main.formula_equation') }}"> {{$item ->formula_equation }} </textarea>
                                        @error('formula_equation')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror


                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3" style="margin-top: 10px;">
                                    <div class="form-group">
                                        <label> {{__('main.file')}}  </label>
                                        <div class="imgDiv">
                                            <img src="{{asset('assets/img/pdf.png')}}" class="pickerImg" id="mainImg_img"
                                                 onclick="pickImg()">
                                        </div>
                                        <div style="@if($item -> file == '') display: none ; @else display: flex ; @endif  gap: 10px ; align-items: center ;" id="path-delete">
                                            <label id="path" style="font-size: 12px ; color: grey ;text-align: center;">
                                            <a href="{{ asset('images/compositions/' . $item->file) }}" target="_blank"> {{$item -> file}} </a>
                                            </label>
                                            <i class='bx bxs-trash text-danger' onclick="deleteFile()" style="font-size: 20px ; cursor: pointer"></i>
                                            <input type="hidden" id="isFileRemoved" name="isFileRemoved" value="0">
                                        </div>

                                        <input class="form-control" hidden="hidden" type="file" id="file" name="file"
                                               accept="application/pdf">
                                    </div>


                                </div>

                            </div>
                                <hr style="height: 3px">
                                <div class="row" style=" margin-top: 10px">
                                    <div class="col-lg-12 col-md-12 col-sm-12" >
                                        <input type="hidden" id="lang" name="lang" value="{{Config::get('app.locale')}}"/>
                                        <div class="form-group">
                                            <label> {{__('main.material')}} <span style="font-size: 14px ; color: red"> * </span> </label>
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
                            <div class="row"  style="margin-top: 10px;">
                                <div class="col-lg-4 col-md-4 col-sm-12" >
                                    <div class="form-group">
                                        <label> {{__('main.cost')}}  <span style="color: red ; font-size: 14px" > * </span></label>
                                        <input name="cost" id="cost" class="form-control @error('cost') is-invalid @enderror"
                                               autofocus  required  placeholder="{{ __('main.code') }}" readonly value="{{$item -> cost}}"/>
                                        @error('cost')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                           </span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12" >
                                    <div class="form-group">
                                        <label>{{ __('main.additional_cost') }} <span style="color: red ; font-size: 14px" > * </span> </label>
                                        <input type="number" step="any" name="additional_cost" id="additional_cost"
                                                class="form-control @error('additional_cost') is-invalid @enderror"
                                               autofocus  required value="{{$item -> additional_cost}}"/>

                                        @error('additional_cost')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror


                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12" >
                                    <div class="form-group">
                                        <label>{{ __('main.total_cost') }} <span style="color: red ; font-size: 14px" > * </span> </label>
                                        <input type="number" step="any" name="total_cost" id="total_cost"
                                               class="form-control @error('total_cost') is-invalid @enderror"
                                               autofocus  required readonly value="{{$item -> total_cost}}"/>

                                        @error('total_cost')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror


                                    </div>
                                </div>
                            </div>
                                <div class="row" style="margin-top: 10px">
                                    <div class="col-lg-12 col-md-12 col-sm-12" >
                                        <div class="form-group">
                                            <label>{{ __('main.notes') }}  </label>
                                            <textarea type="text"  name="notes" id="notes" rows="3"
                                                   class="form-control @error('notes') is-invalid @enderror"
                                                   autofocus  > {{$item -> notes}} </textarea>

                                            @error('notes')
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
@include('cpanel.composition.deleteModal')
@include('cpanel.composition.alertModal')
@include('layouts.footer')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
    var items = [] ;
    var deleted_index = -1 ;
    $( document ).ready(function() {

        // ajax request to get items !
        $.ajax({
            type:'get',
            url:'/getCompositionsItems' + '/' + $('#id').val(),
            dataType: 'json',
            success:function(response){
                console.log(response);
                var item = {} ;
                for(let i = 0 ; i < response.length ; i++){
                     item = {
                        'material_id': response[i].material_id,
                        'name': lang == 'ar' ? response[i].material_name_ar : response[i].material_name_en,
                        'unit_id': response[i].unit_id ,
                        'priceOfHundred': response[i].priceOfHundred ,
                        'quantity': response[i].quantity ,
                        'materialCost': response[i].cost ,
                    }
                    items.push(item);
                }
                setItems(1);
                console.log(items);

            }
        });



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

         if(items.length == 0){
             translatedText = "{{ __('main.must_enter_items') }}";
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

    function getDepartmentCategories(department){
        $.ajax({
            type:'get',
            url:'/getDepartmentCategories' + '/' + department,
            dataType: 'json',

            success:function(response){
                console.log(response);
                $('#category_id').empty();
                let cat_id = $('#cat_id').val();
                var translatedText = "{{ __('main.choose') }}";

                $('<option />').val("").html(translatedText).appendTo('#category_id');

                if(response){
                    for (var i=0;i<response.length;i++){
                        if(cat_id == response[i].id){
                            $('<option selected/>').val(response[i].id).html(response[i].name_ar).appendTo('#category_id');

                        } else {
                            $('<option />').val(response[i].id).html(response[i].name_ar).appendTo('#category_id');

                        }
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
                var lang = $('#lang').val() ;
                var item = {
                    'material_id': response.id,
                    'name': lang == 'ar' ? response.name_ar : response.name_en,
                    'unit_id': response.unit_id ,
                    'priceOfHundred': response.priceOfHundred ,
                    'quantity': 0 ,
                    'materialCost': 0
                }

                items.push(item);

                setItems(1);





            } ,
            error: function (err){

            }
        });

    });

    $(document).on('change keyup','.quantity',function (e) {
        const input = e.target;
        const cursorPosition = input.selectionStart;
        console.log($(this).val())
        var row = $(this).closest('tr');
        const rowId = row.attr('data-row-id'); // Use a unique identifier

        var index = row.attr('data-item-index');

        var quantity = parseFloat($(this).val()) ;
        var priceOfHundere = items[index]['priceOfHundred'];

        items[index]['quantity']= quantity;
        var cost = quantity / 100 * priceOfHundere ;
        items[index]['materialCost']= cost;

        const updatedRow = document.querySelector(`tr[data-row-id="${rowId}"]`);
        console.log(updatedRow);
        const newInput = updatedRow.querySelector(`[name="materialCost[]"], [id="materialCost[]"]`);
        newInput.value = cost ;
        setItems(0);
    });

    $(document).on('click', '.deleteBtn', function(event) {
        var row = $(this).closest('tr');
        deleted_index = row.attr('data-item-index');
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

                $('#loader').hide();
            },
            timeout: 8000
        })

    });
    function setItems(chaneg_html){
        var html = '' ;
        var total = 0 ;
        for (let i = 0 ; i < items.length ; i ++){

                html += '<tr data-item-index="' + i + '" data-row-id="' + items[i].material_id + '">';

                html += `<td class="text-center" hidden="hidden"> <input id="material_id[]" name="material_id[]" value="${items[i].material_id}" /> </td>`;
                html += `<td class="text-center"> ${items[i].name} </td>`;
                var unit0 = "{{ __('main.unit0') }}";
                var unit1 = "{{ __('main.unit1') }}";
                if (items[i].unit_id == 0) {
                    html += `<td class="text-center"> ${unit0} </td>`;
                } else {
                    html += `<td class="text-center"> ${unit1} </td>`;
                }
                html += `<td class="text-center"> ${items[i].priceOfHundred} </td>`;
                html += `<td class="text-center">
                                 <input id="quantity[]"  name="quantity[]"  type="number" step="any" class="form-control quantity" required value="${items[i].quantity}"/>
                             </td>`;
                html += `<td class="text-center">
                                 <input id="materialCost[]"  name="materialCost[]" type="text" class="form-control" required readonly value="${items[i].materialCost}"/>
                             </td>`;
                var delete_action = "{{ __('main.delete_action') }}";
                html += ` <td class="text-center">
                                                <i class='bx bxs-trash text-danger deleteBtn' data-toggle="tooltip" data-placement="top" title="${delete_action}"
                                                  data-id="${items[i].id}" style="font-size: 25px ; cursor: pointer"></i>
                                        </td>`;


                html += '</tr>';


            total+= items[i].materialCost ;
        }
        if(chaneg_html == 1) {
            $('#product-table').html(html);
        }
        $('#cost').val(total.toFixed(2));
        var additional_cost = $('#additional_cost').val();
        if(additional_cost == ""){
            $('#additional_cost').val(0);
            $('#total_cost').val(total.toFixed(2));
        } else {
            var net = Number(total) + Number(additional_cost);
            $('#total_cost').val(net.toFixed(2));
        }
    }


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

    function pickImg(){
        $("#file").trigger("click");
    }

    $("#file").change(function () {
        if (this.files && this.files[0]) {
            const file = this.files[0];
            $('#path').html(file.name);
            document.getElementById('path-delete').style.display = 'flex';
            $("#isFileRemoved").val(0);
         } else {
            $('#path').html('');
            document.getElementById('path-delete').style.display = 'none';
            $("#isFileRemoved").val(1);
        }
    });

    function deleteFile(){
        document.getElementById('file').value = '';
        $('#path').html('');
        document.getElementById('path-delete').style.display = 'none';
        $("#isFileRemoved").val(1);
    }



</script>
</body>
</html>
