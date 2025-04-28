<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-md" role="document" style="min-width: 700px">
        <div class="modal-content">
            <div class="modal-header" style="background: #F8F8F8 ; border-radius: 8px">
                <label class="modelTitle"> </label>


                <i class='bx bxs-x-square text-danger modal-close' data-bs-dismiss="modal" style="font-size: 25px ; cursor: pointer"></i>


            </div>
            <div class="modal-body" id="smallBody">

                <div class="container-fluid">

                    <form class="center" method="POST" action="{{ route('store-ad') }}"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>{{ __('main.adType') }} <span style="font-size: 14px ; color: red"> * </span>  </label>
                                    <select id="type" name="type" class="form-control @error('type') is-invalid @enderror" required>
                                        <option value="0">{{__('main.adType0')}}</option>
                                        <option value="1">{{__('main.adType1')}}</option>
                                    </select>
                                    @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <input  name="id" id="id" type="hidden"/>

                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>{{ __('main.order') }} <span style="font-size: 14px ; color: red"> * </span> </label>
                                    <input type="number" name="order" id="order"
                                           class="form-control @error('order') is-invalid @enderror"
                                           placeholder="{{ __('main.order') }}" autofocus  required/>
                                    @error('order')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 10px">
                            <div class="col-6">
                                <div class="form-group">
                                    <label > {{__('main.item')}} <span style="color: red ; font-size: 14px" id="itemStar"> * </span> </label>
                                    <select id="item_id" name="item_id" class="form-control @error('item_id') is-invalid @enderror">
                                        <option value=""> {{__('main.choose')}} </option>
                                        @foreach($items as $item)
                                            <option value="{{$item -> id}}">
                                                @if(Config::get('app.locale')=='ar' )
                                                    {{$item -> name_ar}}
                                                @else
                                                    {{$item -> name_en}}
                                                @endif
                                            </option>
                                        @endforeach

                                    </select>

                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>{{__('main.url')}} <span style="font-size: 14px ;color: red" id="url_star"> *</span> </label>
                                    <input class="form-control @error('url') is-invalid @enderror" id="url" name="url"
                                    type="text">
                                </div>

                            </div>

                        </div>
                        <div class="row" style="margin-top: 10px">
                           <div class="col-6">
                               <div class="form-group">
                                   <label>{{ __('main.isVisible') }} <span style="font-size: 14px ; color: red"> * </span>  </label>
                                   <select id="isVisible" name="isVisible" class="form-control @error('isVisible') is-invalid @enderror" required>
                                       <option value="0">{{__('main.isVisible0')}}</option>
                                       <option value="1">{{__('main.isVisible1')}}</option>
                                   </select>
                                   @error('isVisible')
                                   <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                               </div>

                           </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>{{ __('main.duration') }} <span style="font-size: 14px ; color: red"> * </span>  </label>
                                    <input  type="number" step="any" id="duration" name="duration"
                                            class="form-control @error('duration') is-invalid @enderror" required>
                                    @error('duration')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>
                        </div>
                        <div >
                            <label for="img" class="col-form-label">{{ __('main.banner') }} <span style="font-size: 14px ; color: red"> * </span> </label>
                            <div class="row" style="display: flex; align-items: center;">
                                <div class="col-6">
                                    <div class="custom-file">

                                        <input class="form-control" type="file" id="banner" name="banner"
                                               accept="*">
                                    </div>
                                </div>
                                <div class="col-6 text-right">
                                    <img src="{{ asset('assets/img/picture.png') }}" id="flag-img" width="80px"
                                         class="profile-img"/>
                                </div>
                            </div>
                        </div>

                        <div class="row" style="margin-top: 40px">
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-warning">{{ __('main.save_btn') }}</button>

                            </div>

                        </div>




                    </form>
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
                        $("#banner").change(function () {
                            readURL(this);
                        });

                    </script>

                </div>
            </div>
        </div>
    </div>
</div>
