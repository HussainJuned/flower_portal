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

    <section class="container new_search_page">
        <div class="row">
            <div class="col-md-3 col-sm-12">

            </div>
            <div class="col-md-9 col-sm-12">
                <div class="result_summary_box">
                    <h1>Total <span class="result_count">2309</span> results found</span>
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
                                        <a class="dropdown-item" href="#"><i class="fas fa-list"></i></a>
                                        <a class="dropdown-item" href="#"><i class="fas fa-align-justify"></i></a>
                                        <a class="dropdown-item active" href="#"><i class="fas fa-th"></i></a>
                                        <a class="dropdown-item" href="#"><i class="fas fa-grip-horizontal"></i></a>
                                    </div>
                                </div>

                                <span class="mx-3 sort_by_txt">Sort by</span>
                                <div class="btn-group">
                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Description
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Description</a>
                                        <a class="dropdown-item" href="#">Discount</a>
                                        <a class="dropdown-item" href="#">Color</a>
                                        <a class="dropdown-item active" href="#">Lowest Price</a>
                                        <a class="dropdown-item" href="#">Highest Price</a>
                                    </div>
                                </div>

                            </div>

                            <div class="col-xs-12 col-sm-6 text-right">
                                <div class="mini_search_box">
                                    <input type="text" class="form-control" id="mini_search"
                                           placeholder="search for flower">
                                    <i class="fas fa-search"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="result_column_container">
                    <ul class="column fragment">
                        <li id="P98210910" class="product-col">
                            <div class="product" id="quickbuy_98210910"><a
                                    data-href="{Voorcod:'ALL', Celcod:'ALL', Partijnr:98210910, HoofdPartijNr:0}"
                                    data-partial="True" data-scroll="no">
                                    <div class="images">
                                        <div class="image">
                                            <div class="img"
                                                 style="background-image: url('../uploads/BuyererAcc_product_12.png')"></div>
                                        </div>
                                    </div>
                                    <div class="specs">
                                        <ul class="clearfix">
                                            <li><span>Length</span><span> 60 </span></li>
                                            <li><span>stock</span> <span>?</span></li>
                                            <li><span>Total:</span> <span>?</span></li>
                                            <li><span style="width: 100%"> Available from stock<div
                                                            class="product-status green"></div></span></li>
                                        </ul>
                                    </div>
                                    <div class="info"><h6>Zwaardvaren (P. Bunch)</h6>
                                        <div class="price-info"><span class="price">$ 6<sup> 17</sup> <div class="add_to_cart"><i class="fas fa-plus"></i></div></span>
                                            <span
                                                class="each">Price per piece</span></div>
                                    </div>
                                </a>
                            </div>
                        </li>
                        <li id="P98210910" class="product-col">
                            <div class="product" id="quickbuy_98210910"><a
                                    data-href="{Voorcod:'ALL', Celcod:'ALL', Partijnr:98210910, HoofdPartijNr:0}"
                                    data-partial="True" data-scroll="no">
                                    <div class="images">
                                        <div class="image">
                                            <div class="img"
                                                 style="background-image: url('../uploads/BuyererAcc_product_12.png')"></div>
                                        </div>
                                    </div>
                                    <div class="specs">
                                        <ul class="clearfix">
                                            <li><span>Length</span><span> 60 </span></li>
                                            <li><span>stock</span> <span>?</span></li>
                                            <li><span>Total:</span> <span>?</span></li>
                                            <li><span style="width: 100%"> Available from stock<div
                                                            class="product-status green"></div></span></li>
                                        </ul>
                                    </div>
                                    <div class="info"><h6>Zwaardvaren (P. Bunch)</h6>
                                        <div class="price-info"><span class="price">$ 6<sup> 17</sup> <div class="add_to_cart"><i class="fas fa-plus"></i></div></span>
                                            <span
                                                class="each">Price per piece</span></div>
                                    </div>
                                </a>
                            </div>
                        </li>
                        <li id="P98210910" class="product-col">
                            <div class="product" id="quickbuy_98210910"><a
                                    data-href="{Voorcod:'ALL', Celcod:'ALL', Partijnr:98210910, HoofdPartijNr:0}"
                                    data-partial="True" data-scroll="no">
                                    <div class="images">
                                        <div class="image">
                                            <div class="img"
                                                 style="background-image: url('../uploads/BuyererAcc_product_12.png')"></div>
                                        </div>
                                    </div>
                                    <div class="specs">
                                        <ul class="clearfix">
                                            <li><span>Length</span><span> 60 </span></li>
                                            <li><span>stock</span> <span>?</span></li>
                                            <li><span>Total:</span> <span>?</span></li>
                                            <li><span style="width: 100%"> Available from stock<div
                                                            class="product-status green"></div></span></li>
                                        </ul>
                                    </div>
                                    <div class="info"><h6>Zwaardvaren (P. Bunch)</h6>
                                        <div class="price-info"><span class="price">$ 6<sup> 17</sup> <div class="add_to_cart"><i class="fas fa-plus"></i></div></span>
                                            <span
                                                class="each">Price per piece</span></div>
                                    </div>
                                </a>
                            </div>
                        </li>
                        <li id="P98210910" class="product-col">
                            <div class="product" id="quickbuy_98210910"><a
                                    data-href="{Voorcod:'ALL', Celcod:'ALL', Partijnr:98210910, HoofdPartijNr:0}"
                                    data-partial="True" data-scroll="no">
                                    <div class="images">
                                        <div class="image">
                                            <div class="img"
                                                 style="background-image: url('../uploads/BuyererAcc_product_12.png')"></div>
                                        </div>
                                    </div>
                                    <div class="specs">
                                        <ul class="clearfix">
                                            <li><span>Length</span><span> 60 </span></li>
                                            <li><span>stock</span> <span>?</span></li>
                                            <li><span>Total:</span> <span>?</span></li>
                                            <li><span style="width: 100%"> Available from stock<div
                                                            class="product-status green"></div></span></li>
                                        </ul>
                                    </div>
                                    <div class="info"><h6>Zwaardvaren (P. Bunch)</h6>
                                        <div class="price-info"><span class="price">$ 6<sup> 17</sup> <div class="add_to_cart"><i class="fas fa-plus"></i></div></span>
                                            <span
                                                class="each">Price per piece</span></div>
                                    </div>
                                </a>
                            </div>
                        </li>
                        <li id="P98210910" class="product-col">
                            <div class="product" id="quickbuy_98210910"><a
                                    data-href="{Voorcod:'ALL', Celcod:'ALL', Partijnr:98210910, HoofdPartijNr:0}"
                                    data-partial="True" data-scroll="no">
                                    <div class="images">
                                        <div class="image">
                                            <div class="img"
                                                 style="background-image: url('../uploads/BuyererAcc_product_12.png')"></div>
                                        </div>
                                    </div>
                                    <div class="specs">
                                        <ul class="clearfix">
                                            <li><span>Length</span><span> 60 </span></li>
                                            <li><span>stock</span> <span>?</span></li>
                                            <li><span>Total:</span> <span>?</span></li>
                                            <li><span style="width: 100%"> Available from stock<div
                                                            class="product-status green"></div></span></li>
                                        </ul>
                                    </div>
                                    <div class="info"><h6>Zwaardvaren (P. Bunch)</h6>
                                        <div class="price-info"><span class="price">$ 6<sup> 17</sup> <div class="add_to_cart"><i class="fas fa-plus"></i></div></span>
                                            <span
                                                class="each">Price per piece</span></div>
                                    </div>
                                </a>
                            </div>
                        </li>
                        <li id="P98210910" class="product-col">
                            <div class="product" id="quickbuy_98210910"><a
                                    data-href="{Voorcod:'ALL', Celcod:'ALL', Partijnr:98210910, HoofdPartijNr:0}"
                                    data-partial="True" data-scroll="no">
                                    <div class="images">
                                        <div class="image">
                                            <div class="img"
                                                 style="background-image: url('../uploads/BuyererAcc_product_12.png')"></div>
                                        </div>
                                    </div>
                                    <div class="specs">
                                        <ul class="clearfix">
                                            <li><span>Length</span><span> 60 </span></li>
                                            <li><span>stock</span> <span>?</span></li>
                                            <li><span>Total:</span> <span>?</span></li>
                                            <li><span style="width: 100%"> Available from stock<div
                                                            class="product-status green"></div></span></li>
                                        </ul>
                                    </div>
                                    <div class="info"><h6>Zwaardvaren (P. Bunch)</h6>
                                        <div class="price-info"><span class="price">$ 6<sup> 17</sup> <div class="add_to_cart"><i class="fas fa-plus"></i></div></span>
                                            <span
                                                class="each">Price per piece</span></div>
                                    </div>
                                </a>
                            </div>
                        </li>
                        <li id="P98210910" class="product-col">
                            <div class="product" id="quickbuy_98210910"><a
                                    data-href="{Voorcod:'ALL', Celcod:'ALL', Partijnr:98210910, HoofdPartijNr:0}"
                                    data-partial="True" data-scroll="no">
                                    <div class="images">
                                        <div class="image">
                                            <div class="img"
                                                 style="background-image: url('../uploads/BuyererAcc_product_12.png')"></div>
                                        </div>
                                    </div>
                                    <div class="specs">
                                        <ul class="clearfix">
                                            <li><span>Length</span><span> 60 </span></li>
                                            <li><span>stock</span> <span>?</span></li>
                                            <li><span>Total:</span> <span>?</span></li>
                                            <li><span style="width: 100%"> Available from stock<div
                                                            class="product-status green"></div></span></li>
                                        </ul>
                                    </div>
                                    <div class="info"><h6>Zwaardvaren (P. Bunch)</h6>
                                        <div class="price-info"><span class="price">$ 6<sup> 17</sup> <div class="add_to_cart"><i class="fas fa-plus"></i></div></span>
                                            <span
                                                class="each">Price per piece</span></div>
                                    </div>
                                </a>
                            </div>
                        </li>
                        <li id="P98210910" class="product-col">
                            <div class="product" id="quickbuy_98210910"><a
                                    data-href="{Voorcod:'ALL', Celcod:'ALL', Partijnr:98210910, HoofdPartijNr:0}"
                                    data-partial="True" data-scroll="no">
                                    <div class="images">
                                        <div class="image">
                                            <div class="img"
                                                 style="background-image: url('../uploads/BuyererAcc_product_12.png')"></div>
                                        </div>
                                    </div>
                                    <div class="specs">
                                        <ul class="clearfix">
                                            <li><span>Length</span><span> 60 </span></li>
                                            <li><span>stock</span> <span>?</span></li>
                                            <li><span>Total:</span> <span>?</span></li>
                                            <li><span style="width: 100%"> Available from stock<div
                                                            class="product-status green"></div></span></li>
                                        </ul>
                                    </div>
                                    <div class="info"><h6>Zwaardvaren (P. Bunch)</h6>
                                        <div class="price-info"><span class="price">$ 6<sup> 17</sup> <div class="add_to_cart"><i class="fas fa-plus"></i></div></span>
                                            <span
                                                class="each">Price per piece</span></div>
                                    </div>
                                </a>
                            </div>
                        </li>




                    </ul>
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
            $(".dropdown-item").on('click', function(){
                $(this).siblings().removeClass('active');
                $(this).addClass('active');
            });
        });

        /*$('.dropdown-toggle').hover(function (e) {
           $(this).dropdown('show');
        });*/

    </script>

@endpush
