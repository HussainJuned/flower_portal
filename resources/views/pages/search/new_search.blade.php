@extends('layouts.master')
@section('title', 'Search')


@section('content')
    {{--<div class="container search">
        <div class="row">
            <div class="col-sm-6">
                <div class="row align-items-center my-3">
                    <div class="col-sm-4">
                        <p>You are here: </p>
                    </div>
                    <div class="col-sm-8">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Search</a></li>
                                <li class="breadcrumb-item active" aria-current="page">flower</li>
                            </ol>
                        </nav>
                    </div>
                </div>

            </div>
        </div>
    </div>--}}
    {{--<section class="date">
        <div class="row mx-0 my-3">
            <div class="col-sm-3"></div>
            <div class="col-sm-3 text-right px-0">
                <select name="select-date" id="select-date" class="custom-select">
                    <option value="">Tuesday - 5/5/2019</option>
                    <option value="">Wednesday - 6/5/2019</option>
                    <option value="">Thursday - 7/5/2019</option>
                </select>
            </div>
            <div class="col-sm-3 text-left px-0">
                <select name="select-demo" id="select-demo" class="custom-select">
                    <option value="">Demo</option>
                </select>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </section>--}}

    <section class="container new_search_page" id="app_result" xmlns:v-on="http://www.w3.org/1999/xhtml">
        <div class="row">
            <div class="col-md-3 col-sm-12">
 
                <ul id="filter_aanbod" class="side-filter filter-opened">
                    <li class="animate-height open visible opened">
                        <div><h6 class="opener aanbod-opener"><i class="fas fa-filter mr-2"></i> Filters
                            </h6></div>
                        <div class="content overflow-container">
                            <div class="filter-content-height">
                                <ul class="list no-active-highlight">

                                        <li id="aanbod_3">
                                        <a data-toggle="collapse" href="#collapseCategory" role="button" aria-expanded="false" aria-controls="collapseCategory">Product</a>
                                        <ul class="collapse show" id="collapseCategory">
                                            @foreach ($categories as $category)
                                                <li class="category_list">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input inp_filter_catg" id="customCheck_{{$category->id}}" v-on:click="catgFilter({{$category->id}})">
                                                        <label class="custom-control-label" for="customCheck_{{$category->id}}"> {{ $category->name }}</label>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                        </li>

                      <li>
 
                        <a data-toggle="collapse" href="#colour_length" role="button" aria-expanded="false" aria-controls="colour_length">Colour</a>
                      <div class="form-group mb-30 collapse show" id="colour_length">
                      
                    <div class="color_preview_box">
                        <div class="colour_item">

                            <label for="colour1" >
                                <input type="checkbox" v-on:click="colourFilter('#FFC813')" required name="colour" id="colour1" style="display: none;" value="#FFC813">
                                <span class="checkmark" style="background-color: #FFC813"></span>
                            </label>
                        </div>
                        <div class="colour_item">

                            <label for="colour2" >
                                <input type="checkbox"  style="display: none;"  v-on:click="colourFilter('#FE7418')" required name="colour" id="colour2" value="#FE7418">
                                <span class="checkmark" style="background-color: #FE7418"></span>
                            </label>
                        </div>
                        <div class="colour_item">
                            <label for="colour3">
                                <input type="checkbox"  style="display: none;"   v-on:click="colourFilter('#FFB27E')" required name="colour" id="colour3" value="#FFB27E">
                                <span class="checkmark" style="background-color: #FFB27E"></span>
                            </label>
                        </div>
                        <div class="colour_item">
                            <label for="colour4" >
                                <input type="checkbox"  style="display: none;"  v-on:click="colourFilter('#B90000')" required name="colour" id="colour4" value="#B90000">
                                <span class="checkmark" style="background-color: #B90000"></span>
                            </label>
                        </div>
                        <div class="colour_item">
                            <label for="colour5">
                                <input type="checkbox"  style="display: none;"  v-on:click="colourFilter('#E496C4')" required name="colour" id="colour5" value="#E496C4">
                                <span class="checkmark" style="background-color: #E496C4"></span>
                            </label>
                        </div>
                        <div class="colour_item">
                            <label for="colour6"  style="display: none;"  v-on:click="colourFilter('#2F2074')">
                                <input type="checkbox" required name="colour" id="colour6" value="#2F2074">
                                <span class="checkmark" style="background-color: #2F2074"></span>
                            </label>
                        </div>
                        <div class="colour_item">
                            <label for="colour7" >
                                <input type="checkbox"  style="display: none;"  v-on:click="colourFilter('#95AB46')" required name="colour" id="colour7" value="#95AB46">
                                <span class="checkmark" style="background-color: #95AB46"></span>
                            </label>
                        </div>
                        <div class="colour_item">
                            <label for="colour8">
                                <input type="checkbox"  style="display: none;"  v-on:click="colourFilter('#914423')" required name="colour" id="colour8" value="#914423">
                                <span class="checkmark" style="background-color: #914423"></span>
                            </label>
                        </div>
                        <div class="colour_item">
                            <label for="colour9">
                                <input type="checkbox"  style="display: none;"  v-on:click="colourFilter('#181417')" required name="colour" id="colour9" value="#181417">
                                <span class="checkmark" style="background-color: #181417"></span>
                            </label>
                        </div>
                        <div class="colour_item">
                            <label for="colour10" >
                                <input type="checkbox"  style="display: none;"  v-on:click="colourFilter('#E8E2DF')" required name="colour" id="colour10" value="#E8E2DF">
                                <span class="checkmark" style="background-color: #E8E2DF"></span>
                            </label>
                        </div>
                        <div class="colour_item">
                            <label for="colour11">
                                <input type="checkbox"  style="display: none;"  v-on:click="colourFilter('#D4AF37')" required name="colour" id="colour11" value="#D4AF37">
                                <span class="checkmark" style="background-color: #D4AF37"></span>
                            </label>
                        </div>
                        <div class="colour_item">
                            <label for="colour12" >
                                <input type="checkbox"  style="display: none;"  v-on:click="colourFilter('#C0C0C0')" required name="colour" id="colour12" value="#C0C0C0">
                                <span class="checkmark" style="background-color: #C0C0C0"></span>
                            </label>
                        </div>
                        <div class="colour_item">
                            <label for="colour13" >
                                <input type="checkbox"  style="display: none;"  v-on:click="colourFilter('mix')" required name="colour" id="colour13" value="mix">
                                <span class="checkmark"
                                      style="background: linear-gradient(to right, red, orange, yellow, green, blue, violet)"></span>
                            </label>
                        </div>

                    </div>
 
                </div>
            </li>
                              <li>
                                    <a data-toggle="collapse" href="#collapse_feature" role="button" aria-expanded="false" aria-controls="collapse_feature">Feature</a>
                                    <ul class="collapse" id="collapse_feature">

                                            <li class="length_list category_list">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input inp_filter_origin" id="orignCheck_1" v-on:click="featureFilter(1)">
                                                    <label class="custom-control-label" for="orignCheck_1"> SPECIAL</label>
                                                </div>
                                            </li>

                                             <li class="length_list category_list">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input inp_filter_origin" id="orignCheck_2" v-on:click="featureFilter(2)">
                                                    <label class="custom-control-label" for="orignCheck_2"> LOW PRICE</label>
                                                </div>
                                            </li>

                                             <li class="length_list category_list">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input inp_filter_origin" id="orignCheck_3" v-on:click="featureFilter(3)">
                                                    <label class="custom-control-label" for="orignCheck_3"> EXCLUSIVE</label>
                                                </div>
                                            </li>

                                             <li class="length_list category_list">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input inp_filter_origin" id="orignCheck_4" v-on:click="featureFilter(4)">
                                                    <label class="custom-control-label" for="orignCheck_4"> LIMITED</label>
                                                </div>
                                            </li>
 
                                     </ul>
                                </li>



                                    <li>
                                        <a data-toggle="collapse" href="#collapse_length" role="button" aria-expanded="false" aria-controls="collapse_length">Length</a>
                                        <ul class="collapse" id="collapse_length">
                                            @for ($i=1; $i<100; $i+=10)
                                                <li class="length_list category_list">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input inp_filter_length" id="lengthCheck_{{$i}}" v-on:click="lengthFilter({{$i}})">
                                                        <label class="custom-control-label" for="lengthCheck_{{$i}}"> {{ $i }} - {{ $i + 9 }} cm</label>
                                                    </div>
                                                </li>
                                            @endfor
                                        </ul>
                                    </li>

                                    <li>
                                        <a data-toggle="collapse" href="#weight_collaps" role="button" aria-expanded="false" aria-controls="weight_collaps">Weight</a>
                                        <ul class="collapse" id="weight_collaps">
                                            @foreach($weights as $key => $weight)
                                                <li class="length_list category_list">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input inp_filter_origin" id="weightCheck_{{$key}}" v-on:click="weightCheck('{{ addslashes($weight->weight) }}')">
                                                        <label class="custom-control-label" for="weightCheck_{{$key}}"> {{ $weight->weight }}</label>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>

                                    <li>
                                        <a data-toggle="collapse" href="#origns_length" role="button" aria-expanded="false" aria-controls="origns_length">Origin</a>
                                        <ul class="collapse" id="origns_length">
                                            @foreach($origns as $key => $orign)
                                                <li class="length_list category_list">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input inp_filter_origin" id="orignCheck_{{$key}}" v-on:click="orignFilter('{{ addslashes($orign->origin) }}')">
                                                        <label class="custom-control-label" for="orignCheck_{{$key}}"> {{ $orign->origin }}</label>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>

                    

                                    {{--<li class="" id="aanbod_2"><a
                                            data-href="{Aanbod: 2}" data-partial="" data-scroll="no">Origin</a>
                                    </li>--}}
                                  
                                </ul>
                            </div>
                            <div class="scrollbar" data-view="" style="display: none;">
                                <div class="track-piece" style="height: 122px; top: 0px;"></div>
                            </div>
                        </div>
                    </li>
                </ul>


            </div>
            <div class="col-md-9 col-sm-12">
                <div class="result_summary_box">
                    <h1>Total <span class="result_count">0</span> results found
                    </h1>
                </div>

                <div id="top-filter-container">
                    <div id="top-filters">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 text-left">

                                <!--  button groups (default) -->
                                <div class="btn-group">
                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-th"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#" v-on:click="changeView(1)"><i
                                                class="fas fa-list"></i></a>
                                        {{--                                        <a class="dropdown-item" href="#"><i class="fas fa-align-justify"></i></a>--}}
                                        <a class="dropdown-item active" href="#" v-on:click="changeView(2)"><i
                                                class="fas fa-th"></i></a>
                                        <a class="dropdown-item" href="#" v-on:click="changeView(3)"><i
                                                class="fas fa-grip-horizontal"></i></a>
                                    </div>
                                </div>

                                <span class="mx-3 sort_by_txt">Sort by</span>
                                <div class="btn-group">
                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                            id="sort_btn">
                                        Price  
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#" v-on:click="sortBy('name')">Name</a>
                                        <a class="dropdown-item" href="#"
                                           v-on:click="sortBy('description')">Description</a>
                                        <a class="dropdown-item" href="#" v-on:click="sortBy('colour')">Color</a>
                                        <a class="dropdown-item active" href="#" v-on:click="sortBy('price')">Lowest
                                            Price</a>
                                        <a class="dropdown-item" href="#" v-on:click="sortBy('price_high')">Highest
                                            Price</a>
                                    </div>
                                </div>

                            </div>

                            <div class="col-xs-12 col-sm-6 text-right">
                                <div class="mini_search_box">
                                    <input type="text" class="form-control" id="mini_search"
                                           placeholder="search for flower" v-model="keywords">
                                    <i class="fas fa-search"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="result_column_container">
                    <div class="ajax-load text-center" style="display:none" id="loader1">
                        <p><img src="{{ asset('images/icons/loader.gif') }}">Loading...</p>
                    </div>

                    <flower-result-list-component v-bind:keywords="keywords"                              v-bind:cart_products="cart_products"
                                                  v-bind:sort_by="sort_by" v-bind:delivery_date="delivery_date"
                                                  v-bind:filter_catg="filter_catg" v-bind:filter_length="filter_length"
                                                  v-bind:filter_origin="filter_origin"
                                                  v-bind:filter_colour="filter_colour"
                                                  v-bind:feature_filter="feature_filter"
                                                  v-bind:weight_check="weight_check"
                    >

                    </flower-result-list-component>
                </div>
                <div class="ajax-load text-center" style="display:none"  id="loader2">
                    <p><img src="{{ asset('images/icons/loader.gif') }}">Loading...</p>
                </div>
            </div>
        </div>

    </section>

@endsection

@push('footer-js')

    <script type="text/javascript">

        $(document).ready(function () {
            /*$('#select-date').selectize({
                create: true,
                sortField: 'text'
            });*/
            $(".dropdown-item").on('click', function () {
                $(this).siblings().removeClass('active');
                $(this).addClass('active');
            });

            /*$('#select-date').on('change', function (e) {
                delivery_date_o = $(this).val();
            });*/
        });

        /*$('.dropdown-toggle').hover(function (e) {
           $(this).dropdown('show');
        });*/

    </script>

    {{--<script type="text/javascript">
        var page = 1;
        $(window).scroll(function() {
            if($(window).scrollTop() + $(window).height() >= $(document).height()) {
                page++;
                loadMoreData(page);
            }
        });


        function loadMoreData(page){
            $.ajax(
                {
                    url: '?page=' + page,
                    type: "get",
                    beforeSend: function()
                    {
                        $('.ajax-load').show();
                    }
                })
                .done(function(data)
                {
                    if(data.html == " "){
                        $('.ajax-load').html("No more records found");
                        return;
                    }
                    $('.ajax-load').hide();
                    $("#post-data").append(data.html);
                })
                .fail(function(jqXHR, ajaxOptions, thrownError)
                {
                    alert('server not responding...');
                });
        }
    </script>--}}

@endpush

@push('css')
    <style type="text/css">
        .ajax-load{
            /*background: #e1e1e1;*/
            padding: 10px 0 25px;
            width: 100%;
        }
    </style>
    @endpush
