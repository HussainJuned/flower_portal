@extends('layouts.master')
@section('title', 'Upload Product')

@section('content')

    <div class="container" id="vue-product">
        <main>
            <form action="{{ route('products.store') }}" method="post" class="w-50 mx-auto mb-5"
                  id="my-form" enctype="multipart/form-data" name="new_product_upload">
                @csrf
                <h2 class="mt-3 mb-30">Upload your product</h2>
                <div class="form-group mb-30">
                    <label for="name">Name of the product</label>
                    <input required type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                           value="{{ old('name') }}"
                           id="name" name="name" placeholder="e.g. Rose">
                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group mb-30">
                    <label for="category">Category</label>
                    <select class="form-control" id="category" name="category" required autocomplete="off">
                        @if(old('category', null) != null)
                            <option selected value="{{ old('category') }}">{{ old('category') }}</option>
                        @endif
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ strtolower($category->name) }}</option>
                        @endforeach

                    </select>
                </div>

                <div class="form-group mb-30">
                    <label for="description">Description</label>
                    <textarea required type="text"
                              class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                              id="description" name="description" placeholder="{{ old('description') }}"
                              maxlength="1000" minlength="1" rows="6">{{ old('description') }}</textarea>
                    @if ($errors->has('description'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group mb-30">
                    <label for="pack">Packing type</label>
                    <select class="form-control" id="pack" name="pack" required autocomplete="off">
                        @if(old('pack', null) != null)
                            <option selected value="{{ old('pack') }}">{{ old('pack') }}</option>
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
                               value="{{ old('price_per_stem_bunch') }}" min="0.01" step="0.01" max="99999999"
                               id="price_per_stem_bunch" name="price_per_stem_bunch" placeholder="0">
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
                           value="1" min="1" max="999999" step="1"
                           id="number_of_stem" name="number_of_stem">
                    @if ($errors->has('number_of_stem'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('number_of_stem') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group mb-30" id="stem_increment">
                    <label for="s_increment">Stem Increment</label>
                    <input required type="number"
                           class="form-control{{ $errors->has('s_increment') ? ' is-invalid' : '' }}"
                           value="1" min="1" max="999999" step="1"
                           id="s_increment" name="s_increment">
                    @if ($errors->has('s_increment'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('s_increment') }}</strong>
                        </span>
                    @endif
                </div>


                <div class="form-group mb-30">

                    <label for="price">Price: </label>

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">$</div>
                        </div>

                        <input required type="number"
                               class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}"
                               value="0" min="0.1" max="9999999999" step="0.1"
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
                    <h5 class="mb-3">Upload Product Photo</h5>

                    <div class="upload_photo_container box">
                        <div class="box__input">
                            <label class="cabinet center-block">
                                <figure>
                                    <img src="" class="gambar img-fluid img-thumbnail" id="item-img-output"/>
                                    <figcaption><i class="fas fa-camera"></i></figcaption>
                                </figure>
                                <input type="file" class="item-img file center-block box__file"
                                       {{--name="file_photo"--}} accept="image/*"/>
                            </label>
                        </div>
                        {{--<div class="box__uploading">Uploading&hellip;</div>
                        <div class="box__success">Done!</div>
                        <div class="box__error">Error! <span></span>.</div>--}}
                    </div>

                </div>
                {{--<div class="mb-30 text-center">

                </div>
                <div id="preview-crop-image" class="mb-30"
                     style="width:500px;height:500px;">
                </div>--}}

                <div class="form-group mb-30">
                    <h6>Choose Colour</h6>
                    {{--<input required type="text" class="form-control{{ $errors->has('colour') ? ' is-invalid' : '' }}"
                           value="{{ old('colour') }}"
                           id="colour" name="colour" placeholder="e.g. red">--}}

                    <div class="color_preview_box">
                        <div class="colour_item">

                            <label for="colour1">
                                <input type="radio" required name="colour" id="colour1" value="#FFC813" checked>
                                <span class="checkmark" style="background-color: #FFC813"></span>
                            </label>
                        </div>
                        <div class="colour_item">

                            <label for="colour2">
                                <input type="radio" required name="colour" id="colour2" value="#FE7418">
                                <span class="checkmark" style="background-color: #FE7418"></span>
                            </label>
                        </div>
                        <div class="colour_item">
                            <label for="colour3">
                                <input type="radio" required name="colour" id="colour3" value="#FFB27E">
                                <span class="checkmark" style="background-color: #FFB27E"></span>
                            </label>
                        </div>
                        <div class="colour_item">
                            <label for="colour4">
                                <input type="radio" required name="colour" id="colour4" value="#B90000">
                                <span class="checkmark" style="background-color: #B90000"></span>
                            </label>
                        </div>
                        <div class="colour_item">
                            <label for="colour5">
                                <input type="radio" required name="colour" id="colour5" value="#E496C4">
                                <span class="checkmark" style="background-color: #E496C4"></span>
                            </label>
                        </div>
                        <div class="colour_item">
                            <label for="colour6">
                                <input type="radio" required name="colour" id="colour6" value="#2F2074">
                                <span class="checkmark" style="background-color: #2F2074"></span>
                            </label>
                        </div>
                        <div class="colour_item">
                            <label for="colour7">
                                <input type="radio" required name="colour" id="colour7" value="#95AB46">
                                <span class="checkmark" style="background-color: #95AB46"></span>
                            </label>
                        </div>
                        <div class="colour_item">
                            <label for="colour8">
                                <input type="radio" required name="colour" id="colour8" value="#914423">
                                <span class="checkmark" style="background-color: #914423"></span>
                            </label>
                        </div>
                        <div class="colour_item">
                            <label for="colour9">
                                <input type="radio" required name="colour" id="colour9" value="#181417">
                                <span class="checkmark" style="background-color: #181417"></span>
                            </label>
                        </div>
                        <div class="colour_item">
                            <label for="colour10">
                                <input type="radio" required name="colour" id="colour10" value="#E8E2DF">
                                <span class="checkmark" style="background-color: #E8E2DF"></span>
                            </label>
                        </div>
                        <div class="colour_item">
                            <label for="colour11">
                                <input type="radio" required name="colour" id="colour11" value="#D4AF37">
                                <span class="checkmark" style="background-color: #D4AF37"></span>
                            </label>
                        </div>
                        <div class="colour_item">
                            <label for="colour12">
                                <input type="radio" required name="colour" id="colour12" value="#C0C0C0">
                                <span class="checkmark" style="background-color: #C0C0C0"></span>
                            </label>
                        </div>
                        <div class="colour_item">
                            <label for="colour13">
                                <input type="radio" required name="colour" id="colour13" value="mix">
                                <span class="checkmark"
                                      style="background: linear-gradient(to right, red, orange, yellow, green, blue, violet)"></span>
                            </label>
                        </div>

                    </div>


                    @if ($errors->has('colour'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('colour') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group mb-30">
                    <label for="stock">Number in Stock</label>
                    <input required type="number" class="form-control{{ $errors->has('stock') ? ' is-invalid' : '' }}"
                           value="{{ old('stock') }}" id="stock" name="stock" placeholder="e.g. 10">
                    @if ($errors->has('stock'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('stock') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group mb-30">
                    <label for="height">Height</label>
                    <input required type="text" class="form-control{{ $errors->has('height') ? ' is-invalid' : '' }}"
                           value="{{ old('height') }}"
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
                           value="{{ old('origin') }}"
                           id="origin" name="origin" placeholder="e.g. ">
                    @if ($errors->has('origin'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('origin') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group mb-30">
                    <label for="tags">Tags</label>
                    <input required type="text" class="form-control{{ $errors->has('tags') ? ' is-invalid' : '' }}"
                           value="{{ old('tags') }}"
                           id="tags" name="tags" placeholder="e.g. rose, pink, stem">
                    @if ($errors->has('tags'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('tags') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group mb-30">
                    <label for="available_date_start">Available Date Starts From</label>
                    <input required type="text"
                           class="form-control{{ $errors->has('available_date_start') ? ' is-invalid' : '' }}"
                           value="{{ old('available_date_start') }}"
                           id="available_date_start" name="available_date_start" placeholder="e.g. red">
                    @if ($errors->has('available_date_start'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('available_date_start') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group mb-30">
                    <label for="available_date_end">Available Date Ends At</label>
                    <input required type="text"
                           class="form-control{{ $errors->has('available_date_end') ? ' is-invalid' : '' }}"
                           value="{{ old('available_date_end') }}"
                           id="available_date_end" name="available_date_end" placeholder="e.g. red">
                    @if ($errors->has('available_date_end'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('available_date_end') }}</strong>
                        </span>
                    @endif
                </div>

                {{--<div class="form-group mb-30">
                    <label for="payment_type">Payment type</label>
                    <select class="form-control" id="payment_type" name="payment_type" required>
                        @if(old('payment_type', null) != null)
                            <option selected value="{{ old('payment_type') }}">{{ old('payment_type') }}</option>
                        @endif
                        <option value="online">Online</option>
                        <option value="invoice">Invoice</option>
                    </select>
                </div>--}}

                <div class="form-group mb-30">
                    <label for="grower">Grower</label>
                    <input type="text" class="form-control{{ $errors->has('grower') ? ' is-invalid' : '' }}"
                           value="{{ old('grower') }}"
                           id="grower" name="grower" placeholder="e.g. ">
                    @if ($errors->has('grower'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('grower') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group mb-30">
                    <label for="feature">Feature</label>
                    <select class="form-control" id="feature" name="feature" required autocomplete="off">
                        @if(old('feature', null) != null)
                            <option selected value="{{ old('feature') }}">{{ old('feature') }}</option>
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
                        <input type="checkbox" value="active" checked
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
                <textarea required name="product_photo" id="product_photo" cols="30" rows="100" hidden></textarea>
                <button type="submit" class="btn j_btn">Submit</button>
            </form>
        </main>
    </div>





    <div class="modal fade" id="cropImagePop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
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
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            var tags = [
                    @foreach ($tags as $tag)
                {
                    tag: "{{$tag}}"
                },
                @endforeach
            ];

            $('#tags').selectize({
                delimiter: ',',
                persist: false,
                valueField: 'tag',
                labelField: 'tag',
                searchField: 'tag',
                options: tags,
                create: function (input) {
                    return {
                        tag: input
                    }
                }
            });
        });

    </script>

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
            $(".gambar").attr("src", "https://via.placeholder.com/400x300?text=Click or drag and drop image here");
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
                    };
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
                    // console.log('jQuery bind complete');
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
            var stem_incr_box = $('#stem_increment');
            var number_of_stem = $('#number_of_stem');
            var price_per_s_b = $('#price_per_stem_bunch');
            var price = $('#price');
            var isByBunch = false;
            /*var nos = number_of_stem.val();
            var pp_stem = price_per_s_b.val();*/
            var price_res = 0;
            nos_box.hide();

            pack.on('change', function (event) {
                var sv = pack.val();
                if (sv === 'Bunch') {
                    nos_box.show();
                    stem_incr_box.hide();
                    isByBunch = true;
                } else {
                    number_of_stem.val(1);
                    price_res = number_of_stem.val() * price_per_s_b.val();
                    price_res = parseFloat(Math.round(price_res * 100) / 100).toFixed(2);
                    price.val(price_res);
                    nos_box.hide();
                    stem_incr_box.show();
                    isByBunch = false;
                }
            });

            price_per_s_b.on('change', function (event) {
                if (isByBunch) {
                    price_res = number_of_stem.val() * price_per_s_b.val();
                } else {
                    price_res = $('#s_increment').val() * price_per_s_b.val();
                }
                price_res = parseFloat(Math.round(price_res * 100) / 100).toFixed(2);
                price.val(price_res);
            });

            number_of_stem.on('change', function (event) {
                price_res = number_of_stem.val() * price_per_s_b.val();
                price_res = parseFloat(Math.round(price_res * 100) / 100).toFixed(2);

                price.val(price_res);
            });

            $('#s_increment').on('change', function (event) {
                price_res = $(this).val() * price_per_s_b.val();
                price_res = parseFloat(Math.round(price_res * 100) / 100).toFixed(2);

                price.val(price_res);
            });


            // drag and drop file

            /*var isAdvancedUpload = function() {
                var div = document.createElement('div');
                return (('draggable' in div) || ('ondragstart' in div && 'ondrop' in div)) && 'FormData' in window && 'FileReader' in window;
            }();

            var $form = $('#my-form');

            var $input    = $form.find('input[type="file"]'),
                $label    = $form.find('label'),
                showFiles = function(files) {
                    $label.text(files.length > 1 ? ($input.attr('data-multiple-caption') || '').replace( '{count}', files.length ) : files[ 0 ].name);

                };


            if (isAdvancedUpload) {

                var droppedFiles = false;


                $form.on('drag dragstart dragend dragover dragenter dragleave drop', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                })
                    .on('dragover dragenter', function() {
                        $form.addClass('is-dragover');
                        console.log('dragover dreagenter');
                    })
                    .on('dragleave dragend drop', function() {
                        $form.removeClass('is-dragover');
                        console.log('dragLEAVE dreagend drop');
                    })
                    .on('drop', function(e) {
                        droppedFiles = e.originalEvent.dataTransfer.files;
                        showFiles( droppedFiles );
                        console.log('drop');
                        readFile('.item-img');
                    });

            }*/

            var isAdvancedUpload = function () {
                var div = document.createElement('div');
                return (('draggable' in div) || ('ondragstart' in div && 'ondrop' in div)) && 'FormData' in window && 'FileReader' in window;
            }();

            var $form = $('.box');


            if (isAdvancedUpload) {

                var droppedFiles = false;
                $form.addClass('has-advanced-upload');

                $form.on('drag dragstart dragend dragover dragenter dragleave drop', function (e) {
                    e.preventDefault();
                    e.stopPropagation();
                }).on('dragover dragenter', function () {
                    $form.addClass('is-dragover');
                }).on('dragleave dragend drop', function () {
                    $form.removeClass('is-dragover');
                }).on('drop', function (e) {
                    droppedFiles = e.originalEvent.dataTransfer.files;
                    readFile(e.originalEvent.dataTransfer);
                });

            }

        });

        var product = new Vue({
            el: '#vue-product',
            data: {
                msg: 'Vue js works are needed'
            },
            methods: {
                stem: function (event) {
                    alert('stem');
                }
            }
        });
    </script>

    <script type="text/javascript">
        let start_datepicker = $('#available_date_start');
        let end_datepicker = $('#available_date_end');
        let settings = {
            "singleDatePicker": true,
            "showDropdowns": true,
            "showWeekNumbers": true,
            "showISOWeekNumbers": true,
            "autoApply": true,
            ranges: {
                'Today': [moment(), moment()],
                'Tomorrow': [moment().add(1, 'days'), moment().add(1, 'days')],
            },
            "locale": {
                "format": "YYYY-MM-DD",
                "separator": " - ",
                "firstDay": 1
            },
            "alwaysShowCalendars": true,
            "startDate": moment(),
            minDate: moment(),
            maxDate: moment().add(365, 'days')
        };
        let startDate;

        start_datepicker.daterangepicker(settings, function (start, end, label) {
            // console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
            startDate = start.format('YYYY-MM-DD');
            // console.log('start date: ', startDate)
            end_datepicker.data('daterangepicker').setStartDate(moment(startDate));
        });
        let end_settings = {
            "singleDatePicker": true,
            "showDropdowns": true,
            "showWeekNumbers": true,
            "showISOWeekNumbers": true,
            "autoApply": true,
            ranges: {
                'Today': [moment(), moment()],
                'Tomorrow': [moment().add(1, 'days'), moment().add(1, 'days')],
                '1 Week': [moment().add(7, 'days'), moment().add(7, 'days')],
                '1 month': [moment().add(30, 'days'), moment().add(30, 'days')],
            },
            "locale": {
                "format": "YYYY-MM-DD",
                "separator": " - ",
                "firstDay": 1
            },
            "alwaysShowCalendars": true,
            "startDate": moment(startDate).add(7, 'days'),
            minDate: moment(startDate),
            maxDate: moment(startDate).add(365, 'days')
        };

        end_datepicker.daterangepicker(end_settings);
    </script>

    <script>
        var options = $('#category option');

        var values = $.map(options, function (option) {
            return option.value;
        });

        var el_name = $('#name');
        // var name = [];

        el_name.on('keyup', function (event) {
            $("#category option:selected").attr("selected", false);

            var theValue = el_name.val().toLowerCase().split(" ");
            // var name = el_name.val().split(" ");
            // console.log(theValue);

            let shouldBreak = false;

            loop1:
            for (let i = 0; i < theValue.length; i++) {
                var contained = $('#category option:contains(' + theValue[i] + ')');
                if (contained.eq(0).val() != null) {

                    var ca = contained.eq(0).text().toLowerCase().split(' ');

                    loop2:
                    for (let j = 0; j < ca.length; j++) {
                        if (ca[j] === theValue[i]) {
                            // console.log('found');
                            contained.eq(0).attr('selected', true);
                            $("#category").select();
                            break loop1;
                        } else {
                            // console.log('not full word');
                            // console.log('cv: ' + contained.eq(0).text());
                        }
                    }

                    /*if (contained.eq(0).text() === theValue[i]) {


                    } */

                } else {
                    // console.log('not found');
                    // $("#category option:selected").attr("selected", false);
                }
            }


            // return false;
        });
    </script>
@endpush

@push('css-lib')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>
@endpush
