@extends('layouts.master')
@section('title', 'Floral Portal')


@section('content')

    <div class="container" id="vue-product">
        <main>
            <form action="{{ route('products.update', ['product' => $product->id]) }}" method="post" class="w-50 mx-auto mb-5"
                  id="my-form" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <h2 class="mt-3 mb-30">Update your product</h2>
                <div class="form-group mb-30">
                    <label for="name">Name of the product</label>
                    <input required type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                           value="{{ $product->name }}"
                           id="name" name="name" placeholder="e.g. Rose">
                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group mb-30">
                    <label for="description">Description</label>
                    <textarea required type="text"
                              class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                              id="description" name="description" placeholder="{{  $product->description  }}"
                              maxlength="1000" minlength="1" rows="6">{{  $product->description  }}</textarea>
                    @if ($errors->has('description'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group mb-30">
                    <label for="pack">Packing type</label>
                    <select class="form-control" id="pack" name="pack" required>
                        @if( $product->pack )
                            <option selected value="{{ $product->pack }}">{{  $product->pack  }}</option>
                        @endif
                        <option value="Stem">Stem</option>
                        <option value="Bunch">Bunch</option>
                    </select>
                </div>
                <div class="form-group mb-30">
                    <label for="price_per_stem_bunch">Price per Stem</label>

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">$</div>
                        </div>
                        <input required type="number"
                               class="form-control{{ $errors->has('price_per_stem_bunch') ? ' is-invalid' : '' }}"
                               value="{{ $product->price_per_stem_bunch }}" min="0.01" step="0.01" max="99999999"
                               id="price_per_stem_bunch" name="price_per_stem_bunch" placeholder="10">
                        @if ($errors->has('price_per_stem_bunch'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('price_per_stem_bunch') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-group mb-30" id="nos_box">
                    <label for="number_of_stem">Number Of Stem per Bunch</label>
                    <input required type="number"
                           class="form-control{{ $errors->has('number_of_stem') ? ' is-invalid' : '' }}"
                           value="{{ $product->number_of_stem }}" min="1" max="999999" step="1"
                           id="number_of_stem" name="number_of_stem">
                    @if ($errors->has('number_of_stem'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('number_of_stem') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group mb-30">
                    <label for="price">Price</label>

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">$</div>
                        </div>
                        <input required type="number" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}"
                               value="{{ $product->price }}" min="0.1" max="9999999999" step="0.1"
                               id="price" name="price" disabled>
                        @if ($errors->has('price'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('price') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-group mb-30">
                    {{--<label for="photo">Product Photo</label>
                    <input required type="file"
                           class="form-control-file{{ $errors->has('photo') ? ' is-invalid' : '' }}"
                           id="photo" name="photo" accept="image/*">--}}
                    @if ($errors->has('product_photo'))
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $errors->first('product_photo') }}</strong>
                        </span>
                    @endif
                    <label for="">update Product Photo</label>
                    <label class="cabinet center-block">
                        <figure>
                            <img src="{{ url('/') }}/{{ $product->photo_url }}" class="gambar img-fluid img-thumbnail" id="item-img-output"/>
                            <figcaption><i class="fas fa-camera"></i></figcaption>
                        </figure>
                        <input type="file" class="item-img file center-block"{{-- name="file_photo"--}}/>
                    </label>
                </div>
                {{--<div class="mb-30 text-center">

                </div>
                <div id="preview-crop-image" class="mb-30"
                     style="width:500px;height:500px;">
                </div>--}}
                <div class="form-group mb-30">
                    <label for="stock">Number in Stock</label>
                    <input required type="number" class="form-control{{ $errors->has('stock') ? ' is-invalid' : '' }}"
                           value="{{ $product->stock }}" id="stock" name="stock" placeholder="e.g. 10">
                    @if ($errors->has('stock'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('stock') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group mb-30">
                    <label for="height">Height</label>
                    <input required type="text" class="form-control{{ $errors->has('height') ? ' is-invalid' : '' }}"
                           value="{{ $product->height }}"
                           id="height" name="height" placeholder="e.g. 30cm">
                    @if ($errors->has('height'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('height') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group mb-30">
                    <label for="origin">Origin</label>
                    <input required type="text" class="form-control{{ $errors->has('origin') ? ' is-invalid' : '' }}"
                           value="{{ $product->origin }}"
                           id="origin" name="origin" placeholder="e.g. ">
                    @if ($errors->has('origin'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('origin') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group mb-30">
                    <label for="colour">Colour</label>
                    <input required type="text" class="form-control{{ $errors->has('colour') ? ' is-invalid' : '' }}"
                           value="{{ $product->colour }}"
                           id="colour" name="colour" placeholder="e.g. red">
                    @if ($errors->has('colour'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('colour') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group mb-30">
                    <label for="category">Category</label>
                    <select class="form-control" id="category" name="category" required>
                        @if( $product->category )
                            <option selected value="{{ $product->category }}">{{  $product->category  }}</option>
                        @endif
                        <option value="Flower">Flower</option>
                        <option value="Green">Green</option>
                        <option value="Dried">Dried</option>
                    </select>
                </div>
                <div class="form-group mb-30">
                    <label for="available_date_start">Available Date Starts From</label>
                    <input required type="date"
                           class="form-control{{ $errors->has('available_date_start') ? ' is-invalid' : '' }}"
                           value="{{ $product->available_date_start }}"
                           id="available_date_start" name="available_date_start" placeholder="e.g. red">
                    @if ($errors->has('available_date_start'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('available_date_start') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group mb-30">
                    <label for="available_date_end">Available Date Ends At</label>
                    <input required type="date"
                           class="form-control{{ $errors->has('available_date_end') ? ' is-invalid' : '' }}"
                           value="{{ $product->available_date_end }}"
                           id="available_date_end" name="available_date_end" placeholder="e.g. red">
                    @if ($errors->has('available_date_end'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('available_date_end') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group mb-30">
                    <label for="grower">Grower</label>
                    <input type="text" class="form-control{{ $errors->has('grower') ? ' is-invalid' : '' }}"
                           value="{{ $product->grower }}"
                           id="grower" name="grower" placeholder="e.g. ">
                    @if ($errors->has('grower'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('grower') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group mb-30">
                    <label for="feature">Feature</label>
                    <select class="form-control" id="feature" name="feature" required>
                        @if($product->feature != null)
                            <option selected value="{{ $product->feature }}">{{ $product->fToStr() }}</option>
                        @endif
                        <option value="0">none</option>
                        <option value="1">Special</option>
                        <option value="2">Low Price</option>
                        <option value="3">Exclusive</option>
                        <option value="4">Limited</option>

                    </select>
                </div>

                <div class="form-group mb-30 row form-check">
                    <label for="">Status</label>
                    <div class="col-md-12 text-center">
                        <input type="checkbox" value="active"
                               @if ($product->status > 0 )
                                   checked
                               @endif
                               class="form-check-input{{ $errors->has('status') ? ' is-invalid' : '' }}"
                               id="exampleCheck1" name="status">
                        <label for="exampleCheck1" class="form-check-label text-md-right">Active (if not selected
                            innactive,
                            we can turn this checkbox into switch later)
                        </label>
                        @if ($errors->has('status'))
                            <span class="invalid-feedback" role="alert">
                               <strong>{{ $errors->first('status') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <textarea name="product_photo" id="product_photo" cols="30" rows="100" hidden></textarea>
                <button type="submit" class="btn j_btn">Submit</button>
            </form>
        </main>
    </div>


    {{-- crop modal --}}
    <div class="modal fade" id="cropImagePop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel2">
                        Edit Photo</h4>
                </div>
                <div class="modal-body">
                    <div id="upload-demo" class="center-block"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" id="cropImageBtn" class="btn btn-primary">Crop</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('footer-js')
    <script type="text/javascript">
        // domReady handler
        $(function () {

            // provide an event for when the form is submitted
            $('#my-form').submit(function () {

                // Find the input with id "file" in the context of
                // the form (hence the second "this" parameter) and
                // set it to be disabled
                $('#photo', this).prop('disabled', true);
                $('#photo', this).detach();

                // return true to allow the form to submit
                return true;
            });


            // Start upload preview image
            $(".gambar").attr("src", "{{ url('/') }}/{{ $product->photo_url }}");
            var $uploadCrop,
                tempFilename,
                rawImg,
                imageId;

            function readFile(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('.upload-demo').addClass('ready');
                        $('#cropImagePop').modal('show');
                        rawImg = e.target.result;
                    }
                    reader.readAsDataURL(input.files[0]);
                } else {
                    alert("Sorry - you're browser doesn't support the FileReader API");
                }
            }

            $uploadCrop = $('#upload-demo').croppie({
                viewport: {
                    width: 400,
                    height: 300,
                },
                enforceBoundary: true,
                enableExif: true,
                enableOrientation: true,
            });

            $('#cropImagePop').on('shown.bs.modal', function () {
                // alert('Shown pop');
                $uploadCrop.croppie('bind', {
                    url: rawImg
                }).then(function () {
                    console.log('jQuery bind complete');
                });
            });

            $('.item-img').on('change', function () {
                imageId = $(this).data('id');
                tempFilename = $(this).val();

                $('#cancelCropBtn').data('id', imageId);
                readFile(this);
            });

            $('#cropImageBtn').on('click', function (ev) {
                $uploadCrop.croppie('result', {
                    type: 'base64',
                    format: 'png',
                    size: {width: 400, height: 300}
                }).then(function (resp) {
                    $('#item-img-output').attr('src', resp);
                    $('#product_photo').val(resp);
                    $('#cropImagePop').modal('hide');
                });
            });
            // End upload preview image

            var pack = $('#pack');
            var nos_box = $('#nos_box');
            var number_of_stem = $('#number_of_stem');
            var price_per_s_b = $('#price_per_stem_bunch');
            var price = $('#price');
            /*var nos = number_of_stem.val();
            var pp_stem = price_per_s_b.val();*/
            var price_res = 0;

            if(pack.val() === 'Bunch') {
                nos_box.show();
            } else {
                nos_box.hide();
            }

            pack.on('change', function (event) {
                var sv = pack.val();
                if(sv === 'Bunch') {
                    nos_box.show();
                } else {
                    number_of_stem.val(1);
                    price_res = number_of_stem.val() *  price_per_s_b.val();
                    price.val(price_res);
                    nos_box.hide();

                }
            });

            price_per_s_b.on('change', function (event) {
                price_res = number_of_stem.val() *  price_per_s_b.val();
                price.val(price_res);               
            });

            number_of_stem.on('change', function (event) {
                price_res = number_of_stem.val() *  price_per_s_b.val();
                price.val(price_res);               
            });
        });
    </script>
@endpush
