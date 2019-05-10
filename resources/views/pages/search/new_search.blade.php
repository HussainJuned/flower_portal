@extends('layouts.master')
@section('title', 'Search')


@section('content')
    <div class="container search">
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
    </div>
    <section class="date">
        <div class="row">
            <div class="col-sm-6 text-right">

            </div>
            <div class="col-sm-6 text-left"></div>
        </div>
    </section>
@endsection
