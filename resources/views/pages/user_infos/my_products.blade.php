@extends('layouts.master')
@section('title', 'Floral Portal')


@section('content')
    <div class="container">
        <div class="row">
            @if(session()->has('message'))
                <div class="my-5 container">
                    <a href="{{ route('products.create') }}" class="btn btn-primary">Upload another product</a>
                </div>
            @endif

            @if(count($products) < 1)
                <div class="col-sm-12 mb-3">
                    <div class="card p-5">
                        <p class="mb-3"> You dont have any product to show</p>
                        <p>
                            <a href="{{ route('products.create') }}" class="btn btn-primary">Upload product</a>
                        </p>
                    </div>
                </div>
            @endif



            @foreach($products as $product)
                <div class="col-sm-12 mb-3">
                    @include('partials.product_box')
                </div>
            @endforeach
        </div>
    </div>
@endsection
