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

                    <form class="center" method="POST" action="{{ route('store-country') }}"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>{{ __('main.name_ar') }} <span style="font-size: 14px ; color: red"> * </span>  </label>
                                    <input type="text" name="name_ar" id="name_ar"
                                           class="form-control @error('name_ar') is-invalid @enderror"
                                           placeholder="{{ __('main.name_ar') }}" autofocus  required/>
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
                                    <label>{{ __('main.name_en') }} <span style="font-size: 14px ; color: red"> * </span> </label>
                                    <input type="text" name="name_en" id="name_en"
                                           class="form-control @error('name_en') is-invalid @enderror"
                                           placeholder="{{ __('main.name_en') }}" autofocus  required/>
                                    @error('name_en')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                            </div>
                        </div>
                        <div >
                            <label for="img" class="col-form-label">{{ __('main.flag') }} <span style="font-size: 14px ; color: red"> * </span> </label>
                            <div class="row" style="display: flex; align-items: center;">
                                <div class="col-6">
                                    <div class="custom-file">

                                        <input class="form-control" type="file" id="flag" name="flag"
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
                        $("#flag").change(function () {
                            readURL(this);
                        });

                    </script>

                </div>
            </div>
        </div>
    </div>
</div>
