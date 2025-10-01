<!DOCTYPE html>

@include('layouts.head')

<style>
    a.no-hover:hover {
        text-decoration: none !important;
        color: inherit !important;
    }

    a.no-hover i {
        color: inherit !important;
    }
</style>
<body>
<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Menu -->

        @include('layouts.sidebar' , ['slag' => 4 , 'subSlag' => 44])
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
                            <span class="text-muted fw-light">{{__('main.product_department')}} /</span> {{__('main.product_list')}}
                        </h4>
                        @if(auth() -> user() -> type == 0)
                      <a href="{{route('create-product')}}">  <button type="button" class="btn btn-primary"  id="createButton" style="height: 45px">
                            {{__('main.add_new')}}  <span class="tf-icons bx bx-plus"></span>&nbsp;
                        </button>
                      </a>
                        @endif
                    </div>

                     <input type="hidden" id="supplier_id" name="supplier_id" value="{{auth() -> user() -> supplier_id}}"/>

                    <!-- Responsive Table -->
                    <div class="card">
                        <h5 class="card-header">{{__('main.product_list')}}</h5>
                        @include('flash-message')
                        <div class="table-responsive  text-nowrap">
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr class="text-nowrap">
                                    <th class="text-center">#</th>
                                    <th class="text-center"> {{__('main.mainImg')}}</th>
                                    <th class="text-center"> {{__('main.name_ar')}}</th>
                                    <th class="text-center">{{__('main.name_en')}}</th>
                                    <th class="text-center">{{__('main.brand')}}</th>
                                    <th class="text-center">{{__('main.department')}}</th>
                                    <th class="text-center">{{__('main.category')}}</th>
                                    <th class="text-center">{{__('main.productType')}}</th>
                                    <th class="text-center">{{__('main.productState')}}</th>
                                    <th class="text-center">{{__('main.isReviewed')}}</th>
                                    <th class="text-center">{{__('main.isTop')}}</th>
                                    @if(auth() -> user() -> type == 1)
                                        <th class="text-center">{{__('main.quantity')}}</th>
                                        <th class="text-center">{{__('main.price')}}</th>
                                    @endif

                                    <th class="text-center">{{__('main.actions')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <th scope="row" class="text-center">{{$loop -> index +1}}</th>
                                        <td class="text-center">
                                            <img src="{{ asset('images/products/' . $product->mainImg) }}" width="50" />
                                        </td>
                                        <td class="text-center">{{$product -> name_ar}}</td>
                                        <td class="text-center">{{$product -> name_en}}</td>
                                        <td class="text-center">
                                            @if(Config::get('app.locale')=='ar' )
                                            {{$product -> brand_ar}}
                                                @else
                                                {{$product -> brand_en}}
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if(Config::get('app.locale')=='ar' )
                                                {{$product -> department_ar}}
                                            @else
                                                {{$product -> department_en}}
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if(Config::get('app.locale')=='ar' )
                                                {{$product -> category_ar}}
                                            @else
                                                {{$product -> category_en}}
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if($product -> isPrivate == 0)
                                                <span class="badge bg-primary">{{__('main.productType0')}}</span>
                                            @else
                                                <span class="badge bg-info">{{__('main.productType1')}}</span>

                                            @endif

                                        </td>
                                        <td class="text-center">
                                            @if($product -> isAvailable == 0)
                                                <span class="badge bg-danger">{{__('main.productState1')}}</span>
                                            @else
                                                <span class="badge bg-success">{{__('main.productState0')}}</span>

                                            @endif

                                        </td>
                                        <td class="text-center">
                                            @if($product -> isReviewed == 0)
                                                <span class="badge bg-primary">{{__('main.isReviewed0')}}</span>
                                            @elseif($product -> isReviewed == 1)
                                                <span class="badge bg-success">{{__('main.isReviewed1')}}</span>
                                            @elseif($product -> isReviewed == 2)
                                                <span class="badge bg-danger">{{__('main.isReviewed1')}}</span>
                                            @endif

                                        </td>
                                        <td class="text-center">
                                            @if($product -> isTop == 0)
                                                <span class="badge bg-info">{{__('main.no')}}</span>
                                            @else
                                                <span class="badge bg-success">{{__('main.yes')}}</span>
                                            @endif

                                        </td>
                                        @if(auth() -> user() -> type == 1)
                                        <td class="text-center"> {{$product -> quantity}} </td>
                                        <td class="text-center"> {{$product -> price}} </td>
                                        @endif
                                        <td class="text-center">
                                            @if(auth() -> user() -> type == 0)

                                                <div style="display: flex ; gap: 10px ; justify-content: center ">
                                                    <a href="{{route('edit-product' , $product -> id)}}"  class="no-hover">  <i class='bx bxs-edit-alt text-success editBtn' data-toggle="tooltip" data-placement="top" title="{{__('main.edit_action')}}" style="font-size: 25px ; cursor: pointer"></i></a>
                                                    <i class='bx bxs-trash text-danger deleteBtn' data-toggle="tooltip" data-placement="top" title="{{__('main.delete_action')}}"
                                                       id="{{$product -> id}}" style="font-size: 25px ; cursor: pointer"></i>
                                                    @if($product -> isTop == 0)
                                                        <a href="{{route('add_to_top' , $product -> id)}}"  class="no-hover" style="  color: grey !important;">
                                                            <i class='bx bxs-star text-grey' data-toggle="tooltip" data-placement="top" title="{{__('main.add_to_top')}}"
                                                               style="font-size: 25px ; cursor: pointer"></i>
                                                        </a>

                                                        @else
                                                        <a href="{{route('remove_from_top' , $product -> id)}}">
                                                        <i class='bx bxs-star text-primary' data-toggle="tooltip" data-placement="top" title="{{__('main.remove_from_top')}}"
                                                           style="font-size: 25px ; cursor: pointer"></i>
                                                        </a>
                                                    @endif
                                                </div>
                                                @else
                                                @if(auth() -> user() -> id == $product -> user_ins)
                                                    <div style="display: flex ; gap: 10px ; justify-content: center ">
                                                        <a href="{{route('edit-product' , $product -> id)}}">  <i class='bx bxs-edit-alt text-success editBtn' data-toggle="tooltip" data-placement="top" title="{{__('main.edit_action')}}" style="font-size: 25px ; cursor: pointer"></i></a>
                                                        <i class='bx bxs-trash text-danger deleteBtn' data-toggle="tooltip" data-placement="top" title="{{__('main.delete_action')}}"
                                                           id="{{$product -> id}}" style="font-size: 25px ; cursor: pointer"></i>
                                                    </div>
                                                @endif
                                            @endif
                                            @if(auth() -> user() -> type == 1)
                                                   <i class="bx bx-store fs-3 text-primary manageBtn" style="margin-top:10px ; font-size: 25px ; cursor: pointer" data-id="{{$product -> id}}"
                                                      data-toggle="tooltip" data-placement="top" title="{{__('main.manage_action')}}"></i>
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

@include('cpanel.Products.editModal')

@include('cpanel.Products.deleteModal')
@include('layouts.footer')
<script type="text/javascript">
var id = 0 ;

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

$(document).on('click', '.manageBtn', function(event) {
    let product_id = $(this).attr('data-id');
    let supplier_id = $('#supplier_id').val();
    console.log(id);
    event.preventDefault();
    let href = $(this).attr('data-attr');
    $.ajax({
        type:'get',
        url:'/showWithProductIdAndSupplierID' + '/' + product_id + '/' + supplier_id,
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
                        $(".modal-body #supplier").val(response.supplier_id);
                        $(".modal-body #supplier_id").val(response.supplier_id);
                        $(".modal-body #id").val(response.id);
                        $(".modal-body #item").val(response.product_id);
                        $(".modal-body #item_id").val(response.product_id);
                        $(".modal-body #quantity").val(response.quantity);
                        $(".modal-body #price").val(response.price);

                        var translatedText = "{{ __('main.editData') }}";
                        $(".modelTitle").html(translatedText);



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


function confirmDelete(id){
let url = "{{ route('deleteProduct', ':id') }}";
url = url.replace(':id', id);
document.location.href=url;
}



</script>
</body>
</html>
