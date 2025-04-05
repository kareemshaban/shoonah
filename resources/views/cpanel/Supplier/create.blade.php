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

                    <form class="center" method="POST" action="{{ route('store-supplier') }}"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>{{ __('main.name') }}  <span style="color: red ; font-size: 14px"> * </span> </label>
                                    <input type="text" name="name" id="name"
                                           class="form-control @error('name') is-invalid @enderror"
                                           placeholder="{{ __('main.name') }}" autofocus  required/>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <input  name="id" id="id" type="hidden"/>

                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>{{ __('main.company') }} <span style="color: red ; font-size: 14px"> * </span> </label>
                                    <input type="text" name="company" id="company"
                                           class="form-control @error('company') is-invalid @enderror"
                                           placeholder="{{ __('main.company') }}" autofocus  required/>
                                    @error('company')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 10px">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>{{__('main.country')}} <span style="color: red ; font-size: 14px"> * </span></label>
                                    <select class="form-control @error('country_id') is-invalid @enderror" id="country_id" name="country_id" required>
                                        @foreach($countries as $country)
                                            <option value="{{$country -> id}}">
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
                            <div class="col-6">
                                <div class="form-group">
                                    <label>{{__('main.city')}} <span style="color: red ; font-size: 14px"> * </span></label>
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
                            <div class="col-6">
                                <div class="form-group">
                                    <label>{{ __('main.phone') }}  </label>
                                    <input type="text" name="phone" id="phone"
                                           class="form-control @error('phone') is-invalid @enderror"
                                           placeholder="{{ __('main.phone') }}" autofocus  />
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror


                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>{{ __('main.mobile') }} <span style="color: red ; font-size: 14px"> * </span></label>
                                    <input type="text" name="mobile" id="mobile"
                                           class="form-control @error('mobile') is-invalid @enderror"
                                           placeholder="{{ __('main.mobile') }}" autofocus required />
                                    @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>{{ __('main.email') }}  </label>
                                    <input type="text" name="email" id="email"
                                           class="form-control @error('email') is-invalid @enderror"
                                           placeholder="{{ __('main.email') }}" autofocus  />
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror


                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>{{ __('main.type') }}  <span style="color: red ; font-size: 14px"> * </span> </label>
                                    <select type="text" name="type" id="type"
                                           class="form-control @error('type') is-invalid @enderror" autofocus  required >
                                        <option value="0"> {{__('main.supplier')}}</option>
                                        <option value="1"> {{__('main.factory')}}</option>
                                    </select>
                                    @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror


                                </div>
                            </div>

                        </div>
                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>{{ __('main.vatNumber') }}  </label>
                                    <input type="text" name="vatNumber" id="vatNumber"
                                           class="form-control @error('vatNumber') is-invalid @enderror"
                                           placeholder="{{ __('main.vatNumber') }}" autofocus  />
                                    @error('vatNumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror


                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>{{ __('main.registrationNumber') }}</label>
                                    <input type="text" name="registrationNumber" id="registrationNumber"
                                           class="form-control @error('registrationNumber') is-invalid @enderror"
                                           placeholder="{{ __('main.registrationNumber') }}" autofocus />
                                    @error('registrationNumber')
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
                                              placeholder="{{ __('main.address') }}" autofocus > </textarea>
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                            </div>

                        </div>
                        <div >
                            <label for="img" class="col-form-label">{{ __('main.logo') }}:</label>
                            <div class="row" style="display: flex; align-items: center;">
                                <div class="col-6">
                                    <div class="custom-file">

                                        <input class="form-control" type="file" id="logo" name="logo"
                                               accept="*">
                                    </div>
                                </div>
                                <div class="col-6 text-right">
                                    <img src="{{ asset('assets/img/picture.png') }}" id="logo-img" width="80px"
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
                                    $('#logo-img').attr('src', e.target.result);

                                }
                                reader.readAsDataURL(input.files[0]);

                            }
                        }
                        $("#logo").change(function () {
                            readURL(this);
                        });
                    </script>

                </div>
            </div>
        </div>
    </div>
</div>
