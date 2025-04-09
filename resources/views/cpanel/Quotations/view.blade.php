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

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>{{ __('main.client') }}  </label>
                                    <input type="text" name="client" id="client"
                                           class="form-control @error('client') is-invalid @enderror"
                                           placeholder="{{ __('main.client') }}" autofocus  readonly/>


                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>{{ __('main.supplier') }}</label>
                                    <input type="text" name="supplier" id="supplier"
                                           class="form-control @error('supplier') is-invalid @enderror"
                                           placeholder="{{ __('main.supplier') }}" autofocus  readonly/>


                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>{{ __('main.review') }}  </label>
                                    <input type="number" step="any" name="review" id="review"
                                           class="form-control @error('review') is-invalid @enderror"
                                           placeholder="{{ __('main.review') }}" autofocus  readonly/>


                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>{{ __('main.date') }}</label>
                                    <input type="text" name="date" id="date"
                                           class="form-control @error('date') is-invalid @enderror"
                                           placeholder="{{ __('main.date') }}" autofocus  readonly/>


                                </div>
                            </div>
                        </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label>{{ __('main.comment') }}  </label>
                                <textarea  name="comment" id="comment"
                                       class="form-control @error('comment') is-invalid @enderror"
                                       placeholder="{{ __('main.comment') }}" autofocus  readonly> </textarea>


                            </div>
                        </div>

                    </div>




                </div>
            </div>
        </div>
    </div>
</div>
