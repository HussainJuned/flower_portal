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

    <section class="container">
        <div class="row">
            <div class="col-md-3 col-sm-12">

            </div>
            <div class="col-md-9 col-sm-12">
                <div class="result_summary_box">
                    <h1>There are <span class="result_count">2309</span> products with <span class="result_keyword">Flower</span>
                    </h1>
                </div>

                <div id="top-filter-container">
                    <div id="top-filters">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 text-left">

                                <!--  button groups (default) -->
                                <div class="btn-group">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-th"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Separated link</a>
                                    </div>
                                </div>

                                <span class="sort_by_txt">Sort by</span>
                                <div class="btn-group">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Description
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Separated link</a>
                                    </div>
                                </div>

                            </div>

                            <div class="col-xs-12 col-sm-6 text-right">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas fa-search"></i></div>
                                    </div>
                                    <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="keyword">
                                </div>
                                <span class="icon_box"><i class="fas fa-print"></i></span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

@push('footer-js')

    <script type="text/javascript">
        /*$(document).ready(function () {
            $('#select-date').selectize({
                create: true,
                sortField: 'text'
            });
        });*/
    </script>

@endpush
