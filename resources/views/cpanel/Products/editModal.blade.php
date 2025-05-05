<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-md" role="document" style="min-width: 700px">
        <div class="modal-content">
            <div class="modal-header" style="background: #F8F8F8 ; border-radius: 8px">
                <label class="modelTitle"> </label>


                <i class='bx bxs-x-square text-danger modal-close' data-bs-dismiss="modal" style="font-size: 25px ; cursor: pointer"></i>


            </div>
            <div class="modal-body" id="smallBody">
                <div class="text-start mb-2">
                    <button type="button" class="btn btn-sm btn-outline-danger" onclick="handleDelete()">
                        <i class='bx bx-trash'></i> {{ __('main.delete_btn')  }}
                    </button>
                </div>
                <div class="container-fluid">

                    <form class="center" method="POST" action="{{ route('store_product_to_supplier') }}"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>{{ __('main.supplier') }}  <span style="color: red ; font-size: 14px"> * </span> </label>
                                    <select class="form-control" id="supplier" name="supplier" disabled>
                                        @foreach($suppliers as $supplier)
                                            <option value="{{$supplier -> id}}">
                                                    {{$supplier -> name}}
                                            </option>

                                        @endforeach
                                    </select>
                                    <input type="hidden" id="supplier_id"  name="supplier_id"  />


                                    @error('name_ar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <input  name="id" id="id" type="hidden"/>

                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>{{ __('main.item') }} <span style="color: red ; font-size: 14px"> * </span>  </label>
                                    <select class="form-control" id="item" name="item" disabled>
                                        @foreach($products as $item)
                                            <option value="{{$item -> id}}">
                                                @if(Config::get('app.locale') == 'ar')
                                                    {{$item -> name_ar}}
                                                @else
                                                    {{$item -> name_en}}
                                                @endif

                                            </option>

                                        @endforeach
                                    </select>
                                    <input type="hidden" id="item_id"  name="item_id"  />
                                    @error('item')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                            </div>

                        </div>
                       <div class="row" style="margin-top: 15px">
                           <div class="col-lg-6 col-md-6 col-sm-6">
                               <div class="form-group">
                                   <label> {{__('main.quantity')}}  </label>
                                   <input type="number"  step="any" name="quantity" id="quantity"
                                          class="form-control @error('quantity') is-invalid @enderror"
                                          placeholder="{{ __('main.quantity') }}" autofocus  required/>
                                   @error('quantity')
                                   <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror

                               </div>

                           </div>
                           <div class="col-lg-6 col-md-6 col-sm-6">
                               <div class="form-group">
                                   <label> {{__('main.price')}} <span style="color: red ; font-size: 14px"> * </span>  </label>
                                   <input type="number" step="any" name="price" id="price"
                                          class="form-control @error('price') is-invalid @enderror"
                                          placeholder="{{ __('main.price') }}" autofocus  required/>
                                   @error('price')
                                   <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror

                               </div>

                           </div>

                       </div>

                        <div class="row" style="margin-top: 40px">
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-warning">{{ __('main.save_btn') }}</button>

                            </div>

                        </div>




                    </form>
                    @include('cpanel.products.deleteSupplierModal')
                    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
                    <script>
                        function readURL(input) {
                            if (input.files && input.files[0]) {
                                var reader = new FileReader();

                                reader.onload = function (e) {
                                    $('#flag-img').attr('src', e.target.result);

                                }
                                reader.readAsDataURL(input.files[0]);

                            }
                        }
                        $("#flag").change(function () {
                            readURL(this);
                        });

                        $(document).on('click', '.btnConfirmDeleteSupplier', function(event) {

                            confirmDeleteSupplierProduct($('#id').val());
                        });

                        function confirmDeleteSupplierProduct(id){
                            let url = "{{ route('deleteSupplierProduct', ':id') }}";
                            url = url.replace(':id', id);
                            document.location.href=url;
                        }
                        function handleDelete(){


                            event.preventDefault();
                            let href = $(this).attr('data-attr');
                            $.ajax({
                                url: href,
                                beforeSend: function() {
                                    $('#loader').show();
                                },
                                // return the result
                                success: function(result) {
                                    $('#deleteSupplierModal').modal("show");

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
                        }

                    </script>

                </div>
            </div>
        </div>
    </div>
</div>
